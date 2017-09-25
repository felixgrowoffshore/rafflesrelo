<?php get_header(); ?>
<?php setup_postdata($post); ?>
<div class="featured-image">
 <?php the_post_thumbnail('full');?>	
 </div>
    <div class="container">


      <div class="starter-template">
	 	 
        <h1><?php the_title(); ?></h1>
      <?php the_content(); ?> 
      </div>

    </div><!-- /.container -->

<?php get_footer(); ?>
