<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */

/**
 * construction_field_action_before_head hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_set_global -  0
 * @hooked construction_field_doctype -  10
 */
do_action( 'construction_field_action_before_head' );?>
	<head>

		<?php
		/**
		 * construction_field_action_before_wp_head hook
		 * @since Construction Field 1.0.0
		 *
		 * @hooked construction_field_before_wp_head -  10
		 */
		do_action( 'construction_field_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * construction_field_action_before hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_site_start - 20
 */
do_action( 'construction_field_action_before' );

/**
 * construction_field_action_before_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_skip_to_content - 10
 */
do_action( 'construction_field_action_before_header' );

/**
 * construction_field_action_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_header - 10
 */
do_action( 'construction_field_action_header' );

/**
 * construction_field_action_after_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_after_header' );

/**
 * construction_field_action_before_content hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_before_content' );