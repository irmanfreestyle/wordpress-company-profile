<?php
/**
 * construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package construction
 */

if ( ! function_exists( 'construction_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function construction_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on construction, use a find and replace
	 * to change 'construction-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'construction-lite', get_template_directory() . '/languages' );

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

	/**
	* Adding Support for Custom Logo
	*/
	add_theme_support( 'custom-logo' );

	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'construction-lite' ),
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

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'construction_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /** Image Size **/
    add_image_size('construction-lite-slider-image',1920,700,true);
    add_image_size('construction-lite-feature-image',75,75,true);
    add_image_size('construction-lite-portfolio-image',385,383,true);
    add_image_size('construction-lite-blog-image',235,235,true);
    add_image_size('construction-lite-testimonial-image',90,90,true);
    add_image_size('construction-lite-client-image',175,135,true);
    add_image_size('construction-lite-recent-post-image',60,55,true);
    add_image_size('construction-lite-single-page',1243,500,true);
    add_image_size('construction-lite-client-logo',195,160,true);
    add_image_size('construction-lite-team-image',270,325,true);
}
endif;
add_action( 'after_setup_theme', 'construction_lite_setup' );

function construction_lite_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'construction_lite_custom_logo_setup' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function construction_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'construction_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'construction_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function construction_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'construction-lite' ),
		'id'            => 'construction-lite-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Team Member', 'construction-lite' ),
		'id'            => 'construction-lite-team-member',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer One', 'construction-lite' ),
		'id'            => 'construction-lite-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer Two', 'construction-lite' ),
		'id'            => 'construction-lite-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer Three', 'construction-lite' ),
		'id'            => 'construction-lite-footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Header Cart List', 'construction-lite' ),
		'id'            => 'construction-lite-cart-list',
		'description'   => esc_html__( 'Add widgets here.', 'construction-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'construction_lite_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function construction_lite_scripts() {
    $construction_lite_font_query_args = array('family' => 'Merriweather+Sans:300,300i,400,400i,700,700i,800,800i|Droid+Sans:400,700|Merriweather:300,300i,400,400i,700,700i');
	wp_enqueue_style('construction-lite-google-fonts', add_query_arg($construction_lite_font_query_args, "//fonts.googleapis.com/css"));
    wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style( 'construction-lite-style', get_stylesheet_uri() );
    wp_enqueue_style('owl-carousel',get_template_directory_uri(). '/js/owl-carousel/owl.carousel.css');
    wp_enqueue_style('construction-lite-woocommerce-style',get_template_directory_uri(). '/woocommerce/woocommerce-style.css');
    wp_enqueue_style('construction-lite-responsive',get_template_directory_uri(). '/responsive.css');
    wp_enqueue_style('animate',get_template_directory_uri(). '/js/wow-animation/animate.css');
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow-animation/wow.js', array('jquery'));
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery') );
    wp_enqueue_script('owl-carousel',get_template_directory_uri() . '/js/owl-carousel/owl.carousel.js',array('jquery'));
    wp_enqueue_script('construction-lite-custom-script', get_template_directory_uri() . '/js/custom.js',array('jquery','owl-carousel','wow','parallax'));
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'construction_lite_scripts' );

function construction_lite_customizer_live_preview(){
    wp_enqueue_script( 'google-font-webfont','https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js');
    wp_enqueue_script('construction-lite-live-preview',get_template_directory_uri().'/js/customizer-live-preview.js',array( 'jquery','customize-preview' ),true);    
}
add_action( 'customize_preview_init', 'construction_lite_customizer_live_preview' );

function construction_lite_media_uploader(){$currentscreen = get_current_screen();
    if($currentscreen->id == 'widgets'){
        wp_enqueue_script('construction-lite-media-uploader', get_template_directory_uri() . '/inc/admin-panel/js/media-uploader.js',array('jquery'));
        wp_enqueue_media();
    }
    wp_enqueue_style('construction-lite-admin-style',get_template_directory_uri() . '/inc/admin-panel/css/admin-style.css');
}
add_action( 'admin_enqueue_scripts', 'construction_lite_media_uploader' );

/**
 * Enqueue editor styles for Gutenberg
 */
function construction_lite_editor_styles() {
	
	$construction_lite_font_query_args = array('family' => 'Merriweather+Sans:300,300i,400,400i,700,700i,800,800i|Droid+Sans:400,700|Merriweather:300,300i,400,400i,700,700i');
	wp_enqueue_style('construction-lite-google-fonts', add_query_arg($construction_lite_font_query_args, "//fonts.googleapis.com/css"));

    wp_enqueue_style( 'construction-lite-editor-style', get_template_directory_uri() . '/css/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'construction_lite_editor_styles' );

/**
 * Registers an editor stylesheet for the theme.
 */
function construction_lite_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'construction_lite_theme_add_editor_styles' );

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom Customizer Controls
 */
require get_template_directory() . '/inc/customizer-controls.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Customizer Option Fields
 */
require get_template_directory() . '/inc/admin-panel/cunstruction-customizer.php';
/**
 * Construction Function
 */
 require get_template_directory() . '/inc/construction-function.php';
/**
 * Widget Fields
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-widget.php';
/**
 * Team Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-team.php';
/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-recent-post.php';
/**
 * Footer Info Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-info.php';
/**
 * Woocommerce File
 */
require get_template_directory() . '/woocommerce/woocommerce-function.php';
/**
 * Dynamic CSS
 */
require get_template_directory() . '/css/dynamic-css.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/welcome/welcome.php';