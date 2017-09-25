<?php
/* Template Name: Our Services */






?>

<?php get_header(); ?>
<?php setup_postdata($post); ?>
<div class="featured-image">
 <?php the_post_thumbnail('full');?>
 </div>
 <div class="about-us-template">
    <div class="container ">


      <div class="starter-template about-us-template-inner">

       <div class="starter-template">
	<?php if (strpos( get_the_content(), 'h2' ) == false) { ?>
    <h1><?php the_title(); ?></h1>
<?php } ?>
      <?php //the_content(); ?>
      <?php include ('inc/_services.php');?>
      </div>

    </div><!-- /.container -->
	<ul>

</ul>
</div>
<?php get_footer(); ?>
