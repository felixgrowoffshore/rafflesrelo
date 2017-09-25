<?php /* Template Name: About Us Template 1 */ ?>
<?php get_header(); ?>
<?php setup_postdata($post); ?>
<div class="featured-image">
 <?php the_post_thumbnail('full');?>	
 </div>
 <div class="about-us-template">
    <div class="container ">


      <div class="starter-template">
	<?php if (strpos( get_the_content(), 'h1' ) == false) { ?>
    <h1><?php the_title(); ?></h1>
     
<?php } ?>
       
      <?php the_content(); ?> 
	  
    <?php
    //global $id;
    //wp_list_pages( array(
    //    'title_li'    => '',
    //    'child_of'    => $id,
    //    'show_date'   => 'modified',
    //    'date_format' => $date_format
   // ) );
    ?>
	
	<?php 
	//$thumb_menu = new Thumbnail_walker();
//wp_list_pages(array(
//'walker' => $thumb_menu,
//'title_li'    => '',
 //       'child_of'    => $id,
 //       'show_date'   => 'modified',
  //      'date_format' => $date_format
//));
	?>

	


<?php 

//if (class_exists('MultiPostThumbnails')) : 

//MultiPostThumbnails::the_post_thumbnail(get_post_type(), set_post_thumbnail_size( 100,100 ). 'secondary-image');

//endif;

 ?>
      </div>

    </div><!-- /.container -->
	<ul>

</ul>
</div>
<?php get_footer(); ?>
