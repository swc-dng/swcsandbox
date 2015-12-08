<?php
/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.2.0.1
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title><?php wp_title('&#124;', true, 'right'); ?></title>

<?php if( bi_option('custom_favicon') !== '' ) : ?>
        <link rel="icon" type="image/png" href="<?php echo bi_option('custom_favicon', false, 'url'); ?>" />
    <?php endif; ?>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ; ?>/fonts/fonts.css">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- Shadowbox -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ; ?>/js/shadowbox/shadowbox.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>

<?php wp_head(); ?> 

<!-- Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
  
  <!-- GA Tag Mgr-->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NVCS8T"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NVCS8T');</script>
  <!-- / GA Tag Mgr -->
  
<!-- Sales Fusion -->
  <script type="text/javascript">
  __sf_config = {
  customer_id: 95714,
  host: 'www.msgapp.com',
  ip_privacy: 0,
  subsite: '',
  
  __img_path: "/web-next.gif?"
  };
  
  (function() {
  var s = function() {
  var e, t;
  var n = 10;
  var r = 0;
  e = document.createElement("script");
  e.type = "text/javascript";
  e.async = true;
  e.src = "//" + __sf_config.host + "/js/frs-next.js";
  t = document.getElementsByTagName("script")[0];
  t.parentNode.insertBefore(e, t);
  var i = function() {
  if (r < n) {
  r++;
  if (typeof frt !== "undefined") {
  frt(__sf_config);
  } else {
  setTimeout(function() { i(); }, 500);
  }
  }
  };
  i();
  };
  if (window.attachEvent) {
  window.attachEvent("onload", s);
  } else {
  window.addEventListener("load", s, false);
  }
  })();
  </script>
  <!-- END SALESFUSION -->
  
                 
<?php responsive_container(); // before container hook ?>

         
    <?php responsive_header(); // before header hook ?>
    <header>
   
    <?php responsive_in_header(); // header hook ?>


<?php 
 // Fix menu overlap bug..
 if ( is_admin_bar_showing() ) echo '<div class="wpadminbar-bump"></div>'; 
 ?>
 
 
<?php ubermenu( 'main' , array( 'theme_location' => 'top-bar' ) ); ?>
 
 <!-- <?php echo do_shortcode('[supermenu]'); ?> -->
            
 
    </header><!-- end of header -->
    <?php responsive_header_end(); // after header hook ?>
    
	<?php responsive_wrapper(); // before wrapper ?>
    
    <div class="nav-offset">
        <div id="wrapper" class="clearfix">
    
    <?php responsive_in_wrapper(); // wrapper hook ?>
