<?php
/**
 * Blog Template
 *
   Template Name:  Blog Landing Page
 *
 * @file           template-full-width-blog.php
 * @package        StrapPress 
 */
?>
<?php get_header(); ?>
            
    
<div class="header-banner blog-page white">
    <div class="container">
    	 
	      		  <h1>SWC Blog</h1>
	        	<!--<p>Discover what’s happening</p>-->
	        					
</div><!-- End Container -->
<?php dynamic_sidebar( 'blog-callouts' ); ?>
</div> <!-- End Header Banner Area -->


<div id="filters" class="blog-filters">
<div class="container">
<a class="view-all" href="#" data-filter="*">View All</a>
<a href="#" data-filter=".application-development, .business-intelligence, .unified-communications, .customer-relationship-management, .managed-services, .microsoft-system-center, .microsoft-windows, .security, .sharepoint, .virtualization">Technology</a>
<a href="#" data-filter=".digital-marketing, .seo">Digital</a>
<a href="#" data-filter=".careers, .swc-technology-partners">Careers</a>
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
        'posts_per_page' => 30,
       
        
        'paged' => $paged ) );
    ?>   



<!-- Posts Content for IS effect -->
<div class="container">

<div class="grid blog">

<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>



<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post();
	$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
		foreach ( $termsArray as $term ) { // for each term 
			$termsString .= $term->slug.' '; //create a string that has all the slugs 
		}
	?> 
 
   		
       
   <?php
   $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
   ?>
   
   
 <div class="grid-item <?php echo $termsString; ?> <?php echo get_the_date( 'Y' ); ?>">
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