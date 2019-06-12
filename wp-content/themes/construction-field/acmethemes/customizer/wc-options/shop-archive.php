<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'construction-field-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'construction-field' ),
	'panel'          => 'construction-field-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_sidebar_layout();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'construction-field' ),
	'section'   => 'construction-field-wc-shop-archive-option',
	'settings'  => 'construction_field_theme_options[construction-field-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'construction-field' ),
	'section'   => 'construction-field-wc-shop-archive-option',
	'settings'  => 'construction_field_theme_options[construction-field-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'construction-field' ),
	'section'   => 'construction-field-wc-shop-archive-option',
	'settings'  => 'construction_field_theme_options[construction-field-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );