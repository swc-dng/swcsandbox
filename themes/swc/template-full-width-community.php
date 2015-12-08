<?php
/**
* Community Page Template
*
  Template Name:  Community Outreach Template
 */
?>
<?php get_header(); ?>
            
    
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		
		
			<?php endif; ?>
	
	
	
<div class="community-outreach-posts">
<div class="container posts-content">

<h3>Recent News and Media Alerts</h3>

<!-- NEWS POSTS -->

<div id="posts-list" class="row">

<?php
   wp_reset_postdata();
   $myargs = array (
       'showposts' => 3,
		'post_type' => 'news',
		'tag'				=> 'community-outreach',
	'year'     => $current_year,
	'order'    => 'ASC'

    );
   $myquery = new WP_Query($myargs);
     if($myquery->have_posts() ) :
       while($myquery->have_posts() ) : $myquery->the_post();
   ?>
 
 
<?php
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
 ?>
 
 
 <div class="col-sm-12 post-box news">

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


   <?php endwhile;
         endif;
         wp_reset_postdata();
    ?>
       
    </div><!-- end post list -->

<!-- END NORMAL EVENTS -->


</div><!-- Posts Content for IS effect -->
</div>
   
      	      
<?php get_footer() ?>