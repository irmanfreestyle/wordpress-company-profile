<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'construction-field-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'construction-field' ),
	'panel'          => 'construction-field-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_sidebar_layout();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'construction-field' ),
	'section'   => 'construction-field-wc-single-product-options',
	'settings'  => 'construction_field_theme_options[construction-field-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );