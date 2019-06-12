<?php 
function business_idea_section_shop( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	if ( class_exists( 'woocommerce' ) ){
		
	$wp_customize->add_panel( 'shop_panel', array(
		'priority'       => 42,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Shop', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'shop_setting' , array(
			'title'      => __('Shop Settings', 'business-idea'),
			'panel'  => 'shop_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_disable]' , array(
			'default'    => $business_idea_option['business_idea_shop_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_disable]' , array(
			'label' => __('Hide Shop Section?','business-idea' ),
			'description' => __('Check this setting to hide shop section from the FrontPage.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shoptitle]' , array(
			'default'    => $business_idea_option['business_idea_shoptitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shoptitle]' , array(
			'label' => __('Shop Title','business-idea' ),
			'description' => __('This setting for shop section title.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shopsubtitle]' , array(
			'default'    => $business_idea_option['business_idea_shopsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shopsubtitle]' , array(
			'label' => __('Shop Subtitle','business-idea' ),
			'description' => __('This setting for shop section subtitle.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_cat_hide]' , array(
			'default'    => $business_idea_option['business_idea_shop_cat_hide'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_cat_hide]' , array(
			'label' => __('Hide category from products?','business-idea' ),
			'description' => __('Check this setting to hide category from the home page products.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_cat_hide]' , array(
			'default'    => $business_idea_option['business_idea_shop_cat_hide'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_cat_hide]' , array(
			'label' => __('Hide category from products?','business-idea' ),
			'description' => __('Check this setting to hide category from the home page products.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_desc_hide]' , array(
			'default'    => $business_idea_option['business_idea_shop_desc_hide'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_desc_hide]' , array(
			'label' => __('Hide description from products?','business-idea' ),
			'description' => __('Check this setting to hide description from the home page products.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_scroll_effect_hide]' , array(
			'default'    => $business_idea_option['business_idea_shop_scroll_effect_hide'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_scroll_effect_hide]' , array(
			'label' => __('Hide scroll effects?','business-idea' ),
			'description' => __('Check this setting to hide scroll effects.','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_shop_product_show]' , array(
			'default'    => $business_idea_option['business_idea_shop_product_show'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control('business_idea_option[business_idea_shop_product_show]' , array(
			'label' => __('No. of products to show','business-idea' ),
			'section' => 'shop_setting',
			'type'=>'number',
			) );	
	}					
}
add_action( 'customize_register', 'business_idea_section_shop' );