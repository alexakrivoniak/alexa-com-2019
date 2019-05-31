<?php
/**
 * Alexa Krivoniak Portfolio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alexa_Krivoniak_Portfolio
 */

if ( ! function_exists( 'alexa_krivoniak_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alexa_krivoniak_portfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Alexa Krivoniak Portfolio, use a find and replace
	 * to change 'alexa-krivoniak-portfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alexa-krivoniak-portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'alexa-krivoniak-portfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alexa_krivoniak_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'alexa_krivoniak_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alexa_krivoniak_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alexa_krivoniak_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'alexa_krivoniak_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alexa_krivoniak_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alexa-krivoniak-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alexa-krivoniak-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alexa_krivoniak_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alexa_krivoniak_portfolio_scripts() {
	wp_enqueue_style( 'alexa-krivoniak-portfolio-style', get_stylesheet_uri() );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/generic-grid.css', '1', null );

	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), true );
	wp_enqueue_script( 'alexa-krivoniak-portfolio-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), null, true );
	wp_enqueue_script( 'alexa-krivoniak-portfolio-waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array(), null, true );
	wp_enqueue_script( 'alexa-krivoniak-portfolio-retina', get_template_directory_uri() . '/assets/js/retina-1.1.0.min.js', array(), null, true );
	wp_enqueue_script( 'alexa-krivoniak-portfolio-main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );

	wp_enqueue_script( 'alexa-krivoniak-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexa_krivoniak_portfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
