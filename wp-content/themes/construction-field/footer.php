<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */

/**
 * construction_field_action_after_content hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_after_content' );

/**
 * construction_field_action_before_footer hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_before_footer' );

/**
 * construction_field_action_footer hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_footer - 10
 */
do_action( 'construction_field_action_footer' );

/**
 * construction_field_action_after_footer hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_after_footer' );

/**
 * construction_field_action_after hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_page_end - 10
 */
do_action( 'construction_field_action_after' );

wp_footer();
?>
</body>
</html>