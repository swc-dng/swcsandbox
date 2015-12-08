<div class="container posts-content">

<p class="results-found">No News Match That Search, Browse All News Instead</p>

<!-- NEWS POSTS -->

<div id="posts-list" class="row">

<?php // Display blog posts on any page
     		$temp = $wp_query; $wp_query= null;
     		$wp_query = new WP_Query(); $wp_query->query('show_posts=10&post_type=news&order=DESC' . '&paged='.$paged);
     		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>       
       
 
<?php
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
 ?>
 
 
 <div class="col-sm-12 col-md-6 col-lg-6 post-box news">

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

 <?php endwhile; ?>
       
       		<?php if ($paged > 1) { ?>
       
       		<nav id="nav-posts">
       			<div class="prev"><?php previous_posts_link('<i class="fa fa-long-arrow-left"></i>
       			 Back'); ?></div>
       			<div class="next"><?php next_posts_link('Next <i class="fa fa-long-arrow-right"></i>
       			'); ?></div>
       		</nav>
       
       		<?php } else { ?>
       
       		<nav id="nav-posts">
       			<div class="next"><?php next_posts_link('Next <i class="fa fa-long-arrow-right"></i>
       			'); ?></div>
       		</nav>
       
       		<?php } ?>
       
       		<?php wp_reset_postdata(); ?>


       
    </div><!-- end post list -->

<!-- END NORMAL News -->


</div><!-- Posts Content for IS effect -->