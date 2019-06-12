<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('construction_field_sidebar_selection') ) :
	function construction_field_sidebar_selection( ) {
		wp_reset_postdata();
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		global $post;
		if(
			isset( $construction_field_customizer_all_values['construction-field-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $construction_field_customizer_all_values['construction-field-single-sidebar-layout'] ||
				'both-sidebar' == $construction_field_customizer_all_values['construction-field-single-sidebar-layout'] ||
				'middle-col' == $construction_field_customizer_all_values['construction-field-single-sidebar-layout'] ||
				'no-sidebar' == $construction_field_customizer_all_values['construction-field-single-sidebar-layout']
			)
		){
			$construction_field_body_global_class = $construction_field_customizer_all_values['construction-field-single-sidebar-layout'];
		}
		else{
			$construction_field_body_global_class= 'right-sidebar';
		}

		if ( construction_field_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'construction_field_sidebar_layout', true );
				$construction_field_wc_single_product_sidebar_layout = $construction_field_customizer_all_values['construction-field-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$construction_field_body_classes = $post_class;
					} else {
						$construction_field_body_classes = $construction_field_wc_single_product_sidebar_layout;
					}
				}
				else{
					$construction_field_body_classes = $construction_field_wc_single_product_sidebar_layout;
				}
			}
			else{
				if( isset( $construction_field_customizer_all_values['construction-field-wc-shop-archive-sidebar-layout'] ) ){
					$construction_field_archive_sidebar_layout = $construction_field_customizer_all_values['construction-field-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $construction_field_archive_sidebar_layout ||
						'left-sidebar' == $construction_field_archive_sidebar_layout ||
						'both-sidebar' == $construction_field_archive_sidebar_layout ||
						'middle-col' == $construction_field_archive_sidebar_layout ||
						'no-sidebar' == $construction_field_archive_sidebar_layout
					){
						$construction_field_body_classes = $construction_field_archive_sidebar_layout;
					}
					else{
						$construction_field_body_classes = $construction_field_body_global_class;
					}
				}
				else{
					$construction_field_body_classes= $construction_field_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'] ||
					'left-sidebar' == $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'] ||
					'both-sidebar' == $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'] ||
					'middle-col' == $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'] ||
					'no-sidebar' == $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout']
				){
					$construction_field_body_classes = $construction_field_customizer_all_values['construction-field-front-page-sidebar-layout'];
				}
				else{
					$construction_field_body_classes = $construction_field_body_global_class;
				}
			}
			else{
				$construction_field_body_classes= $construction_field_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'construction_field_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$construction_field_body_classes = $post_class;
				} else {
					$construction_field_body_classes = $construction_field_body_global_class;
				}
			}
			else{
				$construction_field_body_classes = $construction_field_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $construction_field_customizer_all_values['construction-field-archive-sidebar-layout'] ) ){
				$construction_field_archive_sidebar_layout = $construction_field_customizer_all_values['construction-field-archive-sidebar-layout'];
				if(
					'right-sidebar' == $construction_field_archive_sidebar_layout ||
					'left-sidebar' == $construction_field_archive_sidebar_layout ||
					'both-sidebar' == $construction_field_archive_sidebar_layout ||
					'middle-col' == $construction_field_archive_sidebar_layout ||
					'no-sidebar' == $construction_field_archive_sidebar_layout
				){
					$construction_field_body_classes = $construction_field_archive_sidebar_layout;
				}
				else{
					$construction_field_body_classes = $construction_field_body_global_class;
				}
			}
			else{
				$construction_field_body_classes= $construction_field_body_global_class;
			}
		}
		else {
			$construction_field_body_classes = $construction_field_body_global_class;
		}
		return $construction_field_body_classes;
	}
endif;