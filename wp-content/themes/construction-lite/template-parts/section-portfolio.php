<?php
/**
 * Portfolio Section
 */
 $construction_lite_portfolio_section_title = get_theme_mod('construction_lite_portfolio_title');
 $construction_lite_portfolio_section_sub_title = get_theme_mod('construction_lite_portfolio_sub_title');
 $construction_lite_portfolio_cat = get_theme_mod('construction_lite_portfolio_cat');
 if($construction_lite_portfolio_section_title || $construction_lite_portfolio_section_sub_title || $construction_lite_portfolio_cat){
    ?>
        <div class="portfolio-wrap-contents">
            <?php if($construction_lite_portfolio_section_title || $construction_lite_portfolio_section_sub_title){ ?>
                <div class="ak-container">
                    <div class="section-title-sub-wrap wow fadeInUp">
                        <?php if($construction_lite_portfolio_section_title){ ?><div class="section-title"><h5><?php echo esc_html($construction_lite_portfolio_section_title); ?></h5></div><?php } ?>
                        <?php if($construction_lite_portfolio_section_sub_title) { ?><div class="section-sub-title"><h2><?php echo esc_html($construction_lite_portfolio_section_sub_title); ?></h2></div><?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php
            if($construction_lite_portfolio_cat){
                $construction_lite_portfolio_args = array(
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'category_name' => $construction_lite_portfolio_cat
                );
                $construction_lite_portfolio_query = new WP_Query($construction_lite_portfolio_args);
                if($construction_lite_portfolio_query->have_posts()):
                    ?>
                        <div class="portfoli-works wow fadeInUp">
                            <div id="portfolio-workd-wrap" class="owl-carousel">
                                <?php while($construction_lite_portfolio_query->have_posts()):
                                        $construction_lite_portfolio_query->the_post();
                                        $construction_lite_portfolio_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'construction-portfolio-image');
                                        $construction_lite_portfolio_image_url = $construction_lite_portfolio_image_src[0]; 
                                        if($construction_lite_portfolio_image_url || get_the_title()){?>
                                                <a href="<?php the_permalink() ?>">
                                                    <div class="images-content">
                                                        <?php if($construction_lite_portfolio_image_url){ ?><div class="image-wrap"><img src="<?php echo esc_url($construction_lite_portfolio_image_url); ?>" /></div><?php } ?>
                                                        <?php if(get_the_title()){ ?><div class="work-title"><h3><?php the_title(); ?></h3></div><?php } ?>
                                                    </div>
                                                </a>
                                            
                                        <?php } ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php
                endif;
            }
            ?>
        </div>
    <?php
 }