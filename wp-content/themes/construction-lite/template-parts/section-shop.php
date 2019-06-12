<?php
/**
 * Shop Section
 */
 $construciton_shop_section_title = get_theme_mod('construction_lite_shop_title');
 $construciton_shop_section_sub_title = get_theme_mod('construction_lite_shop_sub_title');
 ?>
<div class="ak-container">
    <?php if($construciton_shop_section_title || $construciton_shop_section_sub_title){ ?>
        <div class="section-title-sub-wrap wow fadeInUp">
            <?php if($construciton_shop_section_title){ ?><div class="section-title"><h5><?php echo esc_html($construciton_shop_section_title); ?></h5></div><?php } ?>
            <?php if($construciton_shop_section_sub_title) { ?><div class="section-sub-title"><h2><?php echo esc_html($construciton_shop_section_sub_title); ?></h2></div><?php } ?>
        </div>
    <?php } ?>
    <div class="products-shop woocommerce clearfix">
        <?php
        $product_args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
            );
        $product_loop = new WP_Query( $product_args );
        if ($product_loop->have_posts()):
            $i = 0;
            while ( $product_loop->have_posts() ) : $product_loop->the_post(); 
                global $product; 
                ?>
                <div class="item-wrap wow fadeInUp">
                    <div class="item-img">
                        <a class="home_product_img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
                            <?php
                            /**
                            * woocommerce_before_shop_loop_item_title hook
                            *
                            * @hooked woocommerce_show_product_loop_sale_flash - 10
                            * @hooked woocommerce_template_loop_product_thumbnail - 10
                            */
                            do_action( 'woocommerce_before_shop_loop_item_title' );?>
                        </a>
                    </div>
                    <?php $average = $product->get_average_rating(); ?>
                    <div class="product-info-wrap <?php if (empty($average)){echo 'no-rating';} ?>">
                        <a class="product-name" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h5><?php the_title(); ?></h5></a>
                        <div class="rating-price clearfix">
                            <a class="home_product_title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
                                <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                            </a>
                            <div class="product-rating">
                                <?php if ($average) : ?>
                                    <?php /* translators: %s : rating */ ?>
                                    <?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'construction-lite' ), floatval($average) ).'"><span style="width:' . floatval( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . floatval ($average) . '</strong> '.__( 'out of 5', 'construction-lite' ).'</span></div>'; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="add-to-cart-shop">
                            <?php woocommerce_template_loop_add_to_cart( $product_loop->post, $product );?>
                        </div>
                    </div>
                </div>
            <?php endwhile; 
        endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>