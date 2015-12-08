<?php
/**
 * Search & Filter Pro 
 *
 * News Results Template
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
	<div id="posts-list" class="row">
		
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		
		
		<?php
		 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		 ?>
		 
		 
		<div class="col-lg-12 post-box news">
		
		      <div class="news-content">
		      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		      <?php if( get_field('author_credit') ): ?>
		      	<p class="author-credit">By <?php the_field('author_credit'); ?></p>
		      <?php endif; ?>
		      <p class="post-date"><?php the_date('F j, Y'); ?></p>
		      <p class="news-description"><?php the_advanced_excerpt(); ?></p>
		      <a href="<?php the_permalink(); ?>" class="read-more-btn">Read Article</a>
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
	echo "No More News Articles Available";
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