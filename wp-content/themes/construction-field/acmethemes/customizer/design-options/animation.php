<?php
/*adding sections for design options panel*/
$wp_customize->add_section( 'construction-field-animation', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Animation', 'construction-field' ),
    'panel'          => 'construction-field-design-panel'
) );

/*enable disable animation*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-enable-animation'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-enable-animation]', array(
    'label'		        => esc_html__( 'Disable animation', 'construction-field' ),
    'description'       => esc_html__( 'Check this to disable overall site animation effect provided by theme', 'construction-field' ),
    'section'           => 'construction-field-animation',
    'settings'          => 'construction_field_theme_options[construction-field-enable-animation]',
    'type'	  	        => 'checkbox'
) );