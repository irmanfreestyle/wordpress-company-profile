<?php
function business_max_slider_setting( $wp_customize ){
	$option = wp_parse_args(  get_option( 'businessmax_options', array() ), business_max_data() );

	$wp_customize->add_setting( 'businessmax_options[hero_section]' , array(
	'default'    => $option['hero_section'],
	'sanitize_callback' => 'business_max_sanitize_checkbox',
	'type'=>'option'
	));
	$wp_customize->add_control('businessmax_options[hero_section]' , array(
	'label' => __('Slider Enable','business-max' ),
	'section' => 'slider_section',
	'type'=>'checkbox',
	) );

	$wp_customize->add_setting('businessmax_options[hero_media]',
		array(
			'sanitize_callback' => 'business_max_sanitize_repeatable_data_field',
			'transport' => 'refresh',
			'type'=>'option',
			'default' => json_encode( array(
				array(
					'image'=> array(
						'url' => get_template_directory_uri().'/images/slide1.jpg',
						'id' => ''
					)
				)
			) )
		) );
		$wp_customize->add_control(
			new business_max_Customize_Repeatable_Control(
				$wp_customize,
				'businessmax_options[hero_media]',
				array(
					'label'     => esc_html__('Background Images', 'business-max'),
					'description'   => '',
					'section'       => 'slider_section',
					'title_format'  => esc_html__( 'Background', 'business-max'),
					'max_item'      => 2,
					'fields'    => array(
						'image' => array(
							'title' => esc_html__('Background Image', 'business-max'),
							'type'  =>'media',
							'default' => array(
								'url' => get_template_directory_uri().'/images/slide1.jpg',
								'id' => ''
							)
						),
						'large_text' => array(
							'title' => esc_html__('Large Text', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'small_text' => array(
							'title' => esc_html__('Small Text', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'buttontext' => array(
							'title' => esc_html__('Button Text', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
						'buttonlink' => array(
							'title' => esc_html__('Button Link', 'business-max'),
							'type'  =>'text',
							'desc'  => '',
						),
					),
				)
			)
		);

}
add_action( 'customize_register', 'business_max_slider_setting' );