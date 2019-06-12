<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'construction-field-search', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Search', 'construction-field' ),
    'panel'             => 'construction-field-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-search-placeholder]', array(
    'label'		        => esc_html__( 'Search Placeholder', 'construction-field' ),
    'section'           => 'construction-field-search',
    'settings'          => 'construction_field_theme_options[construction-field-search-placeholder]',
    'type'	  	        => 'text'
) );