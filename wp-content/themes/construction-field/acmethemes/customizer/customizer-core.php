<?php
/**
 * Header Image Display Options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_header_image_display
 *
 */
if ( !function_exists('construction_field_header_image_display') ) :
	function construction_field_header_image_display() {
		$construction_field_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'construction-field' ),
			'bg-image'          => esc_html__( 'Background Image', 'construction-field' ),
			'normal-image'      => esc_html__( 'Normal Image', 'construction-field' )
		);
		return apply_filters( 'construction_field_header_image_display', $construction_field_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_menu_right_button_link_options
 *
 */
if ( !function_exists('construction_field_menu_right_button_link_options') ) :
	function construction_field_menu_right_button_link_options() {
		$construction_field_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'construction-field' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'construction-field' ),
			'link'          => esc_html__( 'One Link', 'construction-field' )
		);
		return apply_filters( 'construction_field_menu_right_button_link_options', $construction_field_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_header_top_display_selection
 *
 */
if ( !function_exists('construction_field_header_top_display_selection') ) :
	function construction_field_header_top_display_selection() {
		$construction_field_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'construction-field' ),
			'left'          => esc_html__( 'on Top Left', 'construction-field' ),
			'right'         => esc_html__( 'on Top Right', 'construction-field' )
		);
		return apply_filters( 'construction_field_header_top_display_selection', $construction_field_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $construction_field_slider_text_align
 *
 */
if ( !function_exists('construction_field_slider_text_align') ) :
	function construction_field_slider_text_align() {
		$construction_field_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'construction-field' ),
			'text-left'     => esc_html__( 'Left', 'construction-field' ),
			'text-right'    => esc_html__( 'Right', 'construction-field' ),
			'text-center'   => esc_html__( 'Center', 'construction-field' )
		);
		return apply_filters( 'construction_field_slider_text_align', $construction_field_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_fs_image_display_options
 *
 */
if ( !function_exists('construction_field_fs_image_display_options') ) :
	function construction_field_fs_image_display_options() {
		$construction_field_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'construction-field' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'construction-field' )
		);
		return apply_filters( 'construction_field_fs_image_display_options', $construction_field_fs_image_display_options );
	}
endif;

/**
 * Feature Info display Options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_feature_info_display_options
 *
 */
