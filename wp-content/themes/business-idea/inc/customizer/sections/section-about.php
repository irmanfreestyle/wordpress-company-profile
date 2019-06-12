<?php 
function business_idea_section_about( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	$pages  =  get_pages();
	$option_pages = array();
	$option_pages[0] = esc_html__( 'Select page', 'business-idea' );
	foreach( $pages as $p ){
		$option_pages[ $p->ID ] = $p->post_title;
	}

	$users = get_users( array(
		'orderby'      => 'display_name',
		'order'        => 'ASC',
		'number'       => '',
	) );

	$option_users[0] = esc_html__( 'Select member', 'business-idea' );
	foreach( $users as $user ){
		$option_users[ $user->ID ] = $user->display_name;
	}
	
	$wp_customize->add_panel( 'about_panel', array(
		'priority'       => 41,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : About', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'about_setting' , array(
			'title'      => __('About Settings', 'business-idea'),
			'panel'  => 'about_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_disable]' , array(
			'default'    => $business_idea_option['business_idea_about_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_about_disable]' , array(
			'label' => __('Hide About Section?','business-idea' ),
			'description' => __('Check this setting to hide about section from the FrontPage.','business-idea' ),
			'section' => 'about_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_abouttitle]' , array(
			'default'    => $business_idea_option['business_idea_abouttitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_abouttitle]' , array(
			'label' => __('About Title','business-idea' ),
			'description' => __('This setting for about section title.','business-idea' ),
			'section' => 'about_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_aboutsubtitle]' , array(
			'default'    => $business_idea_option['business_idea_aboutsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_aboutsubtitle]' , array(
			'label' => __('About Subtitle','business-idea' ),
			'description' => __('This setting for about section subtitle.','business-idea' ),
			'section' => 'about_setting',
			'type'=>'text',
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_titleColor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => $business_idea_option['business_idea_about_titleColor'],
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_about_titleColor]',
                array(
                    'label'       => esc_html__( 'Section Title Color', 'business-idea' ),
                    'section'     => 'about_setting',
                    'description' => 'Select your custom text color.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_subtitleColor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => $business_idea_option['business_idea_about_subtitleColor'],
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_about_subtitleColor]',
                array(
                    'label'       => esc_html__( 'Section Subtitle Color', 'business-idea' ),
                    'section'     => 'about_setting',
                    'description' => 'Select your custom text color.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_posttitlecolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => $business_idea_option['business_idea_about_posttitlecolor'],
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_about_posttitlecolor]',
                array(
                    'label'       => esc_html__( 'About Title Color', 'business-idea' ),
                    'section'     => 'about_setting',
                    'description' => 'Select your custom text color.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_posttextcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => $business_idea_option['business_idea_about_posttextcolor'],
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_about_posttextcolor]',
                array(
                    'label'       => esc_html__( 'About Contents Color', 'business-idea' ),
                    'section'     => 'about_setting',
                    'description' => 'Select your custom text color.',
                )
            ));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_aboutlayout]' , array(
			'default'    => $business_idea_option['business_idea_aboutlayout'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_aboutlayout]' , array(
			'label' => __('About layout settings','business-idea' ),
			'description' => __('Choose your about layout column.','business-idea' ),
			'section' => 'about_setting',
			'type'=>'select',
			'choices' => array(
				'12' => __('1 Column','business-idea'),
				'6' => __('2 Column','business-idea'),
			) ) );
			
		$wp_customize->add_section( 'about_content' , array(
			'title'      => __('About Content', 'business-idea'),
			'panel'  => 'about_panel',
		) );	
			$wp_customize->add_setting('business_idea_option[business_idea_about_boxes]',
			array(
				//'default' => '',
				'sanitize_callback' => 'business_idea_sanitize_repeatable_data_field',
				'transport' => 'refresh', // refresh or postMessage
				'type'=>'option',
			) );
			$wp_customize->add_control(
				new business_idea_Customize_Repeatable_Control($wp_customize,'business_idea_option[business_idea_about_boxes]',
					array(
						'label' 		=> esc_html__('About content page', 'business-idea'),
						'description'   => '',
						'section'       => 'about_content',
						'live_title_id' => 'content_page', 
						'title_format'  => esc_html__('[live_title]', 'business-idea'), // [live_title]
						'max_item'      => 2,
                        'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://webdzier.com/themes/">Businessidea Pro</a> to be able to add more items and unlock other premium features!', 'business-idea' ) ),
						'fields'    => array(
							'content_page'  => array(
								'title' => esc_html__('Select a page', 'business-idea'),
								'type'  =>'select',
								'options' => $option_pages
							),
							'hide_title'  => array(
								'title' => esc_html__('Hide item title', 'business-idea'),
								'type'  =>'checkbox',
							),
							'enable_link'  => array(
								'title' => esc_html__('Link to single page', 'business-idea'),
								'type'  =>'checkbox',
							),
						),

			)));
            $wp_customize->add_setting( 'business_idea_option[business_idea_about_content_source]',array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => 'content',
					'type'=>'option',
            ));
            $wp_customize->add_control( 'business_idea_option[business_idea_about_content_source]',array(
                    'label' 		=> esc_html__('Item content source', 'business-idea'),
                    'section' 		=> 'about_content',
                    'description'   => '',
                    'type'          => 'select',
                    'choices'       => array(
                        'content' => esc_html__( 'Full Page Content', 'business-idea' ),
                        'excerpt' => esc_html__( 'Page Excerpt', 'business-idea' ),
                    ),
            ) );
			
		$wp_customize->add_section( 'about_background' , array(
			'title'      => __('Section Background', 'business-idea'),
			'panel'  => 'about_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_bgcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => sprintf($business_idea_option['business_idea_about_bgcolor']),
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_about_bgcolor]',
                array(
                    'label'       => esc_html__( 'Background Color', 'business-idea' ),
                    'section'     => 'about_background',
                    'description' => 'Change the background color of this section.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_about_bgimage]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => sprintf($business_idea_option['business_idea_about_bgimage']),
					'type'=>'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'business_idea_option[business_idea_about_bgimage]',
				array(
					'label' 		=> esc_html__('Background image', 'business-idea'),
					'section' 		=> 'about_background',
					'description' => 'Upload the background image for this section.',
				)
			));			
}
add_action( 'customize_register', 'business_idea_section_about' );