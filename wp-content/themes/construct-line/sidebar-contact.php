<?php 
/**
 * The contact page template sidebar file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
 
if ( ! is_active_sidebar( 'sidebar-contact' ) ) {
	return;
}
?>
<div class="col-md-4 col-sm-6">		
	<?php dynamic_sidebar( 'sidebar-contact' ); ?>
</div><!-- secondary sidebar -->