<?php
/*adding sections for feature image selection*/
$wp_customize->add_section( 'construction-field-single-feature-image', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Image Option', 'construction-field' ),
    'panel'          => 'construction-field-single-post'
) );

/*single image size*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-single-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-single-img-size'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_get_image_sizes_options(1);
$wp_customize->add_control( 'construction_field_theme_options[construction-field-single-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Size', 'construction-field' ),
	'section'   => 'construction-field-single-feature-image',
	'settings'  => 'construction_field_theme_options[construction-field-single-img-size]',
	'type'	  	=> 'select'
) );