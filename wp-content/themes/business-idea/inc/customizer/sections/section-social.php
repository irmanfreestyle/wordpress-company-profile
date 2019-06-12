<?php 
function business_idea_section_social( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	$wp_customize->add_panel( 'social_panel', array(
		'priority'       => 53,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Social', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'social_setting' , array(
			'title'      => __('Social Settings', 'business-idea'),
			'panel'  => 'social_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_social_disable]' , array(
			'default'    => $business_idea_option['business_idea_social_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_social_disable]' , array(
			'label' => __('Hide Social Section?','business-idea' ),
			'description' => __('Check this setting to hide social section from the FrontPage.','business-idea' ),
			'section' => 'social_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_socialtitle]' , array(
			'default'    => $business_idea_option['business_idea_socialtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_socialtitle]' , array(
			'label' => __('Social Title','business-idea' ),
			'description' => __('This setting for social section title.','business-idea' ),
			'section' => 'social_setting',
			'type'=>'text',
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_social_titleColor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => sprintf($business_idea_option['business_idea_social_titleColor']),
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_social_titleColor]',
                array(
                    'label'       => esc_html__( 'Section Title Color', 'business-idea' ),
                    'section'     => 'social_setting',
                    'description' => 'Select your custom text color.',
                )
            ));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_facebook_link]' , array(
			'default'    => $business_idea_option['business_idea_facebook_link'],
			'sanitize_callback' => 'esc_url',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_facebook_link]' , array(
			'label' => __('Facebook URL','business-idea' ),
			'description' => __('This setting for facebook url','business-idea' ),
			'section' => 'social_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_twitter_link]' , array(
			'default'    => $business_idea_option['business_idea_twitter_link'],
			'sanitize_callback' => 'esc_url',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_twitter_link]' , array(
			'label' => __('Twitter URL','business-idea' ),
			'description' => __('This setting for twitter url','business-idea' ),
			'section' => 'social_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_google_plus_link]' , array(
			'default'    => $business_idea_option['business_idea_google_plus_link'],
			'sanitize_callback' => 'esc_url',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_google_plus_link]' , array(
			'label' => __('Google Plus URL','business-idea' ),
			'description' => __('This setting for google plus url','business-idea' ),
			'section' => 'social_setting',
			'type'=>'text',
			) );
			
		
		$wp_customize->add_section( 'social_background' , array(
			'title'      => __('Section Background', 'business-idea'),
			'panel'  => 'social_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_social_bgcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => $business_idea_option['business_idea_social_bgcolor'],
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_social_bgcolor]',
                array(
                    'label'       => esc_html__( 'Background Color', 'business-idea' ),
                    'section'     => 'social_background',
                    'description' => 'Change the background color of this section.',
                )
            ));
}
add_action( 'customize_register', 'business_idea_section_social' );