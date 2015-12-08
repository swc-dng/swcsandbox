<?php
/**
 * Careers Template
 *
   Template Name:  Careers Landing Page
 *
 * @file           template-full-width-careers.php
 * @package        StrapPress 
 */
?>
<?php get_header(); ?>
        
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts found.'); ?></p>
	<?php endif; ?>
            
   

<div class="container posts-content">


<div id="posts-list" class="row">
 
 <?php
    wp_reset_postdata();
    $myargs = array (
        'showposts' => 3,
        'cat' => 826,
        'order'				=> 'DESC',        
    );
    $myquery = new WP_Query($myargs);
      if($myquery->have_posts() ) :
        while($myquery->have_posts() ) : $myquery->the_post();
    ?>

       
   <?php
   $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
   ?>
   
   
   <div class="col-sm-12 col-md-4 col-lg-4 post-box">
     <div class="up-down" style="background: url(<?php echo $src[0]; ?>) !important; no-repeat !important; background-size: cover !important;-webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important;">
       <div class="slide default">
         &nbsp;
       </div><!--/.slide default-->
       <div class="slide onhover">
        <div class="up-arrow-teaser"><?php the_title(); ?></div>   
         <h4><a href="<?php the_permalink(); ?>"><?php the_advanced_excerpt(); ?></a></h4>
         <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
       </div><!--/.slide onhover-->
     </div><!--/.up-down-->
   </div><!--/.col-->
          
       <?php endwhile;
             endif;
             wp_reset_postdata();
        ?>
       
    </div>
</div><!-- Posts Content for IS effect -->   
      	 
      	 
 <!-- SEO COPY -->
 <div class="container seo-block solutions">
 <div class="col-xs-12">
 
 <h1><?php the_field('seo_page_title'); ?></h1>
 
 <div class="seo-copy">
 <?php the_field('seo-copy'); ?>		
  </div>
 		
  </div>
  </div>
  <!-- SEO COPY -->
  
  <?php dynamic_sidebar( 'page-callouts' ); ?>
      	 
      	 
      	 <script>
      	       jQuery(document).ready(function(){
      	     jQuery('.up-down').mouseover(function(){
      	         jQuery(this).children('.default').stop().animate({
      	             height: 80 // match -margin    
      	         }, "fast", "linear");                        
      	     }).mouseout(function(){
      	         jQuery(this).children('.default').stop().animate({
      	             height: 350
      	         }, "fast", "linear")    
      	     })
      	 
      	     });
      	     </script>
      	 
      	 
      	 
      	      
<?php get_footer() ?>