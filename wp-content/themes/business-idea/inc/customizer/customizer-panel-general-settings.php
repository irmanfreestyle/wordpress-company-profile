<?php 
function business_idea_general_setting( $wp_customize ){
	
	include_once( get_template_directory() . '/inc/customizer/customizer-controls.php' );
	
	include_once( get_template_directory() . '/inc/customizer/customizer-contactform-info/class-contactform-info.php' );
	include_once( get_template_directory() . '/inc/customizer/customizer-woocommerce-info/class-woocommerce-info.php' );
	
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	/* Woocommerce info section */	
	$wp_customize->add_section( 'woocommerce_section' , array(
		'title'      => __('Theme Recommended Plugins', 'business-idea' ),
		'priority'       => 10,
	) );
		$wp_customize->add_setting(
			'business_idea_woo_info', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new business_idea_Woocommerce_Info(
				$wp_customize, 'business_idea_woo_info', array(
					'label' => esc_html__( 'Instructions', 'business-idea' ),
					'section' => 'woocommerce_section',
					'capability' => 'install_plugins',
				)
			)
		);
			
	$wp_customize->add_panel( 'general_panel', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'business-idea'),
	) );
		
	$wp_customize->get_section( 'colors' )->panel = 'general_panel'; // color settings
	$wp_customize->get_section( 'header_image' )->panel = 'general_panel'; // header settings
	$wp_customize->get_section( 'background_image' )->panel = 'general_panel'; // backround settings
	
		$wp_customize->add_section( 'global' , array(
			'title'      => __('Global', 'business-idea'),
			'panel'  => 'general_panel',
			'priority'       => 1,
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_sidebarlayout]' , array(
			'default'    => $business_idea_option['business_idea_sidebarlayout'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_sidebarlayout]' , array(
			'label' => __('Sidebar Layout','business-idea' ),
			'description' => __('Sidebar Layout, apply this setting for all post and pages, exclude home page and custom page templates.','business-idea' ),
			'section' => 'global',
			'type'=>'select',
			'choices' => array(
				'left' => __('Left Sidebar','business-idea'),
				'right' => __('Right Sidebar','business-idea'),
				'none' => __('No Sidebar','business-idea'),
			) ) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_btt_disable]' , array(
			'default'    => $business_idea_option['business_idea_btt_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_btt_disable]' , array(
			'label' => __('Hide footer back to top?','business-idea' ),
			'description' => __('Check this setting to hide footer back to top button.','business-idea' ),
			'section' => 'global',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_animation_disable]' , array(
			'default'    => $business_idea_option['business_idea_animation_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_animation_disable]' , array(
			'label' => __('Disable animation effect?','business-idea' ),
			'description' => __('Check this setting to disable all animation effect when scroll.','business-idea' ),
			'section' => 'global',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_googlefonts_disable]' , array(
			'default'    => $business_idea_option['business_idea_googlefonts_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_googlefonts_disable]' , array(
			'label' => __('Disable google fonts?','business-idea' ),
			'description' => __('Check this setting to disable google fonts in the theme.','business-idea' ),
			'section' => 'global',
			'type'=>'checkbox',
			) );
		$wp_customize->add_section( 'layoutSection' , array(
			'title'      => __('Layout', 'business-idea' ),
			'panel'  => 'general_panel',
			'priority'       => 2,
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_layout]' , array(
			'default'    => $business_idea_option['business_idea_layout'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_layout]' , array(
			'label' => __('Boxed Layout','business-idea' ),
			'description' => __('Check this setting to show your website in Boxed layout.','business-idea' ),
			'section' => 'layoutSection',
			'type'=>'checkbox',
			) );

		$wp_customize->add_section( 'singlepost_section' , array(
			'title'      => __('Single Post', 'business-idea' ),
			'panel'  => 'general_panel',
			'priority'       => 25,
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_singlepostmeta_disable]' , array(
			'default'    => $business_idea_option['business_idea_singlepostmeta_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_singlepostmeta_disable]' , array(
			'label' => __('Disable Single Post Meta','business-idea' ),
			'description' => __('Check this setting to disable single post meta data.','business-idea' ),
			'section' => 'singlepost_section',
			'type'=>'checkbox',
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_singlepostthumb_disable]' , array(
			'default'    => $business_idea_option['business_idea_singlepostthumb_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_singlepostthumb_disable]' , array(
			'label' => __('Disable Single Post Thumbnail','business-idea' ),
			'description' => __('Check this setting to disable single post thumbnail data.','business-idea' ),
			'section' => 'singlepost_section',
			'type'=>'checkbox',
			) );
			
		$wp_customize->add_section( 'footerCopyright' , array(
			'title'      => __('Footer Copyright', 'business-idea'),
			'panel'  => 'general_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_copyright]' , array(
			'default'    => $business_idea_option['business_idea_copyright'],
			'type'=>'option',
			'sanitize_callback' => 'wp_kses_post',
			));
			$wp_customize->add_control('business_idea_option[business_idea_copyright]' , array(
			'label' => __('Copyright','business-idea'),
			'description'      => __('If you want to show copyright text in bottom of footer area.', 'business-idea'),
			'section' => 'footerCopyright',
			'type'=>'textarea',
			) );			
}
add_action( 'customize_register', 'business_idea_general_setting' );