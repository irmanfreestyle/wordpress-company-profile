<?php
function business_max_service_setting( $wp_customize ){
	$option = wp_parse_args(  get_option( 'businessmax_options', array() ), business_max_data() );

	$wp_customize->add_setting( 'businessmax_options[service_section]' , array(
	'default'    => $option['service_section'],
	'sanitize_callback' => 'business_max_sanitize_checkbox',
	'type'=>'option'
	));
	$wp_customize->add_control('businessmax_options[service_section]' , array(
	'label' => __('Service Enable','business-max' ),
	'section' => 'service_section',
	'type'=>'checkbox',
	) );

	$wp_customize->add_setting( 'businessmax_options[service_title]' , array(
	'default'    => $option['service_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));
	$wp_customize->add_control('businessmax_options[service_title]' , array(
	'label' => __('Section Title','business-max' ),
	'section' => 'service_section',
	'type'=>'text',
	) );

	$wp_customize->add_setting( 'businessmax_options[service_subtitle]' , array(
	'default'    => $option['service_subtitle'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));
	$wp_customize->add_control('businessmax_options[service_subtitle]' , array(
	'label' => __('Section Subtitle','business-max' ),
	'section' => 'service_section',
	'type'=>'text',
	) );

	$wp_customize->add_setting('businessmax_options[service_content]',
		array(
			'sanitize_callback' => 'business_max_sanitize_repeatable_data_field',
			'transport' => 'refresh',
			'type'=>'option',
			'default' => json_encode( array(
				array(
					'icon' => '',
					'title' => '',
					'desc' => '',
					'btn_text' => '',
					'link' => '',
				)
			) )
		) );
		$wp_customize->add_control(
			new business_max_Customize_Repeatable_Control(
				$wp_customize,
				'businessmax_options[service_content]',
				array(
					'label'     => esc_html__('Service Content', 'business-max'),
					'description'   => '',
					'section'       => 'service_section',
					'title_format'  => esc_html__( 'Background', 'business-max'),
					'max_item'      => 2,
					'fields'    => array(
						'icon'  => array(
							'title' => esc_html__('Icon', 'business-max'),
							'type'  =>'icon',
						),
						'title' => array(
							'title' => esc_html__('Title', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'desc' => array(
							'title' => esc_html__('Description', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'btn_text' => array(
							'title' => esc_html__('Button Text', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'link' => array(
							'title' => esc_html__('Button Link', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
					),
				)
			)
		);

}
add_action( 'customize_register', 'business_max_service_setting' );