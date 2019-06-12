<?php
/*adding header options panel*/
$wp_customize->add_panel( 'construction-field-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Options', 'construction-field' ),
    'description'    => esc_html__( 'Customize your awesome site header ', 'construction-field' )
) );

/*
* file for header top options
*/
require construction_field_file_directory('acmethemes/customizer/header-options/header-top.php');

/*
* file for header logo options
*/
require construction_field_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
 * file for menu position
*/
require construction_field_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
* file for booking form
*/
require construction_field_file_directory('acmethemes/customizer/header-options/popup-widgets.php');

/*adding header image inside this panel*/
$wp_customize->get_section( 'header_image' )->panel = 'construction-field-header-panel';
$wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'construction-field' );

/* feature section height*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-height]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-header-height'],
    'sanitize_callback' => 'construction_field_sanitize_number'
) );

$wp_customize->add_control( 'construction_field_theme_options[construction-field-header-height]', array(
    'type'              => 'range',
    'priority'          => 100,
    'section'           => 'header_image',
    'label'		        => esc_html__( 'Inner Page Header Section Height', 'construction-field' ),
    'description'       => esc_html__( 'Control the height of Header section. The minimum height is 100px and maximium height is 500px', 'construction-field' ),
    'input_attrs'       => array(
        'min'           => 100,
        'max'           => 500,
        'step'          => 1,
        'class'         => 'construction-field-header-height',
        'style'         => 'color: #0a0',
    ),
    'active_callback'   => 'construction_field_if_header_bg_image'
) );

/*Header Image Display*/
$choices = construction_field_header_image_display();
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-image-display]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['construction-field-header-image-display'],
	'sanitize_callback'         => 'construction_field_sanitize_select'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-header-image-display]', array(
	'choices'  	                => $choices,
	'priority'                  => 1,
	'label'		                => esc_html__( 'Header Image Display', 'construction-field' ),
	'section'                   => 'header_image',
	'settings'                  => 'construction_field_theme_options[construction-field-header-image-display]',
	'type'	  	                => 'select'
) );

/*check if header bg*/
if ( !function_exists('construction_field_if_header_bg_image') ) :
	function construction_field_if_header_bg_image() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 'bg-image' == $construction_field_customizer_all_values['construction-field-header-image-display'] ){
			return true;
		}
		return false;
	}
endif;