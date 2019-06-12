<?php
/**
 * Function to sanitize number
 *
 * @since Construction Field 1.0.0
 *
 * @param $construction_field_input
 * @param $construction_field_setting
 * @return int || float || numeric value
 *
 */
if ( ! function_exists( 'construction_field_sanitize_number' ) ) :
	function construction_field_sanitize_number ( $construction_field_input, $construction_field_setting ) {
		$construction_field_sanitize_text = sanitize_text_field( $construction_field_input );

		// If the input is an number, return it; otherwise, return the default
		return ( is_numeric( $construction_field_sanitize_text ) ? $construction_field_sanitize_text : $construction_field_setting->default );
	}
endif;

/**
 * Sanitizing the checkbox
 *
 * @since Construction Field 1.0.0
 *
 * @param $checked
 * @return Boolean
 *
 */
if ( !function_exists('construction_field_sanitize_checkbox') ) :
	function construction_field_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif;

/**
 * Sanitizing the page/post
 *
 * @since Construction Field 1.0.0
 *
 * @param $input
 * @return int
 *
 */
if ( !function_exists('construction_field_sanitize_page') ) :
	function construction_field_sanitize_page( $input ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $input );
		// If $page_id is an ID of a published page, return it; otherwise, return false
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
	}
endif;

/**
 * Sanitizing the select callback example
 *
 * @since Construction Field 1.0.0
 *
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return string
 *
 */
if ( !function_exists('construction_field_sanitize_select') ) :
	function construction_field_sanitize_select( $input, $setting ) {

		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;

/**
 * Allowed HTML
 *
 * @param $input
 * @return string
 *
 */
if ( !function_exists('construction_field_sanitize_allowed_html') ) :
	function construction_field_sanitize_allowed_html ( $input ) {
		$allowed_html = wp_kses_allowed_html();
		$output = wp_kses($input, $allowed_html );
		return $output;
	}
endif;