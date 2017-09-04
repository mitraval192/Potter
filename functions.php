<?php
/**
 * @package Pottery
 */

/**
 * Set the content width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

if ( ! function_exists( 'pottery_setup' ) ) :

/**
 * Defaults and theme support features.
 */
function pottery_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'pottery-featured', 1200, 9999, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pottery' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery') );

	/*
	 * Let WordPress manage the document title. the theme does not use a  hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
	 */

	add_theme_support( "title-tag" );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bahuballi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif; // pottery_setup
add_action( 'after_setup_theme', 'pottery_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pottery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pottery' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pottery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pottery_scripts() {

	wp_enqueue_style( 'pottery-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pottery-menu', get_template_directory_uri() . '/js/pottery.js', array( 'jquery' ), '0.0.1', true );

	wp_enqueue_script( 'pottery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '0.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pottery_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Register Google Fonts
 */
function pottery_google_fonts() {

	/*	translators: If there are characters in your language that are not supported
		by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'pottery' ) ) {

		wp_register_style( 'pottery-google-sans-pro', "https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300italic,400italic,600italic,700italic&subset=latin,latin-ext" );

	}

}
add_action( 'init', 'pottery_google_fonts' );