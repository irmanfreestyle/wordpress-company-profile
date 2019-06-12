<?php 
function business_idea_typography_setting( $wp_customize ){
	
	include_once( get_template_directory() . '/inc/customizer/customizer-controls.php' );
	
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	$wp_customize->add_panel( 'typography_panel', array(
		'priority'       => 72,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography', 'business-idea'),
	) );
		$wp_customize->add_section( 'p_section' , array(
			'title'      => __('General Content', 'business-idea'),
			'panel'  => 'typography_panel',
			'priority'       => 1,
		) );
			$wp_customize->add_setting( 'business_idea_option[typo_p_fontsize]' , array(
			'default'    => $business_idea_option['typo_p_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_p_fontsize]' , array(
			'label' => __('Font Size (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'p_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
		$wp_customize->add_section( 'm_section' , array(
			'title'      => __('Menu', 'business-idea'),
			'panel'  => 'typography_panel',
			'priority'       => 2,
		) );
			$wp_customize->add_setting( 'business_idea_option[typo_m_fontsize]' , array(
			'default'    => $business_idea_option['typo_m_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_m_fontsize]' , array(
			'label' => __('Font Size (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'm_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
		$wp_customize->add_section( 'h_section' , array(
			'title'      => __('Heading', 'business-idea'),
			'panel'  => 'typography_panel',
			'priority'       => 3,
		) );
			$wp_customize->add_setting( 'business_idea_option[typo_h1_fontsize]' , array(
			'default'    => $business_idea_option['typo_h1_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h1_fontsize]' , array(
			'label' => __('Heading h1 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
			$wp_customize->add_setting( 'business_idea_option[typo_h2_fontsize]' , array(
			'default'    => $business_idea_option['typo_h2_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h2_fontsize]' , array(
			'label' => __('Heading h2 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
			$wp_customize->add_setting( 'business_idea_option[typo_h3_fontsize]' , array(
			'default'    => $business_idea_option['typo_h3_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h3_fontsize]' , array(
			'label' => __('Heading h3 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
			$wp_customize->add_setting( 'business_idea_option[typo_h4_fontsize]' , array(
			'default'    => $business_idea_option['typo_h4_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h4_fontsize]' , array(
			'label' => __('Heading h5 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
			$wp_customize->add_setting( 'business_idea_option[typo_h5_fontsize]' , array(
			'default'    => $business_idea_option['typo_h5_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h5_fontsize]' , array(
			'label' => __('Heading h5 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
			$wp_customize->add_setting( 'business_idea_option[typo_h6_fontsize]' , array(
			'default'    => $business_idea_option['typo_h6_fontsize'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[typo_h6_fontsize]' , array(
			'label' => __('Heading h6 (px)','business-idea' ),
			'description' => __('Select font size.','business-idea' ),
			'section' => 'h_section',
			'type'=>'select',
			'choices' => business_idea_fontsize(),
			) );
}
add_action( 'customize_register', 'business_idea_typography_setting' );