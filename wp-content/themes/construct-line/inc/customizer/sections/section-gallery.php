<?php 
function construct_line_section_gallery( $wp_customize ){
	$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	$wp_customize->add_panel( 'gallery_panel', array(
		'priority'       => 49,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Gallery', 'construct-line'),
	) );	
		$wp_customize->add_section( 'gallery_setting' , array(
			'title'      => __('Gallery Settings', 'construct-line'),
			'panel'  => 'gallery_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallery_disable]' , array(
			'default'    => $option['business_idea_gallery_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_gallery_disable]' , array(
			'label' => __('Hide Gallery Section?','construct-line' ),
			'description' => __('Check this setting to hide gallery section from the FrontPage.','construct-line' ),
			'section' => 'gallery_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallerytitle]' , array(
			'default'    => $option['business_idea_gallerytitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_gallerytitle]' , array(
			'label' => __('Gallery Title','construct-line' ),
			'description' => __('This setting for gallery section title.','construct-line' ),
			'section' => 'gallery_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallerysubtitle]' , array(
			'default'    => $option['business_idea_gallerysubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_gallerysubtitle]' , array(
			'label' => __('Gallery Subtitle','construct-line' ),
			'description' => __('This setting for gallery section subtitle.','construct-line' ),
			'section' => 'gallery_setting',
			'type'=>'text',
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallery_pageid]' , array(
			'default'    => $option['business_idea_gallery_pageid'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_gallery_pageid]' , array(
			'label' => __('Select A Page To Show Gallery','construct-line' ),
			'description' => __('Please select a page that have WordPress gallery shortcode.','construct-line' ),
			'section' => 'gallery_setting',
			'type'=>'dropdown-pages',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallery_column]' , array(
			'default'    => $option['business_idea_gallery_column'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_gallery_column]' , array(
			'label' => __('Column Layout','construct-line' ),
			'description' => __('Please select column layout.','construct-line' ),
			'section' => 'gallery_setting',
			'type'=>'select',
			'choices'=>array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
			),
			) );
			
			
		$wp_customize->add_section( 'gallery_background' , array(
			'title'      => __('Section Background', 'construct-line'),
			'panel'  => 'gallery_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallery_bgcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '#ffffff',
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'business_idea_option[business_idea_gallery_bgcolor]',
                array(
                    'label'       => esc_html__( 'Background Color', 'construct-line' ),
                    'section'     => 'gallery_background',
                    'description' => 'Change the background color of this section.',
                )
            ));
			$wp_customize->add_setting( 'business_idea_option[business_idea_gallery_bgimage]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
					'type'=>'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'business_idea_option[business_idea_gallery_bgimage]',
				array(
					'label' 		=> esc_html__('Background image', 'construct-line'),
					'section' 		=> 'gallery_background',
					'description' => 'Upload the background image for this section.',
				)
			));
			
}
add_action( 'customize_register', 'construct_line_section_gallery' );