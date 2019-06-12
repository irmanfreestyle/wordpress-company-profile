<?php 
function webdzierc_section_testimonial( $wp_customize ){
	$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	$wp_customize->add_panel( 'testimonial_panel', array(
		'priority'       => 45,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Testimonial', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'testimonial_setting' , array(
			'title'      => __('Testimonial Settings', 'business-idea'),
			'panel'  => 'testimonial_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_testimonial_disable]' , array(
			'default'    => '',
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_testimonial_disable]' , array(
			'label' => __('Hide Testimonial Section?','business-idea' ),
			'description' => __('Check this setting to hide testimonial section from the FrontPage.','business-idea' ),
			'section' => 'testimonial_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_testimonialtitle]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_testimonialtitle]' , array(
			'label' => __('Testimonial Title','business-idea' ),
			'description' => __('This setting for testimonial section title.','business-idea' ),
			'section' => 'testimonial_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_testimonialsubtitle]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_testimonialsubtitle]' , array(
			'label' => __('Testimonial Subtitle','business-idea' ),
			'description' => __('This setting for testimonial section subtitle.','business-idea' ),
			'section' => 'testimonial_setting',
			'type'=>'text',
			) );
			
		$wp_customize->add_section( 'testimonial_content' , array(
			'title'      => __('testimonial Content', 'business-idea'),
			'panel'  => 'testimonial_panel',
		) );		
			$wp_customize->add_setting('business_idea_option[business_idea_testimonial]',	array(
				'sanitize_callback' => 'business_idea_sanitize_repeatable_data_field',
				'transport' => 'refresh',
				'type'=>'option',
			) );
			$wp_customize->add_control(new business_idea_Customize_Repeatable_Control($wp_customize,
					'business_idea_option[business_idea_testimonial]',
					array(
						'label'     	=> esc_html__('Testimonial content', 'business-idea'),
						'description'   => '',
						'section'       => 'testimonial_content',
						'live_title_id' => 'name', 
						'title_format'  => esc_html__('[live_title]', 'business-idea'), // [live_title]
						'max_item'      => 2,
						'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://webdzier.com/themes/">business_idea Pro</a> to be able to add more items and unlock other premium features!', 'business-idea' ) ),
						'fields'    => array(
							
							'user_id' => array(
								'title' => esc_html__('User media', 'business-idea'),
								'type'  =>'media',
								'desc'  => '',
							),
							'name' => array(
								'title' => esc_html__('Testimonial Name', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
							'designation' => array(
								'title' => esc_html__('Testimonial Designation', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
							'desc' => array(
								'title' => esc_html__('Testimonial Description', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),							
							'link' => array(
								'title' => esc_html__('Custom Link', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
						),

					)
				)
			);
					
}
add_action( 'customize_register', 'webdzierc_section_testimonial' );