<?php
/**
 * construction Theme Customizer.
 *
 * @package construction
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function construction_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*------------------------------------------------------------------------------------*/
	/**
	 * Upgrade to Constructera
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Construction_Lite_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Construction_Lite_Customize_Section_Pro(
	        $wp_customize,
	        'construction-pro',
	        array(
	            'title'    => esc_html__( 'Upgrade To Premium', 'construction-lite' ),
	            'pro_text' => esc_html__( 'Buy Now','construction-lite' ),
	            'pro_text1' => esc_html__( 'Compare','construction-lite' ),
	            'pro_url'  => 'https://accesspressthemes.com/wordpress-themes/construction-pro/',
	            'priority' => 1,
	        )
	    )
	);
	$wp_customize->add_setting(
		'construction_pro_upbuton',
		array(
			'section' => 'construction-pro',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		'construction_pro_upbuton',
		array(
			'section' => 'construction-pro'
		)
	);
}
add_action( 'customize_register', 'construction_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function construction_lite_customize_preview_js() {
	wp_enqueue_script( 'construction_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'construction_lite_customize_preview_js' );
