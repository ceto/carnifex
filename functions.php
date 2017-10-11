<?php
/**
 * Carnifex functions and definitions
 *
 * @package Carnifex
 * @since Carnifex 1.0
 */

define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
//define('ICL_DONT_LOAD_LANGUAGES_JS', true);

add_image_size( 'product-large', 800, 600  ); //(cropped)
add_image_size( 'product-normal', 450, 450, true ); //(cropped)
add_image_size( 'product-medium', 270, 270, true ); //(cropped)
add_image_size( 'product-small', 120,120, true ); //(cropped)

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Carnifex 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'carnifex_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Carnifex 1.0
 */



function carnifex_setup() {

	require( get_template_directory() . '/inc/product.inc.php' );
	require( get_template_directory() . '/inc/menu_walker.inc.php' );
	require( get_template_directory() . '/inc/gallery.inc.php' );

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Carnifex, use a find and replace
	 * to change 'carnifex' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'carnifex', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'carnifex' ),
	) );

	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'carnifex' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // carnifex_setup
add_action( 'after_setup_theme', 'carnifex_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Carnifex 1.0
 */
function carnifex_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'carnifex' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'carnifex' ),
		'id' => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'carnifex_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function carnifex_scripts() {
	//wp_enqueue_style( 'style', get_stylesheet_uri() );

	//wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array(/* 'jquery'*/ ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array(/* 'jquery'*/ ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'carnifex_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );




function my_deregister_styles() {
	wp_deregister_style( 'contact-form-7' );
	//wp_deregister_style( 'wp-mailchimpSF_main_css' );
	//wp_deregister_style( 'responsive-slider' );
	// wp_deregister_style( 'testimonials-widget');
    // deregister as many stylesheets as you need...
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );


function my_deregister_javascript() {
//  if ( !is_page('Contact') ) {
//    wp_deregister_script( 'contact-form-7' );
//  }
}
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

//wp_enqueue_script( 'contact-form-7', wpcf7_plugin_url( 'scripts.js' ), array( 'jquery', 'jquery-form' ), WPCF7_VERSION, $in_footer );
//wp_enqueue_style( 'contact-form-7', wpcf7_plugin_url( 'styles.css' ), array(), WPCF7_VERSION, 'all' );