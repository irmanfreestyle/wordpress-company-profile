<?php
/** 
 * Woocommerce Functions & Hook
*/
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
add_action('woocommerce_before_main_content','construction_lite_woocommerce_breadcrumb',20);
add_action('woocommerce_before_main_content','construction_lite_woocommerce_wrap_start',22);
add_action('woocommerce_after_main_content','construction_lite_woocommerce_wrap_end',12);
add_action('woocommerce_before_shop_loop_item_title','construction_lite_show_product_loop_sale_flash_start',8);
add_action('woocommerce_before_shop_loop_item_title','construction_lite_show_product_loop_sale_flash_end',11);
add_action('woocommerce_before_single_product_summary','construction_lite_show_product_loop_sale_flash_start',8);
add_action('woocommerce_before_single_product_summary','construction_lite_show_product_loop_sale_flash_end',12);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',12);
add_filter('woocommerce_sale_flash', 'construction_lite_change_sale_to_percentage', 21, 3);
remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
add_action('woocommerce_shop_loop_item_title','construction_lite_title_price_rating_wrap_start',8);
add_action('woocommerce_after_shop_loop_item_title','construction_lite_title_price_rating_wrap_end',12);
function construction_lite_woocommerce_breadcrumb(){
    do_action('construction_lite_header_banner');
}
function construction_lite_woocommerce_wrap_start(){
    ?>
    <div class="ak-container">
    	<div id="primary" class="content-area">
    		<main id="main" class="site-main" role="main">
    <?php
}
function construction_lite_woocommerce_wrap_end(){
    ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <?php
}
function construction_lite_show_product_loop_sale_flash_start(){
    ?>
        <div class="shop-flash-wrap">
    <?php
}
function construction_lite_show_product_loop_sale_flash_end(){
    ?>
        </div>
    <?php
}
function construction_lite_change_sale_to_percentage($content, $post, $product){

    if (!$product->is_in_stock()) return;
    $sale_price = get_post_meta($product->id, '_price', true);
    $regular_price = get_post_meta($product->id, '_regular_price', true);
        
        if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price){
            $sale = ceil((($regular_price - $sale_price) / $regular_price) * 100);
            $content = '<span class="onsale">-' . $sale . '%</span>';
            return $content;
        }
}
add_action( 'wp_ajax_nopriv_construction_lite_ajax_woocommerce', 'construction_lite_ajax_woocommerce' );
add_action( 'wp_ajax_construction_lite_ajax_woocommerce', 'construction_lite_ajax_woocommerce' );
function construction_lite_ajax_woocommerce() {
	$product_id = isset( $_POST['product_id'] ) ? sanitize_text_field( wp_unslash( $_POST['product_id'] ) ) : '';
    $construction_lite_feature_posts = new WP_Query(array('post_type' => 'product', 'post__in' => array($product_id)));
    if($construction_lite_feature_posts->have_posts()):
        while($construction_lite_feature_posts->have_posts()):$construction_lite_feature_posts->the_post();
            $construction_lite_price = get_post_meta($product_id,'_regular_price',true);
            echo esc_html( $construction_lite_price );
            $construction_lite_woo_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'');
            $construction_lite_woo_image_url = $construction_lite_woo_image_src[0];?>
            <div class="cart-grid-box">
                <div class="cart-grid-box-img">
                    <img class="img-responsive" src="<?php echo esc_url($construction_lite_woo_image_url); ?>" alt="">
                </div>
                <div class="cart-grid-box-title">
                    <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                    <p class="price"> <?php echo absint($construction_lite_price); ?></p>
                </div>
                <div class="cart-grid-box-del">
                    <a href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <?php
        endwhile; wp_reset_postdata();
    endif;
	die();
}
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'construction_lite_woocommerce_header_add_to_cart_fragment' );
function construction_lite_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
    <span class="cart-count"><?php echo absint(WC()->cart->get_cart_contents_count()); ?></span> 
	<?php
	
	$fragments['span.cart-count'] = ob_get_clean();
	
	return $fragments;
}
function construction_lite_title_price_rating_wrap_start(){
    ?>
        <div class="clearfix title-proce-rating">
    <?php
}
function construction_lite_title_price_rating_wrap_end(){
    ?>
    </div>
    <?php
}