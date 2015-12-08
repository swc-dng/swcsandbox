<?php
/**
 * Single BACKUP Template
 *
 * @file           single.php
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="header-banner blog">
    <div class="container">
    	    	
					
</div><!-- End Container -->
</div> <!-- End Header Banner Area -->



<div class="container">
		
		<div class="col-md-12">
		<div class="blog-content">
			
			<div class="col-sm-12">
			
			<div class="col-sm-2 hidden-sm hidden-xs">
			<div class="post-related">
			<?php
				$the_cat        = get_the_category();
				$category_name  = $the_cat[0]->cat_name;
				$category_link  = get_category_link( $the_cat[0]->cat_ID ); ?>
			<a href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
					<img src="/wp-content/themes/swc/img/icon-blog-solutions.png" alt="" />
			<?php echo $category_name ?></a>
			</div><!-- Realted Cat-->
			</div>
			

			<div class="col-sm-2 hidden-sm hidden-xs">
			<div class="post-event">
			<a href="/events" alt="Attend An Event">
			<img src="/wp-content/themes/swc/img/icon-blog-event.png" alt="" />
			Attend An Event</a>
			</div><!-- Attend Event Cat-->
			</div>
					
						
			<div class="col-sm-12 col-md-4">
			<div class="post-author">
			<?php echo do_shortcode('[avatar]'); ?>
			<a class="author-link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>

			</div><!-- End Post Author Image -->
			</div>
			
			<div class="col-sm-2 hidden-sm hidden-xs">
			<div class="post-contact">
			<a href="/contact" >
			<img src="/wp-content/themes/swc/img/icon-blog-contact.png" alt="" />
			Contact Us</a>
			</div>
			</div><!-- End Cotnact-->
			
			<div class="col-sm-2 hidden-sm hidden-xs">
			<div class="post-subscribe">
			<a class="hidden-xs" href="#" data-toggle="modal" data-target="#blogsubscribe">
			<img src="/wp-content/themes/swc/img/icon-blog-subscribe.png" alt="" />
			Stay Updated</a>
			</div><!-- End Subscribe-->
			</div>
			
			</div><!-- End ROW -->				
			
					
	<!-- PAGE TITLE -->	
<?php if($seo_page_title = get_post_meta($post->ID, 'seo_page_title', true)) { ?>
<h1><?php echo $seo_page_title; ?></h1>
<?php } else { ?>
<h1><?php the_title(); ?></h1>
<?php }; ?>

<div class="single-meta">
			 <div class="social-share">
			 <?php echo do_shortcode('[shareaholic app="share_buttons" id="18351684"]'); ?>  
			  </div>
			  <p class="post-date"><?php the_time('F j, Y'); ?></p>
</div><!-- End single meta -->			  
					
			<?php the_content(); ?>
	
	<div class="post-meta-categories">
	<p><?php the_category(',&nbsp;') ?><?php the_tags(',&nbsp;') ?></p>
	</div>	
	
   <!-- SEO COPY -->
   
	<?php if( get_field('seo-copy') ): ?>	
	 <div class="container seo-block solutions">
   <div class="seo-copy">
   <?php the_field('seo-copy'); ?>		
	</div>
	<?php endif; ?>
    </div>
    </div>
    <!-- SEO COPY -->	
			
			<?php endwhile; else: ?>

			<p><?php _e('Sorry - what you are looking for can not be found...'); ?></p>
			<?php endif; ?>
		
		
						
		</div>
		</div><!-- End Main Col -->

 
</div><!-- /.container -->

<!-- RELATED POSTS  -->
<div class="single-related-bkg">

    <?php $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    
  	 if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 3, // Number of related posts that will be shown.
    'caller_get_posts'=>1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
    echo '<div class="container"><div class="related-posts-box">';
    while( $my_query->have_posts() ) {
    $my_query->the_post();?>

<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>

<div class="col-sm-12 col-md-6 col-lg-4 post-box">
  <div class="up-down" style="background: url(<?php echo $src[0]; ?> ) !important; no-repeat !important; background-size: cover !important;-webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important;">

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


    <?
    }
    echo '</div></div>';
    }
    }
    $post = $orig_post;
    wp_reset_query(); ?>
     
<!-- RELATED POSTS  -->

</div>

<div class="blog-sticky blog-page" data-spy="affix" data-offset-top="600" >
       	                  		
       		<?php
       		$the_cat        = get_the_category();
       		$category_name  = $the_cat[0]->cat_name;
       		$category_link  = get_category_link( $the_cat[0]->cat_ID ); ?>
       		
       		<a  class="hidden-sm hidden-xs" href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
       		<img src="/wp-content/themes/swc/img/icon-blog-solutions.png" alt="" />Our Solutions</a>
       	
       	       	
       	<a href="<?php get_site_url(); ?>/contact"><img src="/wp-content/themes/swc/img/icon-blog-contact.png" alt="" />Contact</a>
       	        	
       	<a  class="hidden-xs"  href="<?php get_site_url(); ?>/events"><img src="/wp-content/themes/swc/img/icon-blog-event.png" alt="" />Events</a>
      	        	
       	<a  class="hidden-sm hidden-xs" >
       	<img src="/wp-content/themes/swc/img/icon-blog-subscribe.png" alt="" />Subscribe</a>
             	
       	</div>

       	 <!-- End BLock Sticky -->   

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




<?php get_footer(); ?>




