<?php
/**
 * This is woocommerce template file
 *
 */

get_header(); 
$layout = business_idea_get_layout();
$col = '8';
if($layout=='none'){
	$col = '12';
}
?>
<section class="site-content">
	<div class="container">
		<div class="row">
			
			<?php 
			if ( $layout != 'none' && $layout=='left' ) {
				get_sidebar(); 
			} 
			?>
			
			<div class="col-md-<?php echo esc_attr( $col ); ?> col-sm-<?php echo esc_attr( $col ); ?>">
				
				<?php woocommerce_content(); ?>	
			
			</div>
			
			<?php 
			if ( $layout != 'none' && $layout=='right' ) {
				get_sidebar( 'woocommerce' ); 
			} 
			?>		
			
		</div>
	</div>
</section>

<?php get_footer(); ?>