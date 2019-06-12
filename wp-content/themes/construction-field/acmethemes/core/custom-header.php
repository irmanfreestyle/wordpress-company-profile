<?php
/**
 * Set up the WordPress core custom header feature.
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Acme Themes
 * @subpackage Construction Field
 * @return void
 */
function construction_field_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'construction_field_custom_header_args', array(
		'default-image'      => get_template_directory_uri() . '/assets/img/bobcat.jpg',
		'width'              => 1920,
		'height'             => 1280,
		'flex-height'        => true,
		'flex-width'         => true,
		'header-text'        => false
	) ) );
	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/img/bobcat.jpg',
			'thumbnail_url' => '%s/assets/img/bobcat.jpg',
			'description'   => esc_html__( 'Default Header Image', 'construction-field' ),
		),
	) );
}
add_action( 'after_setup_theme', 'construction_field_custom_header_setup' );