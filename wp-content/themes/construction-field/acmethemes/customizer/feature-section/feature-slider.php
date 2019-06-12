<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'construction-field-feature-page', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Slider Selection', 'construction-field' ),
    'panel'          => 'construction-field-feature-panel'
) );

/* feature parent all-slides selection */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Slider Page','construction-field');
foreach ($slider_pages_obj as $page) {
	$slider_pages[$page->ID] = $page->post_title;
}
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-slides-data]', array(
	'sanitize_callback' => 'construction_field_sanitize_slider_data',
	'default'           => $defaults['construction-field-slides-data']
) );
$wp_customize->add_control(
	new Construction_Field_Repeater_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-slides-data]',
		array(
			'label'                         => esc_html__('Slider Selection','construction-field'),
			'description'                   => esc_html__('Select Page For Slider','construction-field'),
			'section'                       => 'construction-field-feature-page',
			'settings'                      => 'construction_field_theme_options[construction-field-slides-data]',
			'repeater_main_label'           => esc_html__('Select Slide of Slider','construction-field'),
			'repeater_add_control_field'    => esc_html__('Add New Slide','construction-field')
		),
		array(
			'selectpage' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Page For Slide', 'construction-field' ),
				'options'     => $slider_pages
			),
			'button_1_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button One Text', 'construction-field' ),
			),
			'button_1_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button One Link', 'construction-field' ),
			),
			'button_2_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button Two Text', 'construction-field' ),
			),
			'button_2_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button Two Link', 'construction-field' ),
			)
		)
	)
);

/*enable animation*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-slider-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-feature-slider-enable-animation'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-slider-enable-animation]', array(
    'label'		        => esc_html__( 'Enable Animation', 'construction-field' ),
    'section'           => 'construction-field-feature-page',
    'settings'          => 'construction_field_theme_options[construction-field-feature-slider-enable-animation]',
    'type'	  	        => 'checkbox'
) );

/*display-title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-slider-display-title]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-feature-slider-display-title'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-slider-display-title]', array(
    'label'		            => esc_html__( 'Display Title', 'construction-field' ),
    'section'               => 'construction-field-feature-page',
    'settings'              => 'construction_field_theme_options[construction-field-feature-slider-display-title]',
    'type'	  	            => 'checkbox'
) );

/*display-excerpt*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-slider-display-excerpt]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-feature-slider-display-excerpt'],
	'sanitize_callback'     => 'construction_field_sanitize_checkbox'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-slider-display-excerpt]', array(
	'label'		            => esc_html__( 'Display Excerpt', 'construction-field' ),
	'section'               => 'construction-field-feature-page',
	'settings'              => 'construction_field_theme_options[construction-field-feature-slider-display-excerpt]',
	'type'	  	            => 'checkbox'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-fs-image-display-options]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['construction-field-fs-image-display-options'],
    'sanitize_callback'     => 'construction_field_sanitize_select'
) );
$choices = construction_field_fs_image_display_options();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-fs-image-display-options]', array(
    'choices'  	            => $choices,
    'label'		            => esc_html__( 'Feature Slider Image Display Options', 'construction-field' ),
    'section'               => 'construction-field-feature-page',
    'settings'              => 'construction_field_theme_options[construction-field-fs-image-display-options]',
    'type'	  	            => 'radio'
) );

/*Slider Selection Text Align*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-slider-text-align]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-feature-slider-text-align'],
	'sanitize_callback'     => 'construction_field_sanitize_select',
) );
$choices = construction_field_slider_text_align();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-slider-text-align]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Slider Text Align', 'construction-field' ),
	'section'               => 'construction-field-feature-page',
	'settings'              => 'construction_field_theme_options[construction-field-feature-slider-text-align]',
	'type'	  	            => 'select'
) );