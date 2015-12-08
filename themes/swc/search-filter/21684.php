<?php
/**
 * Search & Filter Pro 
 *
 * Blog Results Template
 * 
 * @package   Search_Filter
 * 
 *
 */

if ( $query->have_posts() )
{
	?>
	
	
	<!-- Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br /> -->	
	
	
	<div class="container posts-content">
	<div id="posts-list" class="row">
		
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		
		
		<?php
		 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		 ?>
		 
		
		     <div class="col-sm-12 col-md-6 col-lg-4 post-box">
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
	echo "No More Blog Posts Available";
}
?>
    </div><!-- end post list -->
</div><!-- Posts Content for IS effect -->

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