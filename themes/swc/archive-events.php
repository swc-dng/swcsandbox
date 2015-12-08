<?php
/**
 * News Archive Template
 * archive-news.php
   Template Name:  News Archives
 */
 
?>
<?php get_header(); ?>
            

                <?php if (have_posts()) : ?>	     
<div class="header-banner blog events white">
    <div class="container">
    	 
	      		  <h1>SWC Chicago Area Events</h1>
	        		<p><a class="btn-play"  href="http://www.youtube.com/embed/3FTMiPuY9v0?rel=0&amp;autoplay=1" rel="shadowbox;player=iframe;width=1280;height=720">Wondering What To Expect? Take A Look. <i class="fa fa-play-circle-o"></i></a></p>
	      		        
	      		        </div><!-- End Container -->
</div> <!-- End Header Banner Area -->

<!-- End Blog Cat Filters 

<div class="blog-cat-filters">
<div class="container">
<a class="btn solid dark" href="<?php echo get_site_url(); ?>/swc-technology-partners/news">2015 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2014">2014 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2013">2013 News</a>
<a class="btn solid orange"href="<?php echo get_site_url(); ?>/swc-technology-partners/news/2012">2012 News</a>
</div>
</div>

End Blog Cat Filters -->

<!-- Posts Content for IS effect -->
<div class="container posts-content">

<div id="posts-list" class="row">
 
<?php while (have_posts()) : the_post(); ?>	
       
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
        
       
         <?php endwhile; ?> 
       
  <?php endif; ?>
    </div>
</div><!-- Posts Content for IS effect -->
  
 
      	      
<?php get_footer() ?>