<?php
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.2.0.1
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */
?>
</div><!-- end of wrapper-->
<?php responsive_wrapper_end(); // after wrapper hook ?>


</div><!-- end of container -->
<?php responsive_container_end(); // after container hook ?>


<!-- SEARCH MODAL -->
<div class="modal fade" id="sitesearch" tabindex="-1" role="dialog" aria-labelledby="sitesearch">
  <div class="modal-dialog sitesearch" role="document">
    <div class="modal-content">
    
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
     
      <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
      	
      	<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Begin Typing …', 'placeholder' ) ?>" name="s" />
      	
      	<input type="submit" class="btn solid orange search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
      </form>
       
   </div>
  </div>
</div>

<!-- END MODAL -->



<footer id="footer" class="clearfix">
  <div class="container">

      <div class="row">

          <div class="col-md-3">
            <?php if (has_nav_menu('footer-menu-1', 'responsive')) { ?>
            <nav role="navigation">
            <?php wp_nav_menu(array(
              'container'       => '',
              'menu_class'      => 'footer-menu',
              'theme_location'  => 'footer-menu-1')
            ); 
            ?>
          </nav>
            <?php } ?>
          </div><!-- end of col-lg-6 -->



<div class="col-md-3">
  <?php if (has_nav_menu('footer-menu-3', 'responsive')) { ?>
  <nav role="navigation">
  <?php wp_nav_menu(array(
    'container'       => '',
    'menu_class'      => 'footer-menu',
    'theme_location'  => 'footer-menu-3')
  ); 
  ?>
</nav>
  <?php } ?>
</div><!-- end of col-lg-6 -->


<div class="col-md-3">
  <?php if (has_nav_menu('footer-menu-4', 'responsive')) { ?>
  <nav role="navigation">
  <?php wp_nav_menu(array(
    'container'       => '',
    'menu_class'      => 'footer-menu',
    'theme_location'  => 'footer-menu-4')
  ); 
  ?>
</nav>
  <?php } ?>
</div><!-- end of col-lg-6 -->

<div class="col-md-3 last-footer">
  <?php if (has_nav_menu('footer-menu-5', 'responsive')) { ?>
  <nav role="navigation">
  <?php wp_nav_menu(array(
    'container'       => '',
    'menu_class'      => 'footer-menu',
    'theme_location'  => 'footer-menu-5')
  ); 
  ?>
</nav>
  <?php } ?>

 
  <?php if( bi_option('disable_social_footer') == '1') { ?>     
  <div class="social-icons">
      <?php $social_options = bi_option( 'social_icons' ); ?>
          <?php foreach ( $social_options as $key => $value ) {
              if ( $value ) { ?>
                  <a href="<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
                      <i class="fa fa-<?php echo $key; ?>"></i>
                  </a>
              <?php }
          } ?>
      </div><!-- .social-icons -->
  <?php } ?>
  
</div><!-- end of col-lg-6 -->
		
	</div><!-- end container -->
      </div><!-- end of row -->
</footer><!-- end #footer -->



<div class="copyright">
 <div class="container">

      <div class="row">

        <div class="col-xs-12">

            <?php if( bi_option('custom_copyright') ) : ?>
        <?php echo bi_option('custom_copyright'); ?>
      <?php else : ?>
           <p>&copy; <?php _e('Copyright', 'responsive'); ?> <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php endif; ?>
            
            <?php if( bi_option('custom_power') ) : ?>
        <?php echo bi_option('custom_power'); ?>
      <?php else : ?>
               
            <?php endif; ?>
          
        </div><!-- end col-xs-12 -->
        
    </div><!-- end row -->
   </div> <!-- end container --> 
 </div><!-- end copyright -->


<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri() ?>/js/classie.js"></script>

</body>
</html>