if ( !function_exists('construction_field_feature_info_display_options') ) :
	function construction_field_feature_info_display_options() {
		$construction_field_feature_info_display_options =  array(
			'hide'                  => esc_html__( 'Hide', 'construction-field' ),
			'alternative-info-menu' => esc_html__( 'Alternative Menu', 'construction-field' ),
			'above'                 => esc_html__( 'Above Feature Slider', 'construction-field' ),
			'below'                 => esc_html__( 'Below Feature Slider', 'construction-field' ),
			'absolute'              => esc_html__( 'Absolute Feature Slider', 'construction-field' ),
		);
		return apply_filters( 'construction_field_feature_info_display_options', $construction_field_feature_info_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_feature_info_number
 *
 */
if ( !function_exists('construction_field_feature_info_number') ) :
	function construction_field_feature_info_number() {
		$construction_field_feature_info_number =  array(
			1               => esc_html__( '1', 'construction-field' ),
			2               => esc_html__( '2', 'construction-field' ),
			3               => esc_html__( '3', 'construction-field' ),
			4               => esc_html__( '4', 'construction-field' ),
		);
		return apply_filters( 'construction_field_feature_info_number', $construction_field_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_footer_copyright_beside_option
 *
 */
if ( !function_exists('construction_field_footer_copyright_beside_option') ) :
	function construction_field_footer_copyright_beside_option() {
		$construction_field_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'construction-field' ),
			'social'        => esc_html__( 'Social Links', 'construction-field' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'construction-field' )
		);
		return apply_filters( 'construction_field_footer_copyright_beside_option', $construction_field_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_sidebar_layout
 *
 */
if ( !function_exists('construction_field_sidebar_layout') ) :
    function construction_field_sidebar_layout() {
        $construction_field_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'construction-field' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'construction-field' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'construction-field' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'construction-field' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'construction-field' )
        );
        return apply_filters( 'construction_field_sidebar_layout', $construction_field_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_blog_archive_feature_layout
 *
 */
if ( !function_exists('construction_field_blog_archive_feature_layout') ) :
    function construction_field_blog_archive_feature_layout() {
        $construction_field_blog_archive_feature_layout =  array(
            'left-image'    => esc_html__( 'Show Image', 'construction-field' ),
            'no-image'      => esc_html__( 'No Image', 'construction-field' )
        );
        return apply_filters( 'construction_field_blog_archive_feature_layout', $construction_field_blog_archive_feature_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_blog_archive_content_from
 *
 */
if ( !function_exists('construction_field_blog_archive_content_from') ) :
	function construction_field_blog_archive_content_from() {
		$construction_field_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'construction-field' ),
			'content'    => esc_html__( 'Content', 'construction-field' )
		);
		return apply_filters( 'construction_field_blog_archive_content_from', $construction_field_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_get_image_sizes_options
 *
 */
if ( !function_exists('construction_field_get_image_sizes_options') ) :
	function construction_field_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'construction-field' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'construction-field' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'construction_field_get_image_sizes_options', $choices );
	}
endif;

/**
 * Default Theme layout options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_theme_layout
 *
 */
if ( !function_exists('construction_field_get_default_theme_options') ) :
    function construction_field_get_default_theme_options() {

        $default_theme_options = array(

	        /*logo and site title*/
	        'construction-field-display-site-logo'      => '',
	        'construction-field-display-site-title'     => 1,
	        'construction-field-display-site-tagline'   => 1,

	        /*header height*/
	        'construction-field-header-height'          => 300,
	        'construction-field-header-image-display'   => 'bg-image',

            /*header top*/
            'construction-field-enable-header-top'       => '',
	        'construction-field-header-top-menu-display-selection'      => 'right',
	        'construction-field-header-top-news-display-selection'      => 'left',
	        'construction-field-header-top-social-display-selection'    => 'right',
            'construction-field-newsnotice-title'       => esc_html__( 'News :', 'construction-field' ),
            'construction-field-newsnotice-cat'         => 0,

	        /*menu options*/
            'construction-field-enable-sticky'                  => '',
	        'construction-field-menu-right-button-options'      => 'disable',
	        'construction-field-menu-right-button-title'        => esc_html__('Request a Quote','construction-field'),
	        'construction-field-menu-right-button-link'         => '',
            'construction-field-enable-cart-icon'               => '',

	        /*feature section options*/
	        'construction-field-enable-feature'                         => '',
	        'construction-field-slides-data'                            => '',
            'construction-field-feature-slider-enable-animation'        => 1,
            'construction-field-feature-slider-display-title'           => 1,
            'construction-field-feature-slider-display-excerpt'         => 1,
            'construction-field-fs-image-display-options'               => 'full-screen-bg',
            'construction-field-feature-slider-text-align'              => 'text-left',

	        /*basic info*/
	        'construction-field-feature-info-display-options'           => 'hide',
	        'construction-field-feature-info-number'    => 4,
	        'construction-field-first-info-icon'        => 'fa-calendar',
	        'construction-field-first-info-title'       => esc_html__('Send Us a Mail', 'construction-field'),
	        'construction-field-first-info-desc'        => esc_html__('domain@example.com ', 'construction-field'),
	        'construction-field-second-info-icon'       => 'fa-map-marker',
	        'construction-field-second-info-title'      => esc_html__('Our Location', 'construction-field'),
	        'construction-field-second-info-desc'       => esc_html__('Elmonte California', 'construction-field'),
	        'construction-field-third-info-icon'        => 'fa-phone',
	        'construction-field-third-info-title'       => esc_html__('Call Us', 'construction-field'),
	        'construction-field-third-info-desc'        => esc_html__('01-23456789-10', 'construction-field'),
	        'construction-field-forth-info-icon'        => 'fa-envelope-o',
	        'construction-field-forth-info-title'       => esc_html__('Office Hours', 'construction-field'),
	        'construction-field-forth-info-desc'        => esc_html__('8 hours per day', 'construction-field'),

            /*footer options*/
            'construction-field-footer-copyright'                       => esc_html__( '&copy; Custom Copyright', 'construction-field' ),
	        'construction-field-footer-copyright-beside-option'         => 'footer-menu',
	        'construction-field-footer-bg-img'                          => '',

	        /*layout/design options*/
	        'construction-field-enable-animation'       => '',

	        'construction-field-single-sidebar-layout'                  => 'right-sidebar',
            'construction-field-front-page-sidebar-layout'              => 'right-sidebar',
            'construction-field-archive-sidebar-layout'                 => 'right-sidebar',

            'construction-field-blog-archive-img-size'                  => 'full',
            'construction-field-blog-archive-content-from'              => 'excerpt',
            'construction-field-blog-archive-excerpt-length'            => 42,
	        'construction-field-blog-archive-more-text'                 => esc_html__( 'Read More', 'construction-field' ),
	        'construction-field-exclude-categories'                 => '',

	        'construction-field-primary-color'          => '#fab702',
            'construction-field-header-top-bg-color'    => '#fab702',
            'construction-field-footer-bg-color'        => '#242424',
            'construction-field-footer-bottom-bg-color' => '#131313',

	        /*Front Page*/
            'construction-field-hide-front-page-content' => '',
            'construction-field-hide-front-page-header'  => '',

	        /*woocommerce*/
	        'construction-field-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
	        'construction-field-wc-product-column-number'           => 4,
	        'construction-field-wc-shop-archive-total-product'      => 16,
	        'construction-field-wc-single-product-sidebar-layout'   => 'no-sidebar',

	        /*single post*/
	        'construction-field-single-header-title'            => esc_html__( 'Blog', 'construction-field' ),
	        'construction-field-single-img-size'                => 'full',

	        /*theme options*/
            'construction-field-popup-widget-title'     => esc_html__( 'Request a Quote', 'construction-field' ),
	        'construction-field-show-breadcrumb'        => 1,
            'construction-field-search-placeholder'     => esc_html__( 'Search', 'construction-field' ),
            'construction-field-social-data'            => ''
        );
        return apply_filters( 'construction_field_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array construction_field_theme_options
 *
 */
if ( !function_exists('construction_field_get_theme_options') ) :
    function construction_field_get_theme_options() {

        $construction_field_default_theme_options = construction_field_get_default_theme_options();
        $construction_field_get_theme_options = get_theme_mod( 'construction_field_theme_options');
        if( is_array( $construction_field_get_theme_options )){
            return array_merge( $construction_field_default_theme_options ,$construction_field_get_theme_options );
        }
        else{
            return $construction_field_default_theme_options;
        }
    }
endif;