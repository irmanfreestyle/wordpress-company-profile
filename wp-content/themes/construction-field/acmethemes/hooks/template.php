<?php
if ( ! function_exists( 'construction_field_posts_navigation' ) ) :
	/**
	 * Post navigation
	 *
	 * @since Construction Field 1.0.0
	 *
	 * @return void
	 */
	function construction_field_posts_navigation() {
		the_posts_pagination();
	}
endif;
add_action( 'construction_field_action_posts_navigation', 'construction_field_posts_navigation' );

/**
 * Feature Options
 *
 * @since Medical Circle 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('construction_field_featured_image_display') ) :
	function construction_field_featured_image_display( $post_id ) {
		global $construction_field_customizer_all_values;
		$construction_field_single_image_layout = $construction_field_customizer_all_values['construction-field-single-img-size'];

		return $construction_field_single_image_layout;
	}
endif;