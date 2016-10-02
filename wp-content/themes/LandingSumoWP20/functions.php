<?php
/**
 * bootstrapwp functions and definitions
 *
 * @package bootstrapwp
 */

// Include the Redux theme options Framework
if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/redux/framework.php' );
}

// Register all the theme options
require_once( get_template_directory() . '/inc/redux-config.php' );

// Theme options functions
require_once( get_template_directory() . '/inc/bswp-options.php' );



if ( ! function_exists( 'bootstrapwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootstrapwp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootstrapwp, use a find and replace
	 * to change 'bootstrapwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootstrapwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bootstrapwp' ),
	) );

	register_nav_menus( array(
		'footer-menu' => __( 'Footer Menu', 'bootstrapwp' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link'
	// ) );

}
endif; // bootstrapwp_setup
add_action( 'after_setup_theme', 'bootstrapwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bootstrapwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bootstrapwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bootstrapwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootstrapwp_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all' );

	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array(), '4.2.0', 'all' );

	wp_enqueue_style( 'bootstrapwp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	wp_enqueue_script( 'retina-js', get_template_directory_uri() . '/js/retina-1.1.0.js', array(), '1.1.0', true );

	wp_enqueue_script( 'ie10-js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array(), '3.3.4', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '3.3.4', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrapwp_scripts' );

// Browser Specific CSS
if ( !function_exists('bswp_ie_css') ) {
	add_action('wp_head', 'bswp_ie_css');
	function bswp_ie_css() {
		echo '<!--[if lt IE 9]>';
			echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
			echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
		echo '<![endif]-->';
	} // End function
} // End if

// Google Font
if ( !function_exists('bswp_google_font') ) {
	add_action('wp_head', 'bswp_google_font');
	function bswp_google_font() {
			echo '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet" type="text/css">';
	} // End function
} // End if

/**
 * Remove Posts section from WordPress Dashboard.
 */
require get_template_directory() . '/inc/remove-posts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';


/**
 * Search Results - Highlight.
 */
require get_template_directory() . '/inc/search-highlight.php';

/**
 * Theme Options - Custom CSS.
 */
require get_template_directory() . '/inc/custom-css.php';

/**
 * Pricing Table Shortcode
 */
require get_template_directory() . '/inc/pricing-shortcode.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/post-types/CPT.php';
//Portfolio Custom Post Type
require get_template_directory() . '/inc/post-types/register-post-types.php';