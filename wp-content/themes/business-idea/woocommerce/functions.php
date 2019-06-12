<?php 
if ( ! function_exists( 'business_idea_add_to_cart' ) ) :
	/**
	 * Custom add to cart button for WooCommerce.
	 *
	 */
	function business_idea_add_to_cart() {
		global $product;

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_type' ) ) {
			$prod_type = $product->get_type();
		} else {
			$prod_type = $product->product_type;
		}

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_stock_status' ) ) {
			$prod_in_stock = $product->get_stock_status();
		} else {
			$prod_in_stock = $product->is_in_stock();
		}

		if ( $product ) {
			$args = array();
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ', array_filter(
						array(
							'button',
							'product_type_' . $prod_type,
							$product->is_purchasable() && $prod_in_stock ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						)
					)
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			wc_get_template( 'woocommerce/add-to-cart.php', $args );
		}
	}
endif;


/**
 * Refresh WooCommerce cart count instantly.
 *
 */
function business_idea_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>

	<a class="cart-counts" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View cart', 'business-idea' ); ?>">
		<i class="fa fa-shopping-cart"></i> 
		<span>
		<?php
		echo wp_kses(
			$woocommerce->cart->cart_contents_count, array(
				'span' => array(
					'class' => array(),
				),
			)
		);
		?>
		</span>
		</a>
	<?php
	$fragments['a.cart-counts'] = ob_get_clean();
	return $fragments;
}
/* Ensure cart contents update when products are added to the cart via AJAX ) */
add_filter( 'woocommerce_add_to_cart_fragments', 'business_idea_woocommerce_header_add_to_cart_fragment' ); 