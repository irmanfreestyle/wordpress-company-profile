<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'construction-field-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Page/Post Sidebar Layout', 'construction-field' ),
    'panel'          => 'construction-field-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-single-sidebar-layout'],
    'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_sidebar_layout();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-single-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Default Page/Post Sidebar Layout', 'construction-field' ),
    'description'       => esc_html__( 'Single Page/Post Sidebar', 'construction-field' ),
    'section'           => 'construction-field-design-sidebar-layout-option',
    'settings'          => 'construction_field_theme_options[construction-field-single-sidebar-layout]',
    'type'	  	        => 'select'
) );