<?php
$construction_lite_post_lists = get_posts(array('posts_per_page' => -1));
/**
 * The header for our theme.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construction lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<input type="hidden" id="ajax-url" url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" />
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'construction-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="ak-container">
    		<div class="site-branding">
            <?php
                if(has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    $description = get_bloginfo( 'description','display' );
                    if ( $description || is_customize_preview() ) {
                        ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php
                    }
                }
            ?>
    		</div><!-- .site-branding -->
    
    		<nav id="site-navigation" class="main-navigation" role="navigation">
                <div id="toggle" class="">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="three"></div>
                </div>
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu', 'fallback_cb' => false ) ); ?>
    		
                <?php $construction_lite_header_search_enable = get_theme_mod('construction_lite_search_enable');
                 if($construction_lite_header_search_enable){ ?>
                 <div class="search-toggle">
                    <a href="javascript:void(0)" class="search-icon"><i class="fa fa-search"></i></a>
    				<div class="ak-search">
    				    <?php get_search_form(); ?>
    				</div>
                </div>
                <?php }

                $construction_lite_header_cart_enable = get_theme_mod('construction_lite_cart_enable');
                if($construction_lite_header_cart_enable && is_woocommerce_activated()){
                    $cart_url = wc_get_page_permalink( 'cart' );
                    ?>
                    <div class="header-cart-search">
                        <div class="cart-list-wrap">
                            <a href="<?php echo esc_url($cart_url); ?>" class="cart-fa-icon">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="cart-count"><?php echo absint(WC()->cart->get_cart_contents_count()); ?></span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->
    <?php
    if(is_home() || is_front_page()){
        if(get_theme_mod('construction_lite_slider_enable')){
            do_action('construction_lite_slider_action');
        }
    }
    ?>
	<div id="content" class="site-content">