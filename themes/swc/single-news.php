<?php
/**
 * Single News Posts Template
 *
 *
 * @file           single-news.php
 * @package        StrapPress 

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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="header-banner blog news">
    <div class="container">
    <!-- PAGE TITLE -->	
    <?php if($seo_page_title = get_post_meta($post->ID, 'seo_page_title', true)) { ?>
    <h1><?php echo $seo_page_title; ?></h1>
    <?php } else { ?>
    <h1><?php the_title(); ?></h1>
    <?php }; ?>
    
    <p class="post-date"><?php the_time('F j, Y'); ?></p>
    	 	
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->


<div class="container">
<div class="col-md-12">	
<div class="blog-content news">		
					
		<div class="single-meta">
					 <div class="social-share">
					 <?php echo do_shortcode('[shareaholic app="share_buttons" id="18351684"]'); ?>  
					  </div>
		</div><!-- End single meta -->			  	
		
			
			<?php the_content(); ?>
	
	
	<!-- SEO COPY -->
	<?php if( get_field('seo-copy') ): ?>	
	<div class="seo-copy">
	<?php the_field('seo-copy'); ?>		
	 </div>
	 	<?php endif; ?>
	 <!-- SEO COPY -->
	
			
			<?php endwhile; else: ?>

			<p><?php _e('Sorry - what you are looking for can not be found...'); ?></p>
			<?php endif; ?>
		
		
						
		</div>
		</div><!-- End Main Col -->

 
</div><!-- /.container -->


<!-- RELATED POSTS  -->
<div class="single-related-bkg">
<!-- Posts Content for IS effect -->
<div class="container">
<div class="grid news">

<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>

<?php
   wp_reset_postdata();
   $myargs = array (
       'showposts' => 3,
		'post_type' => 'news'

    );
   $myquery = new WP_Query($myargs);
     if($myquery->have_posts() ) :
       while($myquery->have_posts() ) : $myquery->the_post();
   ?>
 
 
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

   <?php endwhile;
         endif;
         wp_reset_postdata();
    ?>
       
    </div><!-- end post list -->
<!-- END NORMAL EVENTS -->

</div>
</div><!-- END SINGLE RELATE BKG -->


<?php get_footer(); ?>