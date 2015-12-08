<?php
/**
 * Category Archive Template
 *
   Template Name:  Category Archive Page
 */
?>
<?php get_header(); ?>
            

                <?php if (have_posts()) : ?>	     
<div class="header-banner blog-page archives white">
    <div class="container">

	      		  <h1><?php single_cat_title( '', true ); ?></h1>
	
</div><!-- End Container -->
			<?php dynamic_sidebar( 'blog-callouts' ); ?>
</div> <!-- End Header Banner Area -->



<!-- Posts Content for IS effect -->
<div class="container">

<div class="grid blog archives">

<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>

<?php while (have_posts()) : the_post(); ?>	
 

       
 <?php
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
 ?>
 
 
<div class="grid-item">
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
  </div><!--/.end Grid Item-->

        
       
 <?php endwhile; ?> 
        
        </div><!-- end of grid -->
               </div><!-- Container -->     
                 
                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        		<div class="page-nav">
        		<div class="container">
        			<div class="next"><?php next_posts_link( __( 'Next', 'responsive' ) ); ?></div>
                  <dv class="back"><?php previous_posts_link( __( 'Back', 'responsive' ) ); ?></dv>
                </div><!-- end Container -->   
             </div><!-- end PageNav -->   
                <?php endif; ?>
                
        	    <?php else : ?>
        
             
                 	        
        <?php endif; ?>  
        
        
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
      