<?php
/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2010 - 2015 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.3.5
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div class="header-banner blog-page search">
    <div class="container">
    	 
	      		  <h1><?php
	      		      $allsearch = &new WP_Query("s=$s&showposts=-1");
	      		      $key = esc_html($s, 1);
	      		      $count = $allsearch->post_count;
	      			      		      _e('<i class="fa fa-search"></i>
	      			      		       ', 'responsive');
	      		      _e('<span class="post-search-terms">', 'responsive');
	      		      echo $key;
	      		      _e('</span><!-- end of .post-search-terms -->', 'responsive');
	      		      wp_reset_query();
	      		  ?>
	      		  </h1>
	        					
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->


<div class="container posts-content">


<div id="posts-list" class="row">
 
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
       
                       <?php
           $title  = get_the_title();
           $keys= explode(" ",$s);
           $title  = preg_replace('/('.implode('|', $keys) .')/iu',
               '<span class="search-excerpt">\0</span>',
               $title);
       ?>
       
       
   
   <div class="col-sm-12 post-box search">
   
         <div class="search-content">
         <div class="col-md-10 col-sm-12">
         <p class="post-date"><?php the_date('F j, Y'); ?></p>
         <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
         <p class="description"><?php the_advanced_excerpt(); ?></p>
         </div>
         <div class="col-md-2 col-sm-12">
         <a href="<?php the_permalink(); ?>" class="btn solid orange">Read More</a>
         </div>
   	</div><!-- end Post Content -->
   		
    </div><!-- End Post Box -->
          
       
          <?php endwhile; ?> 
          
  	   
  <?php endif; ?>  
    </div>
</div><!-- Posts Content for IS effect -->


<?php get_footer(); ?>