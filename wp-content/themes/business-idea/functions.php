<?php
if( !function_exists('business_idea_setup') ){
	function business_idea_setup(){
		
		// Set the default content width.
		$GLOBALS['content_width'] = 800;
		
		// Add default posts and comments RSS feed links to head.
		
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		load_theme_textdomain( 'business-idea', get_template_directory() . '/languages' );		
		
		add_post_type_support( 'page', 'excerpt' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		// This theme uses wp_nav_menu() in only one location.
		register_nav_menus( array(
			'primary'      => esc_html__( 'Primary Menu', 'business-idea' ),
		) );
		
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( array( '/assets/css/editor-style.css' ) );
		
		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
        ) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
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
		
		add_theme_support( 'recommend-plugins', array(
			'webdzier-companion' => array(
                'name' => esc_html__( 'Webdzier Companion', 'business-idea' ),
                'desc' => esc_html__( 'We highly recommend that you install the webdzier companion plugin to gain access to the team and testimonial sections.', 'business-idea' ),
                'active_filename' => 'webdzier-companion/webdzier-companion.php',
            ),
            'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'business-idea' ),
				'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on Front Page contact section and Contact custom page template.', 'business-idea' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
            ),
        ) );
		
		$args = array(
			'width'        => 1600,
			'flex-width'   => true,
			'default-image' => get_template_directory_uri() . '/images/sub-header.jpg',
			// Header text
			'header-text'   => false,
		);
		add_theme_support( 'custom-header', $args );
		
		// Add custom background support. https://codex.wordpress.org/Custom_Backgrounds
		add_theme_support( 'custom-background', array(
				'default-color' => '#DCE4D7',
			)
		);
		
		/*
		 * Widget text support shortcode
		 */
		add_filter('widget_text','do_shortcode');
		
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );
		
		if ( class_exists( 'WooCommerce' ) ) {
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	
	}
}
add_action( 'after_setup_theme', 'business_idea_setup' );
function business_idea_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_idea_content_width', 750 );
}
add_action( 'after_setup_theme', 'business_idea_content_width', 0 );
/**
 * Google fonts
 */
if ( ! function_exists( 'business_idea_fonts' ) ) :
	function business_idea_fonts() {
	    $fontsurl = '';
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'business-idea' );
	    $Poppins = _x( 'on', 'Poppins font: on or off', 'business-idea' );

	    if ( 'off' !== $Poppins || 'off' !== $open_sans ) {
	        $fontfamilies = array();

	        if ( 'off' !== $Poppins ) {
	            $fontfamilies[] = 'Poppins:400,500,600,700,300,100,800,900';
	        }
	        if ( 'off' !== $open_sans ) {
	            $fontfamilies[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
	        }

	        $query_args = array(
	            'family' => rawurlencode( implode( '|', $fontfamilies ) ),
	            'subset' => rawurlencode( 'latin,latin-ext' ),
	        );
	        $fontsurl = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }
	    return esc_url_raw( $fontsurl );
	}
endif;

function business_idea_scripts() {
	$theme = wp_get_theme( 'business-idea' );
    $version = $theme->get( 'Version' );
	
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	if ( ! $business_idea_option['business_idea_googlefonts_disable'] ) {
        wp_enqueue_style('business_idea-fonts', business_idea_fonts(), array(), $version);
    }
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), $version );
	
	wp_enqueue_style( 'business_idea-style', get_template_directory_uri() .'/style.css', array(), $version );

	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css', array(), $version );
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome/css/font-awesome.css', array(), $version );
	
	wp_enqueue_style( 'business_idea-woo', get_template_directory_uri() .'/assets/css/woocommerce.css', array(), $version );	

	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', $version, true );
	
	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/js/wow.js', $version, true );
	
	wp_enqueue_script( 'business_idea-business-js', get_template_directory_uri() . '/assets/js/business.js', $version, true );
	
	wp_enqueue_script( 'materialize-js', get_template_directory_uri() . '/assets/js/materialize.js', $version, true );
	
	wp_enqueue_script( 'easeScroll-js', get_template_directory_uri() . '/assets/js/jquery.easeScroll.js', '', $version, true );
	
	// settings.
    $business_idea_settings = array(
        'hero_slider_speed'     => $business_idea_option['business_idea_slider_animation_speed'],
        'disable_animation'     => $business_idea_option['business_idea_animation_disable'],
    );
	wp_localize_script( 'jquery', 'business_idea_settings', $business_idea_settings );
}
add_action( 'wp_enqueue_scripts', 'business_idea_scripts' );
// media upload
function business_idea_upload_scripts()
{
	 wp_enqueue_media();	
	 wp_enqueue_script('media-upload');
     wp_enqueue_script('thickbox');
     wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/assets/js/upload-media.js', array('jquery'));
	 wp_enqueue_style('thickbox');
}
add_action("admin_enqueue_scripts","business_idea_upload_scripts");
function business_idea_time_activated() {
	update_option( 'business_idea_time_activated', time() );
}
add_action( 'after_switch_theme', 'business_idea_time_activated' );
function business_idea_ready_for_upsells() {
	$activation_time = get_option( 'business_idea_time_activated' );
	if ( ! empty( $activation_time ) ) {
		$current_time    = time();
		$time_difference = 43200;
		if ( $current_time >= $activation_time + $time_difference ) {
			return true;
		} else {
			return false;
		}
	}
	return true;
}
include_once( get_template_directory() . '/inc/default_data.php' );
include_once( get_template_directory() . '/inc/menu/default_menu_walker.php' );
include_once( get_template_directory() . '/inc/menu/business_idea_navwalker.php' );
include_once( get_template_directory() . '/inc/customizer/customizer.php' );
include_once( get_template_directory() . '/inc/template_tags.php' );
include_once( get_template_directory() . '/inc/widgets/sidebar.php' );
include_once( get_template_directory() . '/inc/extra.php' );
include_once( get_template_directory() . '/inc/features/feature-theme-info-section.php' );
include_once( get_template_directory() . '/woocommerce/functions.php' );
include_once( get_template_directory() . '/inc/about-screen/welcome-screen.php' );