<?php
add_theme_support( 'post-thumbnails' );

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'page'
        )
    );
}

class Thumbnail_walker extends Walker_page {
        function start_el(&$output, $page, $depth, $args, $current_page) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';

        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);
        if ( !empty($current_page) ) {
            $_current_page = get_page( $current_page );
            _get_post_ancestors($_current_page);
            if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
                $css_class[] = 'current_page_ancestor';
            if ( $page->ID == $current_page )
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                $css_class[] = 'current_page_parent';
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current_page_parent';
        }

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        $output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', '' ) . $link_after . get_the_post_thumbnail($page->ID, array(72,72)) .'</a>'


		;

        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;

            $output .= " " . mysql2date($date_format, $time);
        }
    }
}




function get_first_image() {
	global $post;
	$first_img = '';
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

	return $first_img;
}



function custom_get_comment($title = '', $number = 0, $length = 15) {
	$args = array ( 'number' => $number, 'status' => 'approve' );
	$comments = get_comments($args);
	echo '<div class="sidebox custom_comments">';
	echo '<h3 class="sidetitle">' . $title . '</h3>';
	echo '<ul>';
	foreach ( $comments as $comment ) :
		echo '<li class="comment">';
		echo '<a href="'. get_permalink( $comment->comment_post_ID ) .'">';
		echo '<div class="author">' . $comment->comment_author . get_avatar( $comment->user_id ) . '</div>';
		echo '<div class="date">' . mysql2date('l, j M Y', $comment->comment_date) . '</div>';
		echo '<div class="content">' . excerpt($comment->comment_content, $length) . '</div>';
		echo '</a>';
		echo '<div class="clear"></div></li>';
	endforeach;
	echo '</ul></div>';
}

function custom_get_post($numberpost = -1, $length = 40, $orderby = '', $offset = 0, $readmore = "Read more") {
	$args = array ( 'numberposts' => $numberpost, 'offset' => $offset, 'orderby' => $orderby );
	$posts = get_posts($args);
	echo '<ul>';
	foreach ( $posts as $post ) :
		echo '<div class="post">';
		echo '<div class="posttitle"><a href="'. get_permalink( $post->ID ) .'" title="'. $post->post_title .'">' . $post->post_title . '</a></div>';
		echo '<div class="post-info">' . mysql2date('M j Y, l', $post->post_date) . '</div>';
		echo '<div class="article">';
		//if ( has_post_thumbnail($post->ID) )
			//echo get_the_post_thumbnail($post->ID, 'thumbnail');
		echo custom_trim_excerpt($post->post_content, $length);
		echo '</div><div class="clear"></div>';

		echo '<div class="post-info2">';
		//echo '<span class="higlight">Comments&nbsp;('.$post->comment_count.')</span>';
		//echo '<span> | </span>';
		echo '<a class="more" href="'. get_permalink( $post->ID ) .'" title="'. $post->post_title .'"> more >></a></div>';
		echo '</div>';
	endforeach;
	echo '</ul>';
}



function wp_custom_get_random_post($length = 40, $readmore = "Read more") {
	$args = array ( 'numberposts' => -1, 'orderby' => 'rand' );
	$posts = get_posts($args);
	setup_postdata($posts[0]);
	$p = $posts[0];
	echo '<div id="top-post">';
	echo '<div>';
	echo '<div class="post-data alignleft"><h2>';
	echo $p->post_title;
	echo '</h2></div><div class="cat alignright"><span class="catname">Category: </span>';
	the_category(', ');
	echo '</div>';
	echo '</div>';
	echo '<div class="content clear">';
	if ( has_post_thumbnail( $p->ID ) )
		echo get_the_post_thumbnail($p->ID, 'medium', array('class' => 'alignleft post-thumbnail'));

	echo '<p>' . custom_trim_excerpt(get_the_content(), 100) . '</p>';
	echo '</div>';
	echo '<div class="afterpost clear">';
	echo '<div class="datepost alignleft"><span class="highlight">Date Posted:</span> ';
	echo mysql2date('l, j M Y', $p->post_date) . '</div>';
	echo '<div class="comment-count alignright"><a class="more" href="'. get_permalink( $p->ID ) .'" title="'. $p->post_title .'"> Read Full Article </a></div>';
	echo '</div>';
	echo '</div>';
	return get_permalink( $p->ID );
}

