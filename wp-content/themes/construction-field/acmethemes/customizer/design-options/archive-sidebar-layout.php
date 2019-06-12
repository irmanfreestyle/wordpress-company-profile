<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'construction-field-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Category/Archive Sidebar Layout', 'construction-field' ),
    'panel'          => 'construction-field-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-archive-sidebar-layout'],
    'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_sidebar_layout();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-archive-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Category/Archive Sidebar Layout', 'construction-field' ),
    'description'       => esc_html__( 'Sidebar Layout for listing pages like category, author etc', 'construction-field' ),
    'section'           => 'construction-field-archive-sidebar-layout',
    'settings'          => 'construction_field_theme_options[construction-field-archive-sidebar-layout]',
    'type'	  	        => 'select'
) );