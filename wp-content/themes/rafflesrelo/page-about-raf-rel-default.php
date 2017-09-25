<?php /* Template Name: About Us default */ ?>

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

        <div class="row">
           <div class="col-lg-8">
           <?php the_content(); ?>
           </div>
         <div class="col-lg-4 col-md-4 text-center"><img class="img-pull-40 alignnone size-full wp-image-67" src="http://growoffshore.com/rafflesrelo/wp-content/uploads/2016/10/raffles.png" alt="raffles" width="278" height="258" /></div>
        </div>
      </div>

    </div><!-- /.container -->
	<ul>

</ul>
</div>
<?php get_footer(); ?>
