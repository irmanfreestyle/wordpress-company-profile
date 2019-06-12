<?php
if ( ! function_exists( 'construction_field_gutenberg_setup' ) ) :
	/**
	 * Making theme gutenberg compatible
	 */
	function construction_field_gutenberg_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'construction_field_gutenberg_setup' );

function construction_field_dynamic_editor_styles(){

	global $construction_field_customizer_all_values;
	$construction_field_link_color               = esc_attr( $construction_field_customizer_all_values['construction_field-link-color'] );
	$construction_field_link_hover_color         = esc_attr( $construction_field_customizer_all_values['construction_field-link-hover-color'] );

	$custom_css = '';

	$custom_css .= "
            .edit-post-visual-editor, 
			.edit-post-visual-editor p {
               color: #666;
            }";

	$custom_css .= "
	        .wp-block .wp-block-heading h1, 
	        .wp-block .wp-block-heading h1 a,
	        .wp-block .wp-block-heading h2,
	        .wp-block .wp-block-heading h2 a,
	        .wp-block .wp-block-heading h3, 
	        .wp-block .wp-block-heading h3 a,
	        .wp-block .wp-block-heading h4, 
	        .wp-block .wp-block-heading h4 a,
	        .wp-block .wp-block-heading h5, 
	        .wp-block .wp-block-heading h5 a,
	        .wp-block .wp-block-heading h6,
	        .wp-block .wp-block-heading h6 a{
	            color: #3a3a3a;
	        }";

	$custom_css .= "
	        .wp-block a{
	            color: {$construction_field_link_color};
	        }";
	$custom_css .= "
	        .wp-block a:hover,
	        .wp-block a:active,
	        .wp-block a:focus{
	            color: {$construction_field_link_hover_color};
	        }";

        return wp_strip_all_tags( $custom_css );	
}

/**
 * Enqueue block editor style
 */
function construction_field_block_editor_styles() {
	wp_enqueue_style( 'construction_field-googleapis', '//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', array(), null );
	wp_enqueue_style( 'construction_field-block-editor-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-edit.css', false, '1.0' );

	/**
	 * Styles from the customizer
	 */
	wp_add_inline_style( 'construction_field-block-editor-styles', construction_field_dynamic_editor_styles() );
}
add_action( 'enqueue_block_editor_assets', 'construction_field_block_editor_styles',99 );

function construction_field_gutenberg_scripts() {
	wp_enqueue_style( 'construction_field-block-front-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-front.css', false, '1.0' );
	wp_style_add_data( 'construction_field-block-front-styles', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'construction_field_gutenberg_scripts' );