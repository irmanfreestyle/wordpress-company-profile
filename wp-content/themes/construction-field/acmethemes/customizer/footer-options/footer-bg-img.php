<?php
/*adding sections for footer background image*/
$wp_customize->add_section( 'construction-field-footer-bg-img', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Background Image', 'construction-field' ),
    'panel'          => 'construction-field-footer-panel',
) );

/*footer background image*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-footer-bg-img]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-footer-bg-img'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-footer-bg-img]',
        array(
            'label'		=> esc_html__( 'Footer Background Image', 'construction-field' ),
            'section'   => 'construction-field-footer-bg-img',
            'settings'  => 'construction_field_theme_options[construction-field-footer-bg-img]',
            'type'	  	=> 'image'
        )
    )
);