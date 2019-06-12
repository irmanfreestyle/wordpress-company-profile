<?php 
function webdzierc_customizer_team_section( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	$wp_customize->add_panel( 'team_panel', array(
		'priority'       => 44,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Team', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'team_setting' , array(
			'title'      => __('team Settings', 'business-idea'),
			'panel'  => 'team_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_team_disable]' , array(
			'default'    => $business_idea_option['business_idea_team_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_team_disable]' , array(
			'label' => __('Hide Team Section?','business-idea' ),
			'description' => __('Check this setting to hide team section from the FrontPage.','business-idea' ),
			'section' => 'team_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_teamtitle]' , array(
			'default'    => $business_idea_option['business_idea_teamtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_teamtitle]' , array(
			'label' => __('Team Title','business-idea' ),
			'description' => __('This setting for team section title.','business-idea' ),
			'section' => 'team_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_teamsubtitle]' , array(
			'default'    => $business_idea_option['business_idea_teamsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_teamsubtitle]' , array(
			'label' => __('Team Subtitle','business-idea' ),
			'description' => __('This setting for team section subtitle.','business-idea' ),
			'section' => 'team_setting',
			'type'=>'text',
			) );				
		$wp_customize->add_section( 'team_content' , array(
			'title'      => __('Team Content', 'business-idea'),
			'panel'  => 'team_panel',
		) );		
			$wp_customize->add_setting('business_idea_option[business_idea_team]',	array(
				'sanitize_callback' => 'business_idea_sanitize_repeatable_data_field',
				'transport' => 'refresh',
				'type'=>'option',
			) );
			$wp_customize->add_control(new business_idea_Customize_Repeatable_Control($wp_customize,
					'business_idea_option[business_idea_team]',
					array(
						'label'     	=> esc_html__('Team content', 'business-idea'),
						'description'   => '',
						'section'       => 'team_content',
						'live_title_id' => 'name', 
						'title_format'  => esc_html__('[live_title]', 'business-idea'), // [live_title]
						'max_item'      => 2,
						'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://webdzier.com/themes/">Businessidea Pro</a> to be able to add more items and unlock other premium features!', 'business-idea' ) ),
						'fields'    => array(
							
							'user_id' => array(
								'title' => esc_html__('User media', 'business-idea'),
								'type'  =>'media',
								'desc'  => '',
							),
							'name' => array(
								'title' => esc_html__('Team Name', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
							'designation' => array(
								'title' => esc_html__('Position', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
							'desc' => array(
								'title' => esc_html__('Team Description', 'business-idea'),
								'type'  =>'text',
								'desc'  => '',
							),
			
						),

					)
				)
			);			
}
add_action( 'customize_register', 'webdzierc_customizer_team_section' );