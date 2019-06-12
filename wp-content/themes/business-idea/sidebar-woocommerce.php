<?php 
/**
 * The woocommerce sidebar template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
 
if ( ! is_active_sidebar( 'sidebar-woocommerce' ) ) {
	return;
}
?>
<div class="col-md-4 col-sm-4">		
	<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
</div><!-- primary sidebar -->