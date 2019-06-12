<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'construction_field_featured_slider' ) ) :

    function construction_field_featured_slider() {
        global $construction_field_customizer_all_values;

        $construction_field_enable_feature = $construction_field_customizer_all_values['construction-field-enable-feature'];
        if( is_front_page() && 1 == $construction_field_enable_feature && !is_home() ) :
	        $construction_field_feature_info_display_options = $construction_field_customizer_all_values['construction-field-feature-info-display-options'];
            if( 'above' == $construction_field_feature_info_display_options ){
            	echo "<div class='container primary-bg'>";
	            do_action( 'construction_field_action_feature_info' );
	            echo "</div>";
            }
	        do_action( 'construction_field_action_feature_slider' );
	        if( 'below' == $construction_field_feature_info_display_options ){
		        echo "<div class='container primary-bg'>";
		        do_action( 'construction_field_action_feature_info' );
		        echo "</div>";
	        }
        endif;
    }
endif;
add_action( 'construction_field_action_front_page', 'construction_field_featured_slider', 10 );

if ( ! function_exists( 'construction_field_front_page' ) ) :

    function construction_field_front_page() {
        global $construction_field_customizer_all_values;

        $construction_field_hide_front_page_content = $construction_field_customizer_all_values['construction-field-hide-front-page-content'];

        /*show widget in front page, now user are not force to use front page*/
        if( is_active_sidebar( 'construction-field-home' ) && !is_home() ){
            dynamic_sidebar( 'construction-field-home' );
        }
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        else {
            if( 1 != $construction_field_hide_front_page_content ){
                include( get_page_template() );
            }
        }
    }
endif;
add_action( 'construction_field_action_front_page', 'construction_field_front_page', 20 );