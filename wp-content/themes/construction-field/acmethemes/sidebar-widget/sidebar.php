<?php
/**
 * Sanitize choices
 * @since Construction Field 1.0.0
 * @param null
 * @return string $construction_field_about_column_number
 *
 */
if ( ! function_exists( 'construction_field_sanitize_choice_options' ) ) :
	function construction_field_sanitize_choice_options( $value, $choices, $default ) {
		$input = wp_kses_post( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 *
 * @return array $construction_field_about_column_number
 *
 */
if ( ! function_exists( 'construction_field_background_options' ) ) :
	function construction_field_background_options() {
		$construction_field_about_column_number = array(
			'default'   => esc_html__( 'Default', 'construction-field' ),
			'gray'      => esc_html__( 'Gray', 'construction-field' )
		);

		return apply_filters( 'construction_field_background_options', $construction_field_about_column_number );
	}
endif;

/**
 * Column Number
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 *
 * @return array $construction_field_about_column_number
 *
 */
if ( ! function_exists( 'construction_field_widget_column_number' ) ) :
	function construction_field_widget_column_number() {
		$construction_field_about_column_number = array(
			1 => esc_html__( '1', 'construction-field' ),
			2 => esc_html__( '2', 'construction-field' ),
			3 => esc_html__( '3', 'construction-field' ),
			4 => esc_html__( '4', 'construction-field' )
		);
		return apply_filters( 'construction_field_widget_column_number', $construction_field_about_column_number );
	}
endif;

/**
 * Widget Image Popup Type
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return array $construction_field_gallery_image_popup
 *
 */
if ( !function_exists('construction_field_gallery_image_popup') ) :
	function construction_field_gallery_image_popup() {
		$construction_field_gallery_image_popup =  array(
			'gallery'   => esc_html__( 'Gallery', 'construction-field' ),
			'single'    => esc_html__( 'Single', 'construction-field' ),
			'disable'   => esc_html__( 'Disable', 'construction-field' ),
		);
		return apply_filters( 'construction_field_gallery_image_popup', $construction_field_gallery_image_popup );
	}
endif;

/**
 * Content From
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 *
 * @return array $construction_field_content_from
 *
 */
if ( ! function_exists( 'construction_field_content_from' ) ) :
	function construction_field_content_from() {
		$construction_field_about_column_number = array(
			'excerpt' => esc_html__( 'Excerpt', 'construction-field' ),
			'content' => esc_html__( 'Content', 'construction-field' )
		);
		return apply_filters( 'construction_field_content_from', $construction_field_about_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function construction_field_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'construction-field' ),
        'id'            => 'construction-field-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( is_customize_preview() ) {
        $construction_field_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'construction-field' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $construction_field_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'construction-field' );
    }
    register_sidebar(array(
        'name'          => esc_html__('Home Main Content Area', 'construction-field'),
        'id'            => 'construction-field-home',
        'description'	=> $construction_field_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title init-animate zoomIn"><span>',
        'after_title'   => '</span></h2>',
    ));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'construction-field' ),
		'id'            => 'construction-field-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name'          => esc_html__('Footer Column One', 'construction-field'),
        'id'            => 'footer-col-one',
        'description'   => esc_html__('Displays items on top footer section.', 'construction-field'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Two', 'construction-field'),
        'id'            => 'footer-col-two',
        'description'   => esc_html__('Displays items on top footer section.', 'construction-field'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Three', 'construction-field'),
        'id'            => 'footer-col-three',
        'description'   => esc_html__('Displays items on top footer section.', 'construction-field'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Four', 'construction-field'),
        'id'            => 'footer-col-four',
        'description'   => esc_html__('Displays items on top footer section.', 'construction-field'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

	register_sidebar(array(
		'name'          => esc_html__('Popup Widget Area', 'construction-field'),
		'id'            => 'popup-widget-area',
		'description'   => esc_html__('Displays items on Pop up', 'construction-field'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));

    /*Widgets*/
	register_widget( 'Construction_Field_About' );
	register_widget( 'Construction_Field_Accordion' );
	register_widget( 'Construction_Field_Posts_Col' );
	register_widget( 'Construction_Field_Contact' );
	register_widget( 'Construction_Field_Service' );
	register_widget( 'Construction_Field_Gallery' );
	register_widget( 'Construction_Field_Social' );
	register_widget( 'Construction_Field_Team' );
	register_widget( 'Construction_Field_Testimonial' );
	register_widget( 'Construction_Field_Feature' );
}
add_action( 'widgets_init', 'construction_field_widgets_init' );

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'construction_field_get_edit_post_link' );
function construction_field_get_edit_post_link(){
    if( isset( $_GET['id'] ) ){
	    $id = absint( $_GET['id'] );
	    if( get_edit_post_link( $id ) ){
		    ?>
            <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
			    <?php _e('Full Edit','construction-field');?>
            </a>
		    <?php
	    }
	    else{
		    echo 0;
	    }
	    exit;
    }
}