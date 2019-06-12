<?php 
function webdzierc_section_project( $wp_customize ){
	$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	$wp_customize->add_panel( 'project_panel', array(
		'priority'       => 49,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Project', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'project_setting' , array(
			'title'      => __('Project Settings', 'business-idea'),
			'panel'  => 'project_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_project_disable]' , array(
			'default'    => $option['business_idea_project_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_project_disable]' , array(
			'label' => __('Hide Project Section?','business-idea' ),
			'description' => __('Check this setting to hide project section from the FrontPage.','business-idea' ),
			'section' => 'project_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_projecttitle]' , array(
			'default'    => $option['business_idea_projecttitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_projecttitle]' , array(
			'label' => __('Project Title','business-idea' ),
			'description' => __('This setting for project section title.','business-idea' ),
			'section' => 'project_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_projectsubtitle]' , array(
			'default'    => $option['business_idea_projectsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_projectsubtitle]' , array(
			'label' => __('Project Subtitle','business-idea' ),
			'description' => __('This setting for project section subtitle.','business-idea' ),
			'section' => 'project_setting',
			'type'=>'text',
			) );
		
		$wp_customize->add_section( 'project_content' , array(
			'title'      => __('Section Contents', 'business-idea'),
			'panel'  => 'project_panel',
		) );
		for( $i=1; $i<=3; $i++ ){
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_ps_image'.$i.']',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
					'type'=>'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'business_idea_option[business_idea_ps_image'.$i.']',
				array(
					'label' 		=> esc_html__('Project Image '.$i, 'business-idea'),
					'section' 		=> 'project_content',
					'description' => 'Upload your project image.',
				)
			));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_ps_title'.$i.']' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_ps_title'.$i.']' , array(
			'label' => __('Project Title '.$i,'business-idea' ),
			'description' => '',
			'section' => 'project_content',
			'type'=>'text',
			) );
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_ps_desc'.$i.']' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_ps_desc'.$i.']' , array(
			'label' => __('Project Description '.$i,'business-idea' ),
			'description' => '',
			'section' => 'project_content',
			'type'=>'textarea',
			) );
			
		}
			
}
add_action( 'customize_register', 'webdzierc_section_project' );