<?php
/**
 * Recommended plugins.
 *
 * @package Construction_Base
 */

if ( ! function_exists( 'construction_base_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function construction_base_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Team View', 'construction-base' ),
				'slug'     => 'team-view',
				'required' => false,
			),
		);

		$config = array();

		tgmpa( $plugins, $config );

	}

endif;

add_filter( 'tgmpa_register', 'construction_base_recommended_plugins' );
