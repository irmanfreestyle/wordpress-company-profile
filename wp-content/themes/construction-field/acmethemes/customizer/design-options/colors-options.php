<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->get_section( 'colors' )->panel = 'construction-field-design-panel';
$wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'construction-field' );
$wp_customize->get_section( 'background_image' )->priority = 100;

/*Primary color*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-primary-color]',
        array(
            'label'		=> esc_html__( 'Primary Color', 'construction-field' ),
            'section'   => 'colors',
            'settings'  => 'construction_field_theme_options[construction-field-primary-color]',
            'type'	  	=> 'color'
        ) )
);

/*Header TOP color*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-top-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-header-top-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-header-top-bg-color]',
        array(
            'label'		=> esc_html__( 'Header Top Background Color', 'construction-field' ),
            'description'=> esc_html__( 'Also used as secondary color', 'construction-field' ),
            'section'   => 'colors',
            'settings'  => 'construction_field_theme_options[construction-field-header-top-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/* Footer Background Color*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-footer-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-footer-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-footer-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Background Color', 'construction-field' ),
            'section'   => 'colors',
            'settings'  => 'construction_field_theme_options[construction-field-footer-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Footer Bottom Background Color*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-footer-bottom-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-footer-bottom-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-footer-bottom-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Bottom Background Color', 'construction-field' ),
            'section'   => 'colors',
            'settings'  => 'construction_field_theme_options[construction-field-footer-bottom-bg-color]',
            'type'	  	=> 'color'
        )
    )
);