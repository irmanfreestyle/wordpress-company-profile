<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construction lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php 
    $construction_lite_top_footer_enable = get_theme_mod('construction_lite_top_footer_enable');
    $construction_lite_top_footer_logo = get_theme_mod('construction_lite_top_footer_logo');
    $construction_lite_top_footer_desc = get_theme_mod('construction_lite_top_footer_description');
    if($construction_lite_top_footer_enable){ ?>
       
        <div class="top-footer wow fadeInUp">
            <div class="ak-container">
                <?php if($construction_lite_top_footer_logo){ ?><div class="footer-logo"><img src="<?php echo esc_url($construction_lite_top_footer_logo); ?>" alt="<?php esc_attr_e('Footer Logo','construction-lite'); ?>" title="<?php esc_attr_e('Footer Logo','construction-lite'); ?>" /></div><?php } ?>
                <?php if($construction_lite_top_footer_desc) { ?><div class="top-footer-desc"><?php echo wp_kses_post($construction_lite_top_footer_desc); ?></div><?php } ?>
                <div class="social-icons">
                    <?php do_action('construction_lite_header_social_link_acrion'); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if(is_active_sidebar('construction-lite-footer-1') || is_active_sidebar('construction-lite-footer-2') || is_active_sidebar('construction-lite-footer-3')){ ?>
        <div class="bottom-footer">
            <div class="ak-container">
                <div class="bottom-footer-wrapper clearfix">
                    <?php if(is_active_sidebar('construction-lite-footer-1')){
                        ?>
                            <div class="footer-1">
                                <?php dynamic_sidebar('construction-lite-footer-1'); ?>
                            </div>
                        <?php
                    } ?>
                    <?php if(is_active_sidebar('construction-lite-footer-2')){
                        ?>
                            <div class="footer-2">
                                <?php dynamic_sidebar('construction-lite-footer-2'); ?>
                            </div>
                        <?php
                    } ?>
                    <?php if(is_active_sidebar('construction-lite-footer-3')){
                        ?>
                            <div class="footer-3">
                                <?php dynamic_sidebar('construction-lite-footer-3'); ?>
                            </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <?php $construction_lite_footer_text = get_theme_mod('construction_lite_footer_text'); ?>
		<div class="site-info">
            <div class="ak-container">
    			<span class="footer-text">
                    <?php 
                    if( !empty($construction_lite_footer_text)){
                        echo wp_kses_post($construction_lite_footer_text) . " | "; 
                    } ?>
                    <?php
                        /* translators: %s : theme page link */
                        printf( wp_kses( __( 'WordPress Theme : <a href="%s">Construction Lite</a> by AccessPress Themes', 'construction-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://accesspressthemes.com/wordpress-themes/construction/' ) ); 
                    ?>
                </span>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>