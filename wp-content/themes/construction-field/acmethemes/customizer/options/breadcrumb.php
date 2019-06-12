<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'construction-field-breadcrumb-options', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Breadcrumb Options', 'construction-field' ),
    'panel'             => 'construction-field-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-show-breadcrumb'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );

$wp_customize->add_control( 'construction_field_theme_options[construction-field-show-breadcrumb]', array(
    'label'		        => esc_html__( 'Enable Breadcrumb', 'construction-field' ),
    'section'           => 'construction-field-breadcrumb-options',
    'settings'          => 'construction_field_theme_options[construction-field-show-breadcrumb]',
    'type'	  	        => 'checkbox'
) );