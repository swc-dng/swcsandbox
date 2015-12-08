<?php
/**
* News Page Template
*
  Template Name:  News Page
 */
?>
<?php get_header(); ?>         
    
<div class="header-banner blog news white">  
    <div class="container">
    	 
<h1>SWC Technology Partners News</h1>
	        			      		        	
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->

<div id="filters" class="news-filters">
<div class="container">
<a class="view-all" href="#" data-filter="*">View All</a>
<a href="#" data-filter=".2015">2015 News</a>
<a href="#" data-filter=".2014">2014 News</a>
<a href="#" data-filter=".2013">2013 News</a>
<a href="#" data-filter=".2012">2012 News</a>
</div>
</div>


<?php
    global $wp_query;
    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    } elseif ( get_query_var('page') ) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }
        query_posts( array( 
        
        'post_type' => 'news',
        'posts_per_page' => -1,      
        'paged' => $paged ) );
    ?>   
    

<!-- Posts Content for IS effect -->
<div class="container">

<div class="grid news">

<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

 <div class="grid-item <?php echo get_the_date( 'Y' ); ?>">
 <div class="inside-box">
 
 <p class="author-credit"><?php if( get_field('author_credit') ): ?><?php the_field('author_credit'); ?><?php endif; ?></p>
 	
 <p class="post-date"><?php the_date( 'F Y' ); ?></p>
 <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          
 <p class="news-description"><?php the_advanced_excerpt(); ?></p>
                		
 </div><!-- End Inside Box -->
 </div><!-- End Grid Item -->

<?php endwhile; ?> 
       
       
       
 </div><!-- end of grid -->
        
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="page-nav">
			<div class="next"><?php next_posts_link( __( 'Next', 'responsive' ) ); ?></div>
            <dv class="back"><?php previous_posts_link( __( 'Back', 'responsive' ) ); ?></dv>
        </div>
        <?php endif; ?>
        
	    <?php else : ?>     
         	        
<?php endif; ?>  

</div><!-- Container -->
      	      
<?php get_footer() ?>