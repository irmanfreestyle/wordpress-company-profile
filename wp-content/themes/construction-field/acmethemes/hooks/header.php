<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'construction_field_set_global' ) ) :
    function construction_field_set_global() {
        /*Getting saved values start*/
        $construction_field_saved_theme_options = construction_field_get_theme_options();
        $GLOBALS['construction_field_customizer_all_values'] = $construction_field_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'construction_field_action_before_head', 'construction_field_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'construction_field_doctype' ) ) :
    function construction_field_doctype() {
        ?><!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'construction_field_action_before_head', 'construction_field_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'construction_field_before_wp_head' ) ) :

    function construction_field_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="//gmpg.org/xfn/11">
        <?php
    }
endif;
add_action( 'construction_field_action_before_wp_head', 'construction_field_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_body_class' ) ) :

    function construction_field_body_class( $construction_field_body_classes ) {

        global $construction_field_customizer_all_values;
        $construction_field_enable_animation = $construction_field_customizer_all_values['construction-field-enable-animation'];
        $construction_field_feature_info_display_options = $construction_field_customizer_all_values['construction-field-feature-info-display-options'];

        /*wow animation*/
        if( 1 != $construction_field_enable_animation ){
            $construction_field_body_classes[] = 'acme-animate';
        }
        $construction_field_body_classes[] = construction_field_sidebar_selection();

        if( 'hide' != $construction_field_feature_info_display_options ){
	        $construction_field_body_classes[] = esc_attr( $construction_field_feature_info_display_options );
        }
        return $construction_field_body_classes;
    }
endif;
add_action( 'body_class', 'construction_field_body_class', 10, 1 );

/**
 * Start site div
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_site_start' ) ) :

    function construction_field_site_start() {
        ?>
        <div class="site" id="page">
        <?php
    }
endif;
add_action( 'construction_field_action_before', 'construction_field_site_start', 20 );

/**
 * Skip to content
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_skip_to_content' ) ) :

    function construction_field_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'construction-field' ); ?></a>
        <?php
    }
endif;
add_action( 'construction_field_action_before_header', 'construction_field_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_header' ) ) :
    function construction_field_header() {
        global $construction_field_customizer_all_values;
        $construction_field_enable_header_top = $construction_field_customizer_all_values['construction-field-enable-header-top'];
	    $construction_field_nav_class = '';
	    $construction_field_enable_sticky = $construction_field_customizer_all_values['construction-field-enable-sticky'];
	    if( 1 == $construction_field_enable_sticky ){
		    $construction_field_nav_class .= ' construction-field-sticky';
	    }
        $construction_field_feature_info_display_options = $construction_field_customizer_all_values['construction-field-feature-info-display-options'];
        if( 1 == $construction_field_enable_header_top ){
            ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <?php
                                $construction_field_header_top_menu_display_selection = $construction_field_customizer_all_values['construction-field-header-top-menu-display-selection'];
                                $construction_field_header_top_news_display_selection = $construction_field_customizer_all_values['construction-field-header-top-news-display-selection'];
                                $construction_field_header_top_social_display_selection = $construction_field_customizer_all_values['construction-field-header-top-social-display-selection'];

                                if( 'left' == $construction_field_header_top_menu_display_selection ){
                                    do_action('construction_field_action_top_menu');
                                }
                                if( 'left' == $construction_field_header_top_social_display_selection ){
                                    do_action('construction_field_action_social_links');
                                }
                                if( 'left' == $construction_field_header_top_news_display_selection ){
                                    do_action('construction_field_action_newsnotice');
                                }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                                if( 'right' == $construction_field_header_top_menu_display_selection ){
                                    do_action('construction_field_action_top_menu');
                                }
                                if( 'right' == $construction_field_header_top_social_display_selection ){
                                    do_action('construction_field_action_social_links');
                                }
                                if( 'right' == $construction_field_header_top_news_display_selection ){
                                    do_action('construction_field_action_newsnotice');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="navbar at-navbar <?php echo ('alternative-info-menu' != $construction_field_feature_info_display_options? esc_attr( $construction_field_nav_class ) : '' );?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <?php
                    if( 'alternative-info-menu' != $construction_field_feature_info_display_options ){
                        ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                        <?php
                    }
                    $construction_field_display_site_logo = $construction_field_customizer_all_values['construction-field-display-site-logo'];
	                $construction_field_display_site_title = $construction_field_customizer_all_values['construction-field-display-site-title'];
	                $construction_field_display_site_tagline = $construction_field_customizer_all_values['construction-field-display-site-tagline'];
	                
                    if( 1== $construction_field_display_site_logo || 1 == $construction_field_display_site_title || 1 == $construction_field_display_site_tagline ):
                        if ( 1 == $construction_field_display_site_logo && function_exists( 'the_custom_logo' ) ):
                            the_custom_logo();
                        endif;
                        if ( 1== $construction_field_display_site_title  ):
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                        endif;
                        if ( 1== $construction_field_display_site_tagline  ):
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                            <?php endif;
                        endif;
                    endif;
                    ?>
                </div>
                <div class="at-beside-navbar-header">
	                <?php
	                if( 'alternative-info-menu' == $construction_field_feature_info_display_options ){
		                do_action( 'construction_field_action_feature_info' );
	                }
	                else{
		                construction_field_primary_menu();
	                }
	                ?>
                </div>
                <!--.at-beside-navbar-header-->
            </div>
            <?php
            if( 'alternative-info-menu' == $construction_field_feature_info_display_options ){
                ?>
                <div class="alternative-info-menu-navigation-wrap <?php echo ('alternative-info-menu' == $construction_field_feature_info_display_options? esc_attr( $construction_field_nav_class ) : '' );?>">
                    <div class="container">
                        <div class="row">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                        <?php
                         construction_field_primary_menu();
                         ?>
                    </div><!--.container-->
                </div><!--.at-navigation-wrap-->
                <?php
            }
            ?>
        </div>
        <?php
    }
endif;
add_action( 'construction_field_action_header', 'construction_field_header', 10 );