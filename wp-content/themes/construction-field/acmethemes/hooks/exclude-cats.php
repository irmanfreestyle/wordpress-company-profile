<?php
/**
 * Exclude category in blog page
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return int
 */
if( ! function_exists( 'construction_field_exclude_category_in_blog_page' ) ) :
    function construction_field_exclude_category_in_blog_page( $query ) {

        if( $query->is_home && $query->is_main_query()   ) {
            $construction_field_customizer_all_values = construction_field_get_theme_options();
            $exclude_categories = $construction_field_customizer_all_values['construction-field-exclude-categories'];
            if ( ! empty( $exclude_categories ) ) {
                $cats = explode( ',', $exclude_categories );
                $cats = array_filter( $cats, 'is_numeric' );
                $string_exclude = '';
                if ( ! empty( $cats ) ) {
                    $string_exclude = '-' . implode( ',-', $cats);
                    $query->set( 'cat', $string_exclude );
                }
            }
        }
        return $query;
    }
endif;
add_filter( 'pre_get_posts', 'construction_field_exclude_category_in_blog_page' );