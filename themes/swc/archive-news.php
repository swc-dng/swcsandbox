<?php
/**
 * News Archive Template
 * archive-news.php
   Template Name:  News Archives
 */
 
?>
<?php get_header(); ?>

 <script>
 
 // external js: isotope.pkgd.js, imagesloaded.pkgd.js
 
 jQuery(document).ready( function() {
   // init Isotope after all images have loaded
   var jQuerygrid = jQuery('.grid').imagesLoaded( function() {
     jQuerygrid.isotope({
       itemSelector: '.grid-item',
       percentPosition: true,
       masonry: {
         columnWidth: '.grid-sizer',
           gutter: '.gutter-sizer'
       }
     });
   });
 
 });
 
 
 </script>            
            

<?php if (have_posts()) : ?>	     
<div class="header-banner blog news archives white">
    <div class="container">

	      		  <h1><?php if ( is_day() ) : ?>
	      		                 <?php printf( __( 'SWC News from %s', 'responsive' ), '<span>' . get_the_date() . '</span>' ); ?>
	      		             <?php elseif ( is_month() ) : ?>
	      		             <?php printf( __( 'SWC News from %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
	      		         <?php elseif ( is_year() ) : ?>
	      		         <?php printf( __( 'SWC News from %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
	      		     <?php else : ?>
	      		     <?php _e( 'SWC News', 'responsive' ); ?>
	      		  <?php endif; ?>
	      		  </h1>
	        	<!-- <p><?php single_cat_title( '', true ); ?></p>-->
	
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->

<!-- End Blog Cat Filters -->
<div class="blog-cat-filters">
<div class="container">
<a class="btn solid dark" href="<?php echo get_site_url(); ?>/swc-technology-partners/news">2015 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2014">2014 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2013">2013 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2012">2012 News</a>
</div>
</div><!-- End Blog Cat Filters -->

<!-- Posts Content for IS effect -->
<div class="container">

<div class="grid news">

<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>

 
<?php while (have_posts()) : the_post(); ?>	
       
 <?php
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
 ?>
 
 
<div class="grid-item">
<div class="inside-box">
<p class="post-date"><?php the_date('F j, Y'); ?><?php if( get_field('author_credit') ): ?>
	<span class="author-credit">By <?php the_field('author_credit'); ?></span>
<?php endif; ?></p>
     <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
         
         <p class="news-description"><?php the_advanced_excerpt(); ?></p>
     <a href="<?php the_permalink(); ?>" class="read-more-btn">Read Article</a>		
</div><!-- End Post Box -->
</div>
        
       
         <?php endwhile; ?> 
       
  <?php endif; ?>
    </div>
</div><!-- Posts Content for IS effect -->
  
 
      	      
<?php get_footer() ?>