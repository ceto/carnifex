<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Carnifex
 * @since Carnifex 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.png" />
<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/style.css">
<!-- link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css' -->

<script src="<?php bloginfo( 'template_directory' ); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
<?php if ( is_page_template('tmpl_contact.php') ) : ?>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 <script type="text/javascript">
			  var map;
			  function initialize() {
			    var latlng = new google.maps.LatLng(47.99826640666682, 21.87454640865326);
				var centerlatlng = new google.maps.LatLng(47.99826640666682, 21.87454640865326);
				var myOptions = {
				  zoom: 10,
				  center: centerlatlng,
				  disableDefaultUI: true,
				  mapTypeId: google.maps.MapTypeId.ROADMAP,
				styles:[
				  {
					stylers: [
					  { hue: "#ff9900" },
					  { saturation: -57 }
					]
				  },{
					featureType: "road.arterial",
					stylers: [
					  { saturation: -68 }
					]
				  }
				]
				};
				var map = new google.maps.Map(document.getElementById('map_canvas'),	myOptions);
				
				var image = new google.maps.MarkerImage('<?php bloginfo( 'template_directory' ); ?>/images/flag.png',
				new google.maps.Size(140, 79), new google.maps.Point(0,0), new google.maps.Point(70, 69));
				var shadow = new google.maps.MarkerImage('<?php bloginfo( 'template_directory' ); ?>/images/flag_shadow.png',
				new google.maps.Size(140, 79), new google.maps.Point(0,0), new google.maps.Point(70, 69));
				
				var marker = new google.maps.Marker({
				  position: latlng, 
				  map: map, 
				  title:"Carnifex Kft.",
				  icon:image,
				  shadow:shadow 
				});
				 }

				 google.maps.event.addDomListener(window, 'load', initialize);
			</script>
<?php endif; ?>
<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39021500-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
       
<body <?php body_class(); ?>>
	 <a name="pagetop"></a>
	        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>


<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">Carnifex Kft.</a>
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-collapse collapse', 'menu_class' => 'nav menu pull-right', 'depth' => '1' , 'walker' => new Tw_Walker_Nav_Menu) ); ?>


        </div>
      </div>
</div>


	<div id="main" class="site-main clearfix">
	<div class="left-panel clearfix">

		<header id="masthead" class="site-header" role="banner">
			<hgroup>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo">
					<span class="visuallyhidden"><?php bloginfo( 'name' ); ?></span>
					<img class="thelogo" src="<?php bloginfo( 'template_directory' ); ?>/images/logo_color.png" />
				</a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
		</header><!-- #masthead .site-header -->



				<div class="info">
			<div class="langsel">
				<?php // do_action('icl_language_selector'); ?>
   			</div>
			<div class="callmenow">
				+36 20 515-5257
			</div>
		</div>

		<nav role="navigation" class="site-navigation sub-navigation">
			<h3><?php _e( 'Gyroshúsok', 'carnifex' ); ?></h3>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'carnifex' ); ?>"><?php _e( 'Skip to content', 'carnifex' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
		</nav><!-- .site-navigation .sub-navigation -->

		<div class="leftsidebar">
			
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'sidebar-left' ); ?>

		</div>



	</div><!-- .left-panel -->
	<div class="right-panel clearfix">
	<?php /*
	<div class="nav2wrap clearfix ">
			<nav role="navigation" class="site-navigation2 main-navigation2">
				<h3 class="assistive-text"><?php _e( 'Menu', 'carnifex' ); ?></h3>
				<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'carnifex' ); ?>"><?php _e( 'Skip to content', 'carnifex' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- .site-navigation2 .main-navigation2 -->
	</div> */ ?>

