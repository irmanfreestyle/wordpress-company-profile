<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Construction_Base
 */

if ( ! function_exists( 'construction_base_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'construction-base' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'construction-base' ),
			'three-columns' => esc_html__( 'Three Columns', 'construction-base' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'construction-base' ),
		);
		$output = apply_filters( 'construction_base_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'construction_base_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'construction-base' ),
			'simple'   => esc_html__( 'Enabled', 'construction-base' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'construction_base_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'construction-base' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'construction-base' ),
		);
		$output = apply_filters( 'construction_base_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'construction_base_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function construction_base_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'construction-base' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'construction-base' );
		$choices['medium']    = esc_html__( 'Medium', 'construction-base' );
		$choices['large']     = esc_html__( 'Large', 'construction-base' );
		$choices['full']      = esc_html__( 'Full (original)', 'construction-base' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'construction_base_get_image_alignment_options' ) ) :

	/**
	 * Returns image alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_image_alignment_options() {

		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'construction-base' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'construction-base' ),
			'center' => esc_html_x( 'Center', 'alignment', 'construction-base' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'construction-base' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'construction_base_get_slider_caption_alignment_options' ) ) :

	/**
	 * Returns slider caption alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_slider_caption_alignment_options() {

		$choices = array(
			'left'   => esc_html_x( 'Left', 'alignment', 'construction-base' ),
			'center' => esc_html_x( 'Center', 'alignment', 'construction-base' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'construction-base' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'construction_base_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'transition effect', 'construction-base' ),
			'fadeout'    => _x( 'fadeout', 'transition effect', 'construction-base' ),
			'none'       => _x( 'none', 'transition effect', 'construction-base' ),
			'scrollHorz' => _x( 'scrollHorz', 'transition effect', 'construction-base' ),
		);
		$output = apply_filters( 'construction_base_filter_featured_slider_transition_effects', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'construction_base_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_featured_slider_content_options() {

		$choices = array(
			'home-page' => esc_html__( 'Static Front Page Only', 'construction-base' ),
			'disabled'  => esc_html__( 'Disabled', 'construction-base' ),
		);
		$output = apply_filters( 'construction_base_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'construction_base_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function construction_base_get_featured_slider_type() {

		$choices = array(
			'featured-page' => __( 'Featured Pages', 'construction-base' ),
		);
		$output = apply_filters( 'construction_base_filter_featured_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'construction_base_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 *
	 * @return array Options array.
	 */
	function construction_base_get_numbers_dropdown_options( $min = 1, $max = 4 ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$output[ $i ] = $i;
			}
		}

		return $output;

	}

endif;
