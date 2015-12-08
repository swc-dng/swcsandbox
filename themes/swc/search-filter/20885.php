<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	
	
	<!-- Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br /> -->	
	
	
	<div class="container posts-content">
	
<!--	<p class="results-found"> <?php echo $query->found_posts; ?>  Luncheons</p> -->
	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		
		
		<?php
		 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		 ?>
		 
		 
		 <div class="col-sm-12 col-md-6 col-lg-4 post-box events featured">
		   
		   <div class="post-image" style="background: url(<?php echo $src[0]; ?>) !important; no-repeat !important; background-size: cover !important;-webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important;">
		   
		   <?php $date = get_field('event_date');
		   $date2 = date("d", strtotime($date)); ?>
		   
		   <?php $date = get_field('event_date');
		   $date3 = date("M", strtotime($date)); ?>
		  
		   <div class="snippet-date">
		   <p class="month"><?php echo $date3; ?></p>
		   <p class="day"><?php echo $date2; ?></p>
		   </div>
		   
		  </div><!-- End Post Image -->
		
		      <div class="event-content">
		      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		       <p class="location-name"><?php echo the_field('location_title'); ?></p>
		       <p class="event-date"><?php echo the_field('event_date'); ?></p>
		       <p class="event-time"><?php echo the_field('start_time'); ?> - <?php the_field('end_time'); ?></p>
		       <p class="event-description"><?php the_advanced_excerpt(); ?></p>
		     <!--  <p class="location-address"><?php echo the_field('location_address'); ?></p> -->
		       
		       <a href="<?php the_permalink(); ?>" class="read-more-btn">Register</a>
				</div><!-- end Post Content -->
				
		 </div><!-- End Post Box -->
		
		
		<?php
	}
	?>
	<!-- <p class="page-numbers">Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?>
-->	
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	
	<?php
}
else
{

 /* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
     get_template_part( 'loop', 'events' );

}
?>

</div><!-- End Container -->