function custom_get_post_wthumbnail($number_post = -1, $length = 100, $readmore = "Read more") {
	$args = array ( 'numberposts' => $number_post, 'post_type' => 'attachment' );
	$posts = get_posts($args);
	echo '<div class="featured-post-wrapper">';
	echo '<ul>';	$noimage = '/images/noimage.jpg';
	foreach ( $posts as $post ) :
		//if ( has_post_thumbnail($post->ID) ) :
			echo '<li class="post-data">';
			echo '<div class="thumbnail-container">';
			echo '<a href="' . get_permalink( $post->ID ) . '" title="' . $post->post_title . '">';
			if ( has_post_thumbnail($post->ID) )
				echo get_the_post_thumbnail($post->ID, 'thumbnail');
			echo '</a>';
			echo '</div>';
			echo '<div class="post-data-info">';
			echo '<div class="post-date">'.mysql2date('l, j M Y', $post->post_date).'</div>';
			echo '<div class="post-title"><h2>'. $post->post_title .'</h2></div>';
			echo '<div class="post-content"><p>'.custom_trim_excerpt($post->post_content, $length).'</p></div>';
			echo '<a class="more" href="'. get_permalink( $post->ID ) .'" title="'. $post->post_title .'">'. $readmore . '</a>';
			echo '</div></li>';
		//endif;
	endforeach;
	echo '</ul></div>';
}


function custom_trim_excerpt($excerpt_length = 30, $readmore = '... ') { // Fakes an excerpt if needed
	global $post;

	$text = get_the_content();
	$string_check = explode(' ', $text);
	if ( count($string_check, COUNT_RECURSIVE) > $excerpt_length ) {
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = apply_filters('the_content', $text);
		$text = strip_tags($text, '<p><a>');
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, $readmore);
			$text = implode(' ', $words);
		}
	}
	echo $text;
}

function excerpt($text = '', $excerpt_length = 30, $readmore = '... ') { // Fakes an excerpt if needed

	$string_check = explode(' ', $text);
	if ( count($string_check, COUNT_RECURSIVE) > $excerpt_length ) {
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = strip_tags($text, '<p><a>');
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, $readmore);
			$text = implode(' ', $words);
		}
	}
	echo $text;
}

if ( function_exists('register_sidebar') ) :

	register_sidebar(array(
	'name' => 'Free Quote',
    'before_widget' => '<div class="sidebox %2$s">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="sidetitle">',
    'after_title' => '</h3>',
	));




endif;

function recent_comments($src_count=5, $src_length=100, $post_HTML='') {
	global $wpdb;

	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,	SUBSTRING(comment_content,1,$src_length) AS com_excerpt
		FROM $wpdb->comments
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = ''
		ORDER BY comment_date_gmt DESC
		LIMIT $src_count";
	$comments = $wpdb->get_results($sql);

	foreach ($comments as $comment) {
		$output .= "<div class='headline'><h4>&ldquo;" . strip_tags($comment->com_excerpt) . "...&rdquo; &#8212; <a  class='comment-class' href='" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID  . "' title='on " . $comment->comment_author. "'>" . $comment->comment_author . "</a></h4></div>"  ;
	}
	$output .= $post_HTML;
	echo $output;
}

// generates grid boxes with ACF
function grid_boxes_func(  ){
  $display = "<div class='row'>";
  $blocks = get_field('blocks');


  foreach ($blocks as $key => $block) {
    $page_id = $block['block_page'][0];
    $page_src = get_field('thumbnail_image',$page_id);
    $title = $block['block_label'] ? $block['block_label'] : get_the_title($page_id);
    $page_url = get_permalink($page_id);
    $display .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 custom-boxes'>
                    <a href='$page_url'>
                    <img class='alignnone' src='$page_src[url]' />
                    </a>
                    <p style='margin:0;'>$title</p>
                </div>";
  }
  $display .= "</div>";
  return $display;
}
add_shortcode( 'grid_boxes', 'grid_boxes_func' );
?>
