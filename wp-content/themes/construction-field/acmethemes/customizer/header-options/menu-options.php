<?php
/*check for construction-field-menu-right-button-options*/
if ( !function_exists('construction_field_menu_right_button_if_not_disable') ) :
	function construction_field_menu_right_button_if_not_disable() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 'disable' != $construction_field_customizer_all_values['construction-field-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('construction_field_menu_right_button_if_booking') ) :
	function construction_field_menu_right_button_if_booking() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 'booking' == $construction_field_customizer_all_values['construction-field-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('construction_field_menu_right_button_if_link') ) :
	function construction_field_menu_right_button_if_link() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 'link' == $construction_field_customizer_all_values['construction-field-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

/*Menu Section*/
$wp_customize->add_section( 'construction-field-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Menu Options', 'construction-field' ),
    'panel'          => 'construction-field-header-panel'
) );

/*enable sticky*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-enable-sticky'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );

$wp_customize->add_control( 'construction_field_theme_options[construction-field-enable-sticky]', array(
    'label'		=> esc_html__( 'Enable Sticky Menu', 'construction-field' ),
    'section'   => 'construction-field-menu-options',
    'settings'  => 'construction_field_theme_options[construction-field-enable-sticky]',
    'type'	  	=> 'checkbox'
) );

if( construction_field_is_woocommerce_active() ){
	/*enable cart*/
	$wp_customize->add_setting( 'construction_field_theme_options[construction-field-enable-cart-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['construction-field-enable-cart-icon'],
		'sanitize_callback' => 'construction_field_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'construction_field_theme_options[construction-field-enable-cart-icon]', array(
		'label'		=> esc_html__( 'Enable Cart', 'construction-field' ),
		'section'   => 'construction-field-menu-options',
		'settings'  => 'construction_field_theme_options[construction-field-enable-cart-icon]',
		'type'	  	=> 'checkbox'
	) );
}

/*Button Right Message*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-menu-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-menu-right-button-message]',
		array(
			'section'       => 'construction-field-menu-options',
			'description'   => "<hr /><h2>".esc_html__('Special Button On Menu Right','construction-field')."</h2>",
			'settings'      => 'construction_field_theme_options[construction-field-menu-right-button-message]',
			'type'	  	    => 'message'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-menu-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-menu-right-button-options'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_menu_right_button_link_options();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-menu-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Button Options', 'construction-field' ),
	'section'       => 'construction-field-menu-options',
	'settings'      => 'construction_field_theme_options[construction-field-menu-right-button-options]',
	'type'	  	    => 'select'
) );

/*Button title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-menu-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-menu-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-menu-right-button-title]', array(
	'label'		        => esc_html__( 'Button Title', 'construction-field' ),
	'section'           => 'construction-field-menu-options',
	'settings'          => 'construction_field_theme_options[construction-field-menu-right-button-title]',
	'type'	  	        => 'text',
	'active_callback'   => 'construction_field_menu_right_button_if_not_disable'
) );

/*Button Right booking Message*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-menu-right-button-booking-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));
$description = sprintf( esc_html__( 'Add Popup Widget from %1$s here%2$s ', 'construction-field' ), '<a class="at-customizer" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-menu-right-button-booking-message]',
		array(
			'section'           => 'construction-field-menu-options',
			'description'       => $description,
			'settings'          => 'construction_field_theme_options[construction-field-menu-right-button-booking-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'construction_field_menu_right_button_if_booking'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-menu-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-menu-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-menu-right-button-link]', array(
	'label'		        => esc_html__( 'Button Link', 'construction-field' ),
	'section'           => 'construction-field-menu-options',
	'settings'          => 'construction_field_theme_options[construction-field-menu-right-button-link]',
	'type'	  	        => 'url',
	'active_callback'   => 'construction_field_menu_right_button_if_link'
) );