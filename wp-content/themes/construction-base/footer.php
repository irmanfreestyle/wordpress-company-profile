<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Base
 */

	/**
	 * Hook - construction_base_action_after_content.
	 *
	 * @hooked construction_base_content_end - 10
	 */
	do_action( 'construction_base_action_after_content' );
?>

	<?php
	/**
	 * Hook - construction_base_action_before_footer.
	 *
	 * @hooked construction_base_footer_start - 10
	 */
	do_action( 'construction_base_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - construction_base_action_footer.
	   *
	   * @hooked construction_base_footer_copyright - 10
	   */
	  do_action( 'construction_base_action_footer' );
	?>
	<?php
	/**
	 * Hook - construction_base_action_after_footer.
	 *
	 * @hooked construction_base_footer_end - 10
	 */
	do_action( 'construction_base_action_after_footer' );
	?>

<?php
	/**
	 * Hook - construction_base_action_after.
	 *
	 * @hooked construction_base_page_end - 10
	 * @hooked construction_base_footer_goto_top - 20
	 */
	do_action( 'construction_base_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
