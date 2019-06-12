<?php 
function business_idea_section_hero( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	$wp_customize->add_panel( 'hero_panel', array(
		'priority'       => 35,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Hero', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'hero_setting' , array(
			'title'      => __('Hero Settings', 'business-idea'),
			'panel'  => 'hero_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_disable]' , array(
			'default'    => $business_idea_option['business_idea_hero_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_disable]' , array(
			'label' => __('Hide Hero Section?','business-idea' ),
			'description' => __('Check this setting to hide hero section from FrontPage.','business-idea' ),
			'section' => 'hero_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_herofullscreen]' , array(
			'default'    => $business_idea_option['business_idea_herofullscreen'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_herofullscreen]' , array(
			'label' => __('Make hero section full width?','business-idea' ),
			'description' => __('Check this setting to make your home page hero section full width.','business-idea' ),
			'section' => 'hero_setting',
			'type'=>'checkbox',
			) );
			
			$effects_str = 'bounce flash pulse rubberBand shake headShake swing tada wobble jello bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig flipInX flipInY lightSpeedIn rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight hinge rollIn zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp slideInDown slideInLeft slideInRight slideInUp';
			$effects_str = explode( ' ', $effects_str );
            $effect_arg = array();
            foreach ( $effects_str as $val ) {
                $val =  trim( $val );
                if ( $val ){
                    $effect_arg[ $val ]= $val;
                }

            }
			$wp_customize->add_setting( 'business_idea_option[business_idea_textanimation]' , array(
			'default'    => $business_idea_option['business_idea_textanimation'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_textanimation]' , array(
			'label' => __('Text animation','business-idea' ),
			'description' => __('Choose your favorite animation effect.','business-idea' ),
			'section' => 'hero_setting',
			'type'=>'select',
			'choices' => $effect_arg 
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_slider_effect]' , array(
			'default'    => $business_idea_option['business_idea_slider_effect'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_slider_effect]' , array(
			'label' => __('Slider Effect','business-idea' ),
			'description' => __('Select choose slide effect from this setting.','business-idea' ),
			'section' => 'hero_setting',
			'type'=>'select',
			'choices' => array(
				'slide' => __('Slide','business-idea'),
				'fade' => __('Fade','business-idea'),
			)
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_slider_animation_speed]' , array(
			'default'    => $business_idea_option['business_idea_slider_animation_speed'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_slider_animation_speed]' , array(
			'label' => __('Slider animation speed','business-idea' ),
			'description' => __('This animation speed refers to which is image fade in. Integers in milliseconds are accepted.','business-idea' ),
			'section' => 'hero_setting',
			'type'=>'text', 
			) );
			
		$wp_customize->add_section( 'hero_media' , array(
			'title'      => __('Hero media images', 'business-idea'),
			'panel'  => 'hero_panel',
		) );		
			$wp_customize->add_setting('business_idea_option[hero_media]',
				array(
					'sanitize_callback' => 'business_idea_sanitize_repeatable_data_field',
					'transport' => 'refresh',
					'type'=>'option',
					'default' => json_encode( array(
						array(
							'image'=> array(
								'url' => get_template_directory_uri().'/assets/images/slider1.jpg',
								'id' => ''
							)
						)
					) )
				) );
			$wp_customize->add_control(
				new business_idea_Customize_Repeatable_Control(
					$wp_customize,
					'business_idea_option[hero_media]',
					array(
						'label'     => esc_html__('Background Images', 'business-idea'),
						'description'   => '',
						'section'       => 'hero_media',
						'title_format'  => esc_html__( 'Background', 'business-idea'),
						'max_item'      => 2,
						'fields'    => array(
							'image' => array(
								'title' => esc_html__('Background Image', 'business-idea'),
								'type'  =>'media',
								'default' => array(
									'url' => get_template_directory_uri().'/assets/images/slider1.jpg',
									'id' => ''
								)
							),

						),
					)
				)
			);			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_overlay_color]',array(
					'sanitize_callback' => 'business_idea_sanitize_color_alpha',
					'default'           => $business_idea_option['business_idea_hero_overlay_color'],
					'type'=>'option',
					//'transport' => 'refresh',
			));
			$wp_customize->add_control( new business_idea_Alpha_Color_Control(	$wp_customize,'business_idea_option[business_idea_hero_overlay_color]',
					array(
						'label' 		=> esc_html__('Background Overlay Color', 'business-idea'),
						'section' 		=> 'hero_media',
						'description'   => esc_html__('Make your background with hard to transparent from bottom slider to drag in left or right of color settings.', 'business-idea'),
			)));
		$wp_customize->add_section( 'hero_content' , array(
			'title'      => __('Hero content', 'business-idea'),
			'panel'  => 'hero_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_largetext]',array(
					'sanitize_callback' => 'wp_kses_post',
					'mod' 				=> 'html',
					'default'           => $business_idea_option['business_idea_hero_largetext'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_hero_largetext]',
				array(
					'label' 		=> esc_html__('Large Text', 'business-idea'),
					'section' 		=> 'hero_content',
					'description'   => esc_html__('Put your big text for hero slider.', 'business-idea'),
					'type'=>'textarea',
			));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_largetextcolor]',array(
					'sanitize_callback' => 'business_idea_sanitize_color_alpha',
					'default'           => $business_idea_option['business_idea_hero_largetextcolor'],
					'type'=>'option',
					//'transport' => 'refresh',
			));
			$wp_customize->add_control( new business_idea_Alpha_Color_Control(	$wp_customize,'business_idea_option[business_idea_hero_largetextcolor]',
					array(
						'label' 		=> esc_html__('Large Text Color', 'business-idea'),
						'section' 		=> 'hero_content',
			)));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_smalltext]',array(
					'sanitize_callback' => 'wp_kses_post',
					'mod' 				=> 'html',
					'default'           => $business_idea_option['business_idea_hero_smalltext'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_hero_smalltext]',
				array(
					'label' 		=> esc_html__('Small Text', 'business-idea'),
					'section' 		=> 'hero_content',
					'description'   => esc_html__('Small text for hero slider.', 'business-idea'),
					'type'=>'textarea',
			));
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_smalltextcolor]',array(
					'sanitize_callback' => 'business_idea_sanitize_color_alpha',
					'default'           => $business_idea_option['business_idea_hero_smalltextcolor'],
					'type'=>'option',
					//'transport' => 'refresh',
			));
			$wp_customize->add_control( new business_idea_Alpha_Color_Control(	$wp_customize,'business_idea_option[business_idea_hero_smalltextcolor]',
					array(
						'label' 		=> esc_html__('Small Text Color', 'business-idea'),
						'section' 		=> 'hero_content',
			)));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttontext]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttontext'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttontext]' , array(
			'label' => __('Button Text 1','business-idea' ),
			'description' => __('This setting for change button text in front page hero section','business-idea' ),
			'section' => 'hero_content',
			'type'=>'text', 
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttonlink]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttonlink'],
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttonlink]' , array(
			'label' => __('Button Link 1','business-idea' ),
			'description' => __('This setting for change button link in front page hero section','business-idea' ),
			'section' => 'hero_content',
			'type'=>'text', 
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttontarget]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttontarget'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttontarget]' , array(
			'label' => __('Open button in new window','business-idea' ),
			'description' => __('This setting to open button link in new window.','business-idea' ),
			'section' => 'hero_content',
			'type'=>'checkbox', 
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttontext2]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttontext2'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttontext2]' , array(
			'label' => __('Button Text 2','business-idea' ),
			'description' => __('This setting for change button text in front page hero section','business-idea' ),
			'section' => 'hero_content',
			'type'=>'text', 
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttonlink2]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttonlink2'],
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttonlink2]' , array(
			'label' => __('Button Link 2','business-idea' ),
			'description' => __('This setting for change button link in front page hero section','business-idea' ),
			'section' => 'hero_content',
			'type'=>'text', 
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_hero_buttontarget2]' , array(
			'default'    => $business_idea_option['business_idea_hero_buttontarget2'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_hero_buttontarget2]' , array(
			'label' => __('Open button in new window','business-idea' ),
			'description' => __('This setting to open button link in new window.','business-idea' ),
			'section' => 'hero_content',
			'type'=>'checkbox', 
			) );
					
}
add_action( 'customize_register', 'business_idea_section_hero' );