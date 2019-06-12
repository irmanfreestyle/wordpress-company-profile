<?php 
function business_idea_section_contact( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	$wp_customize->add_panel( 'contact_panel', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Contact', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'contact_setting' , array(
			'title'      => __('Contact Settings', 'business-idea'),
			'panel'  => 'contact_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_contact_disable]' , array(
			'default'    => $business_idea_option['business_idea_contact_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contact_disable]' , array(
			'label' => __('Hide Contact Section?','business-idea' ),
			'description' => __('Check this setting to hide contact section from the FrontPage.','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contacttitle]' , array(
			'default'    => $business_idea_option['business_idea_contacttitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contacttitle]' , array(
			'label' => __('Contact Title','business-idea' ),
			'description' => __('This setting for contact section title.','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactsubtitle]' , array(
			'default'    => $business_idea_option['business_idea_contactsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactsubtitle]' , array(
			'label' => __('Contact Subtitle','business-idea' ),
			'description' => __('This setting for contact section subttitle.','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactcontent]' , array(
			'default'    => $business_idea_option['business_idea_contactcontent'],
			'sanitize_callback' => 'wp_kses_post',
			'type'=>'option',
			));
			$wp_customize->add_control( 'business_idea_option[business_idea_contactcontent]' , array(
			'label' => __('Contact Description','business-idea' ),
			'description' => __('This setting for contact section description.','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'textarea',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactaddress]' , array(
			'default'    => $business_idea_option['business_idea_contactaddress'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactaddress]' , array(
			'label' => __('Address','business-idea' ),
			'description' => __('This setting for address','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactphone]' , array(
			'default'    => $business_idea_option['business_idea_contactphone'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactphone]' , array(
			'label' => __('Phone','business-idea' ),
			'description' => __('This setting for phone number','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactemail]' , array(
			'default'    => $business_idea_option['business_idea_contactemail'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactemail]' , array(
			'label' => __('Email','business-idea' ),
			'description' => __('This setting for email id','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactwebsite]' , array(
			'default'    => $business_idea_option['business_idea_contactwebsite'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactwebsite]' , array(
			'label' => __('Website','business-idea' ),
			'description' => __('This setting for website','business-idea' ),
			'section' => 'contact_setting',
			'type'=>'text',
			) );
		$wp_customize->add_section( 'contact_content' , array(
			'title'      => __('Contact Form Shortcode', 'business-idea'),
			'panel'  => 'contact_panel',
		) );
			
			$wp_customize->add_setting(
				'business_idea_contactform_info', array(
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new business_idea_Contactform_Info(
					$wp_customize, 'business_idea_contactform_info', array(
						'label' => esc_html__( 'Instructions', 'business-idea' ),
						'section' => 'contact_content',
						'capability' => 'install_plugins',
					)
				)
			);
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_contactshortcode]' , array(
			'default'    => $business_idea_option['business_idea_contactshortcode'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_contactshortcode]' , array(
			'label' => __('Contact Form Shortcode','business-idea' ),
			'description' => __('This setting for contact form shortcode','business-idea' ),
			'section' => 'contact_content',
			'type'=>'text',
			) );
			
		$wp_customize->add_section( 'contact_background' , array(
			'title'      => __('Section Background', 'business-idea'),
			'panel'  => 'contact_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_contact_bgcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => sprintf($business_idea_option['business_idea_contact_bgcolor']),
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_contact_bgcolor]',
                array(
                    'label'       => esc_html__( 'Background Color', 'business-idea' ),
                    'section'     => 'contact_background',
                    'description' => 'Change the background color of this section.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_contact_bgimage]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => sprintf($business_idea_option['business_idea_contact_bgimage']),
					'type'=>'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'business_idea_option[business_idea_contact_bgimage]',
				array(
					'label' 		=> esc_html__('Background image', 'business-idea'),
					'section' 		=> 'contact_background',
					'description' => 'Upload the background image for this section.',
				)
			));
}
add_action( 'customize_register', 'business_idea_section_contact' );