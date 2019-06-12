<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'construction-field-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'construction-field' ),
    'panel'          => 'construction-field-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-front-page-sidebar-layout'],
    'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_sidebar_layout();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-front-page-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Front/Home Sidebar Layout', 'construction-field' ),
    'section'           => 'construction-field-front-page-sidebar-layout',
    'settings'          => 'construction_field_theme_options[construction-field-front-page-sidebar-layout]',
    'type'	  	        => 'select'
) );