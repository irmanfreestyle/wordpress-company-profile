<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$shop_no_of_show = $business_idea_option['business_idea_shop_product_show'];

if( !class_exists('woocommerce') ){
	$business_idea_option['business_idea_shop_disable'] = true;
}

$class = 'noneimage-padding';
if( !$business_idea_option['business_idea_shop_disable'] ): ?>
<section id="product" class="sections product-area <?php echo esc_attr( $class ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $business_idea_option['business_idea_shoptitle'] ) ){ ?>
				<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_shoptitle'] ); ?></h2>
				<?php } ?>
				<?php if( !empty( $business_idea_option['business_idea_shopsubtitle'] ) ){ ?>
				<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_shopsubtitle'] ); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<?php business_idea_shop_content( $shop_no_of_show ); ?>
		
	</div><!-- /.container -->
</section><!-- /.product-area -->
<?php endif; ?>