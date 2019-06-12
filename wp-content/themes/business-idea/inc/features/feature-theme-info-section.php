<?php
/**
 * Customizer functionality for the Theme Info section.
 */

$upsell_theme_info_path = trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-theme-info/class-business-control-upsell-theme-info.php';
if ( file_exists( $upsell_theme_info_path ) ) {
	require_once( $upsell_theme_info_path );
}

$theme_info_path = trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-theme-info/class-business-customizer-theme-info.php';
if ( file_exists( $theme_info_path ) ) {
	require_once( $theme_info_path );
}

/**
 * Hook controls for Features section to Customizer.
 *
 */
function business_idea_theme_info_customize_register( $wp_customize ) {

	if ( ! class_exists( 'business_idea_Control_Upsell_Theme_Info' ) ) {
		return;
	}

	$wp_customize->add_section(	'business_idea_theme_info_main_section', array(
			'title'    => esc_html__( 'PRO Features', 'business-idea' ),
			'priority' => 0,
		)
	);
		$wp_customize->add_setting(	'business_idea_theme_info_main_control', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(	new business_idea_Control_Upsell_Theme_Info( $wp_customize, 'business_idea_theme_info_main_control', array(
					'section'            => 'business_idea_theme_info_main_section',
					'priority'           => 100,
					'options'            => array(
						esc_html__( 'Home Page Shop Section', 'business-idea' ),
						esc_html__( 'Portfolio Section', 'business-idea' ),
						esc_html__( 'Pricing Section', 'business-idea' ),
						esc_html__( 'Counter Section', 'business-idea' ),
						esc_html__( 'Newsletter Section', 'business-idea' ),
						esc_html__( 'Testimonial Section', 'business-idea' ),
						esc_html__( 'Team Section', 'business-idea' ),
						esc_html__( 'Client Section', 'business-idea' ),
						esc_html__( 'Google Map on Contactus Templage', 'business-idea' ),
						esc_html__( 'Section Manager Settings', 'business-idea' ),
						esc_html__( 'Custom Templates', 'business-idea' ),
						esc_html__( 'Full Color Settings', 'business-idea' ),				
						esc_html__( '1 year quality support', 'business-idea' ),
					),
					'explained_features' => array(
						esc_html__( 'You can access of shop section in FrontPage of Businessidea Pro theme.', 'business-idea' ),
						esc_html__( 'Full customizable color settings added in Pro version.', 'business-idea' ),
						esc_html__( 'Portfolio section in FrontPage.', 'business-idea' ),
						esc_html__( 'Testimonial section in FrontPage.', 'business-idea' ),
						esc_html__( 'Pricing Support functionality added in Pro version.', 'business-idea' ),
						esc_html__( 'Team Section features available in Businessidea Pro version.', 'business-idea' ),
						esc_html__( 'Client Section also availble in Pro version.', 'business-idea' ),
						esc_html__( 'Google Map Features support in FrontPage and Contact Page.', 'business-idea' ),
						esc_html__( 'Section Manager settings used to ordering homepage sections.', 'business-idea' ),
						esc_html__( '24/7 Professional Support.', 'business-idea' ),
					),
					'button_url'         => esc_url( 'https://www.webdzier.com/business-idea-pro/' ),
					'button_text'        => esc_html__( 'BuyNow Pro Version', 'business-idea' ),
				)
			)
		);

}

add_action( 'customize_register', 'business_idea_theme_info_customize_register' );