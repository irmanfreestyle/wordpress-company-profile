<?php
/*adding sections for header title*/
$wp_customize->add_section( 'construction-field-single-header-title', array(
	'priority'              => 20,
	'capability'            => 'edit_theme_options',
	'title'                 => esc_html__( 'Single Header Title', 'construction-field' ),
	'panel'                 => 'construction-field-single-post',
) );

/*header title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-single-header-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-single-header-title'],
	'sanitize_callback'     => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-single-header-title]', array(
	'label'		            => esc_html__( 'Header Title', 'construction-field' ),
	'section'               => 'construction-field-single-header-title',
	'settings'              => 'construction_field_theme_options[construction-field-single-header-title]',
	'type'	  	            => 'text'
) );