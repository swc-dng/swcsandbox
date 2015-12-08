<div class="container posts-content">

<p class="results-found">No Luncheons Match That Search, Browse All Luncheons Instead</p>

<!-- NORMAL  EVENTS -->

<div id="posts-list" class="row">

<?php
   wp_reset_postdata();
   $myargs = array (
       'showposts' => -1,
       'post_type' => 'events',
       'orderby'			=> 'start_date',
       'order'				=> 'ASC',
       'meta_key' => 'featured_event',
        'meta_value' => 'no'
       
   );
   $myquery = new WP_Query($myargs);
     if($myquery->have_posts() ) :
       while($myquery->have_posts() ) : $myquery->the_post();
   ?>
 
 
<?php
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
 ?>
 
 
 <div class="col-sm-12 col-md-6 col-lg-4 post-box events">
   
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
       <div class="event-description"><?php the_advanced_excerpt(); ?></div>
     <!--  <p class="location-address"><?php echo the_field('location_address'); ?></p> -->
       
       <a href="<?php the_permalink(); ?>" class="read-more-btn">Register</a>
		</div><!-- end Post Content -->
		
 </div><!-- End Post Box -->


   <?php endwhile;
         endif;
         wp_reset_postdata();
    ?>
       
    </div><!-- end post list -->

<!-- END NORMAL EVENTS -->









</div><!-- Posts Content for IS effect -->