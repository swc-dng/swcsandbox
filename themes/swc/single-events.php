<?php
/**
 * Single Events Page
 *
 *
 * @file           single-events.php
 */
?>
<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'event-header-image' );
$image = $image[0]; ?>
<?php else :
$image = get_bloginfo( 'stylesheet_directory') . 'img/blog/banners-blog.jpg'; ?>
<?php endif; ?>

<div class="header-banner blog event-page">
    <div class="container">
    	 
	      		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	        	<h1><?php the_title(); ?></h1>
	        	<p class="post-date"><?php the_field('event_date'); ?> | <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></p>
				<p class="at-sign">@</p>
				<p class="location-name"><?php the_field('location_title'); ?></p>
				<p class="location-address"><?php the_field('location_address'); ?></p>
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->


<div class="container">
		<div class="col-md-12">
		<div class="blog-content event-page">
		
		<div class="post-author">
		<img src="<?php the_field('presenter_image'); ?>" alt="<?php the_field('presenter'); ?>"/>
		<p>Please join us at this event presented by</p>
		<p class="presenter"><?php the_field('presenter'); ?></p>
		<hr />
		</div><!-- end Post author -->
		
	<!-- META INFO -->	

<div class="social-share event">
<?php echo do_shortcode('[shareaholic app="share_buttons" id="18351684"]'); ?>  
 </div>
 
<?php the_content(); ?>
			
					
					<?php endwhile; else: ?>
		
					<?php endif; ?>
					
		
		<div class="event-register">
		<h3>Register For This Event</h3>
		<?php the_field('register_form'); ?>		
		 </div><!-- End Event Register -->
							
		</div>
		</div><!-- End Main Col -->

 
</div><!-- /.container -->



<!-- MAP AREA -->
<div class="col-sm-12 location-map">
<div>
<?php 

$location = get_field('locations_map');

if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>
</div>
</div>
<!-- MAP AREA -->


<!-- MAP SCRIPTS -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 14,
		scrollwheel : false,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/

$(document).ready(function(){

	$('.acf-map').each(function(){

		render_map( $(this) );

	});

});

})(jQuery);
</script>

   <!-- SEO COPY -->
   
   <?php if( get_field('seo_page_title') ): ?>	
   <div class="container seo-block events">
   <div class="col-xs-12">
   <h1><?php the_field('seo_page_title'); ?></h1>   
 	</div>
 	</div>
 	<?php endif; ?>

	<?php if( get_field('seo-copy') ): ?>	
	 <div class="container seo-block events">
   <div class="seo-copy">
   <?php the_field('seo-copy'); ?>		
	</div>
	<?php endif; ?>
    </div>
    </div>
    <!-- SEO COPY -->

<?php get_footer(); ?>