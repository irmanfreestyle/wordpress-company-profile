<?php
/**
 * Acme Demo Setup Data
 * Dont confuse they dont need translations
 *
 * @since Construction Field 1.0.0
 *
 */

if( !function_exists( 'construction_field_demo_nav_data') ){
    function construction_field_demo_nav_data(){
        $demo_navs = array(
            'top-menu'      => 'Top Menu',
            'primary'       => 'Primary Menu',
            'footer-menu'   => 'Footer Menu'
        );
        return $demo_navs;
    }
}
add_filter('acme_demo_setup_nav_data','construction_field_demo_nav_data');

if( !function_exists( 'construction_field_demo_wp_options_data') ){
    function construction_field_demo_wp_options_data(){
        $wp_options = array(
            'page_on_front'     => 'Front Page',
            'page_for_posts'    => 'Blog',
        );
        return $wp_options;
    }
}
add_filter('acme_demo_setup_wp_options_data','construction_field_demo_wp_options_data');

if( !function_exists( 'construction_field_slider_fixed') ){
	function construction_field_slider_fixed(){
		$construction_field_get_theme_options = construction_field_get_theme_options();

		$page_1 = get_page_by_title( 'Building Your Dream Together' );
		$page_2 = get_page_by_title( 'Amazing Construction Theme' );

		$page_ids = array();

		$construction_field_slides_data = json_decode( $construction_field_get_theme_options['construction-field-slides-data'] );
		if( is_array( $construction_field_slides_data ) ){
			$i = 0;
			foreach ( $construction_field_slides_data as $slides_data ){
				if( $i== 1){
					$page_ids[$i]['selectpage'] = absint($page_2->ID);
				}
				else{
					$page_ids[$i]['selectpage'] = absint($page_1->ID);
				}
				$page_ids[$i]['button_1_text'] = sanitize_text_field( $slides_data->button_1_text );
				$page_ids[$i]['button_1_link'] = esc_url_raw( $slides_data->button_1_link );
				$page_ids[$i]['button_2_text'] = sanitize_text_field( $slides_data->button_2_text );
				$page_ids[$i]['button_2_link'] = esc_url_raw( $slides_data->button_2_link );

				$i++;
			}
		}
		if( !empty( $page_ids )){

			$construction_field_get_theme_options['construction-field-slides-data'] = json_encode( $page_ids );
			set_theme_mod( 'construction_field_theme_options', $construction_field_get_theme_options );
		}
	}
}
add_action( 'acme_demo_setup_after_import', 'construction_field_slider_fixed' );