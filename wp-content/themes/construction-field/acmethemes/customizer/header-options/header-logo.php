<?php
/*Site Logo*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-display-site-logo'],
	'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'construction-field' ),
	'section'   => 'title_tagline',
	'settings'  => 'construction_field_theme_options[construction-field-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-display-site-title'],
	'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'construction-field' ),
	'section'   => 'title_tagline',
	'settings'  => 'construction_field_theme_options[construction-field-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-display-site-tagline'],
	'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'construction-field' ),
	'section'   => 'title_tagline',
	'settings'  => 'construction_field_theme_options[construction-field-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );