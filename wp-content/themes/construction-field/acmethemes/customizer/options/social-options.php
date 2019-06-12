<?php
/*adding sections for header social options */
$wp_customize->add_section( 'construction-field-social-options', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Social Options', 'construction-field' ),
    'panel'                 => 'construction-field-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-social-data]', array(
	'sanitize_callback'     => 'construction_field_sanitize_social_data',
	'default'               => $defaults['construction-field-social-data']
) );
$wp_customize->add_control(
	new Construction_Field_Repeater_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-social-data]',
		array(
			'label'                         => esc_html__('Social Options Selection','construction-field'),
			'description'                   => esc_html__('Select Social Icons and enter link','construction-field'),
			'section'                       => 'construction-field-social-options',
			'settings'                      => 'construction_field_theme_options[construction-field-social-data]',
			'repeater_main_label'           => esc_html__('Social Icon','construction-field'),
			'repeater_add_control_field'    => esc_html__('Add New Icon','construction-field')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'construction-field' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'construction-field' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'construction-field' ),
			)
		)
	)
);