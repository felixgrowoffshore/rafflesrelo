<?php /* Template Name: Template Free Quote */ ?>
<?php get_header(); ?>
<?php setup_postdata($post); ?>
<div class="featured-image">
 <?php the_post_thumbnail('full');?>	
 </div>
 <div class="about-us-template">
    <div class="container ">


      <div class="starter-template about-us-template-inner">
	 
	 <div class="row">	 
	 <div class="col-lg-7">
        <h1><?php the_title(); ?></h1>
      <?php the_content(); ?> 
	  
	  </div>
	
	 <div class="col-lg-5 contactForm">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Free Quote') ) : else : ?><?php endif; ?>
 </div>
  </div>
	
      </div>

    </div><!-- /.container -->
	<ul>

</ul>
</div>
<?php get_footer(); ?>
