<?php
/**
* Events BAKCUP Archive Template
*
  Template Name:  Events BACKUP Archive Page
 */
?>
<?php get_header(); ?>
            
    
<div class="header-banner blog events white">
    <div class="container">
    	 
	      		  <h1>SWC Chicago Area Events</h1>
	        		<p><a class="btn-play"  href="http://www.youtube.com/embed/3FTMiPuY9v0?rel=0&amp;autoplay=1" rel="shadowbox;player=iframe;width=1280;height=720">Wondering What To Expect? Take A Look. <i class="fa fa-play-circle-o"></i></a></p>
	      		        
	      		        </div><!-- End Container -->
</div> <!-- End Header Banner Area -->


<div class="filtering-bar two">
<div class="container">
<?php echo do_shortcode('[searchandfilter id="20885"]'); ?>
</div>
</div>


<?php echo do_shortcode('[searchandfilter id="20885" show="results"]'); ?>
   
      	      
<?php get_footer() ?>