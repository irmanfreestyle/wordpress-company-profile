<?php 
function business_idea_section_service( $wp_customize ){
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
	
	$wp_customize->add_panel( 'service_panel', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Service', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'service_setting' , array(
			'title'      => __('Service Settings', 'business-idea'),
			'panel'  => 'service_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_service_disable]' , array(
			'default'    => $business_idea_option['business_idea_service_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_service_disable]' , array(
			'label' => __('Hide Service Section?','business-idea' ),
			'description' => __('Check this setting to hide service section from the FrontPage.','business-idea' ),
			'section' => 'service_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_servicetitle]' , array(
			'default'    => $business_idea_option['business_idea_servicetitle'],
			'sanitize_callback' => 'wp_kses_post',
			'type'=>'option',
			'transport' => 'postMessage',
			));
			$wp_customize->add_control('business_idea_option[business_idea_servicetitle]' , array(
			'label' => __('Service Title','business-idea' ),
			'description' => __('This setting for service section title.','business-idea' ),
			'section' => 'service_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_servicesubtitle]' , array(
			'default'    => $business_idea_option['business_idea_servicesubtitle'],
			'sanitize_callback' => 'wp_kses_post',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_servicesubtitle]' , array(
			'label' => __('Service Subtitle','business-idea' ),
			'description' => __('This setting for service section subtitle.','business-idea' ),
			'section' => 'service_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_servicelayout]' , array(
			'default'    => $business_idea_option['business_idea_servicelayout'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_servicelayout]' , array(
			'label' => __('Service layout settings','business-idea' ),
			'description' => __('Choose your service layout column.','business-idea' ),
			'section' => 'service_setting',
			'type'=>'select',
			'choices' => array(
				'12' => __('1 Column','business-idea'),
				'6' => __('2 Column','business-idea'),
				'4' => __('3 Column','business-idea'),
				'3' => __('4 Column','business-idea'),
			) ) );
			
		$wp_customize->add_section( 'service_content' , array(
			'title'      => __('Service Content', 'business-idea'),
			'panel'  => 'service_panel',
		) );		
			$wp_customize->add_setting('business_idea_option[business_idea_services]',	array(
				'sanitize_callback' => 'business_idea_sanitize_repeatable_data_field',
				'transport' => 'refresh',
				'type'=>'option',
			) );
			$wp_customize->add_control(new business_idea_Customize_Repeatable_Control($wp_customize,
					'business_idea_option[business_idea_services]',
					array(
						'label'     	=> esc_html__('Service content', 'business-idea'),
						'description'   => '',
						'section'       => 'service_content',
						'live_title_id' => 'content_page', 
						'title_format'  => esc_html__('[live_title]', 'business-idea'), // [live_title]
						'max_item'      => 3,
						'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://webdzier.com/themes/">Businessidea Pro</a> to be able to add more items and unlock other premium features!', 'business-idea' ) ),
						'fields'    => array(
							'icon_type'  => array(
								'title' => esc_html__('Custom icon', 'business-idea'),
								'type'  =>'select',
								'options' => array(
									'icon' => esc_html__('Icon', 'business-idea'),
									'image' => esc_html__('image', 'business-idea'),
								),
							),
							'icon'  => array(
								'title' => esc_html__('Icon', 'business-idea'),
								'type'  =>'icon',
								'required' => array( 'icon_type', '=', 'icon' ),
							),
							'iconcolor'  => array(
								'title' => esc_html__('Icon Color', 'business-idea'),
								'type'  =>'color',
							),
							'image'  => array(
								'title' => esc_html__('Image', 'business-idea'),
								'type'  =>'media',
								'required' => array( 'icon_type', '=', 'image' ),
							),

							'content_page'  => array(
								'title' => esc_html__('Select a page', 'business-idea'),
								'type'  =>'select',
								'options' => $option_pages
							),
							'enable_link'  => array(
								'title' => esc_html__('Link to single page', 'business-idea'),
								'type'  =>'checkbox',
							),
						),

					)
				)
			);		
}
add_action( 'customize_register', 'business_idea_section_service' );