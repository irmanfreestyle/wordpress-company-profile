<?php 
// customizer file includes
require_once('customizer/customizer.php');

// home page section files included
require_once('sections/section-slider.php');
require_once('sections/section-service.php');

function rfc_business_max_default_data($data){
	$new_data = array(
		'header_tb_enable' => true,
		'header_heading' => __('Have any questions?','business-max'),
		'header_tb_icon1'=> 'fa-envelope',
		'header_tb_text1'=> 'info@example.com',
		'header_tb_icon2'=> 'fa-mobile',
		'header_tb_text2'=> '+433-8583-0868',
		'header_facebook_link'=> '#',
		'header_twitter_link'=> '#',
		'header_linkedin_link'=> '#',
		'header_googleplus_link'=> '#',
		
		'theme_color'=> '#A0D247',
		'theme_color_custom_show'=> false,
		'theme_color_custom_color'=> '#A0D247',
		'site_layout'=> 'wide',
		'nav_padding'=> 18,
		'nav_searchicon_enable' => true,
		'primary_sidebar'=> 'right',
		'animation_effect_enable'=> true,
		'google_fonts_enable'=> true,
		'single_image_enable'=> false,
		'single_meta_enable'=> false,
		'btt_enable' => true,
		'footer_address' => __('37 Down Street,USA 200','business-max'),
		'footer_email' => __('info@example.com','business-max'),
		'footer_phone' => __('+21 (800) 12345','business-max'),
		'footer_social_title' => __('follow us on social networks','business-max'),
		
		'hero_section' => true,
		'hero_animation_type' => 'slide',
		'hero_speed' => 3000,
		'hero_media' => '',

		'service_section' => true,
		'service_title' => __('Services We Provide','business-max'),
		'service_subtitle' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.','business-max'),
		'service_content' => '',
		'service_column' => 4,
		
		'blog_section' => true,
		'blog_title' => __("Our Latest News",'business-max'),
		'blog_subtitle' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.','business-max'),
		'blog_noofshow' => 4,
		'blog_orderby' => 0,
		'blog_order' => 'desc',
		'blog_cat' => 0,
		
		'subheader_enable'=> true,
		'subheader_p_top'=> 30,
		'subheader_p_bottom'=> 30,
		'subheader_color'=> '',
		'subheader_align'=> 'left',
		'subheader_overlay_bg'=> '',
		
		'p_fontsize' => '',
		'm_fontsize' => '',
		'h1_fontsize' => '',
		'h2_fontsize' => '',
		'h3_fontsize' => '',
		'h4_fontsize' => '',
		'h5_fontsize' => '',
		'h6_fontsize' => '',
	);

	$data = array_merge($data,$new_data);

	return $data;
}
add_filter('business_max_default_data','rfc_business_max_default_data');
?>