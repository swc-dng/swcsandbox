<div class="container posts-content">

<p class="results-found">No Posts Match. View All Blogs Instead.</p>

<!-- BLOG POSTS -->

<div id="posts-list" class="row">

<?php // Display blog posts on any page
     		$temp = $wp_query; $wp_query= null;
     		$wp_query = new WP_Query(); $wp_query->query('showposts=18' . '&paged='.$paged);
     		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>       
            
 
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
</div><!--/.col-->


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