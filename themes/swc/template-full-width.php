<?php
/**
 * Full Content Template
 *
   Template Name:  Full Width Page (no sidebar)
 *
 * @file           template-full-width.php
 * @package        StrapPress 
 */
?>
<?php get_header(); ?>
        
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts found.'); ?></p>
	<?php endif; ?>
	
   
   <!-- SEO COPY -->
   
   <?php if( get_field('seo_page_title') ): ?>	
   <div class="container seo-block solutions">
   <div class="col-xs-12">
   <h1><?php the_field('seo_page_title'); ?></h1>   
 	</div>
 	</div>
 	<?php endif; ?>

	<?php if( get_field('seo-copy') ): ?>	
	 <div class="container seo-block solutions">
   <div class="seo-copy">
   <?php the_field('seo-copy'); ?>		
	</div>
	<?php endif; ?>
    </div>
    </div>
    <!-- SEO COPY -->
    
    <?php dynamic_sidebar( 'page-callouts' ); ?>
    
      	      
<?php get_footer() ?>