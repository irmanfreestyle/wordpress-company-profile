<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Base
 */

?><?php
	/**
	 * Hook - construction_base_action_doctype.
	 *
	 * @hooked construction_base_doctype -  10
	 */
	do_action( 'construction_base_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - construction_base_action_head.
	 *
	 * @hooked construction_base_head -  10
	 */
	do_action( 'construction_base_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - construction_base_action_before.
	 *
	 * @hooked construction_base_page_start - 10
	 * @hooked construction_base_skip_to_content - 15
	 */
	do_action( 'construction_base_action_before' );
	?>

    <?php
	  /**
	   * Hook - construction_base_action_before_header.
	   *
	   * @hooked construction_base_header_top_content - 5
	   * @hooked construction_base_header_start - 10
	   */
	  do_action( 'construction_base_action_before_header' );
	?>
		<?php
		/**
		 * Hook - construction_base_action_header.
		 *
		 * @hooked construction_base_site_branding - 10
		 */
		do_action( 'construction_base_action_header' );
		?>
	<?php
	  /**
	   * Hook - construction_base_action_after_header.
	   *
	   * @hooked construction_base_header_end - 10
	   */
	  do_action( 'construction_base_action_after_header' );
	?>

	<?php
	/**
	 * Hook - construction_base_action_before_content.
	 *
	 * @hooked construction_base_content_start - 10
	 */
	do_action( 'construction_base_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - construction_base_action_content.
	   */
	  do_action( 'construction_base_action_content' );
	?>
