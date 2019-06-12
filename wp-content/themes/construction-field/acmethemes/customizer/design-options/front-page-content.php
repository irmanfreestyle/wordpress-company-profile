<?php
/*active callback function for front-page-header*/
if ( !function_exists('construction_field_active_callback_front_page_header') ) :
    function construction_field_active_callback_front_page_header() {
        $construction_field_customizer_all_values = construction_field_get_theme_options();
        if( 1 != $construction_field_customizer_all_values['construction-field-hide-front-page-content'] ){
            return true;
        }
        return false;
    }
endif;

/*adding sections for front page content */
$wp_customize->add_section( 'construction-field-front-page-content', array(
    'priority'          => 10,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Front Page Content Options', 'construction-field' ),
    'panel'             => 'construction-field-design-panel'

) );

/*hide front page content*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-hide-front-page-content'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox',
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-hide-front-page-content]', array(
    'label'		        => esc_html__( 'Hide Front Page Content', 'construction-field' ),
    'description'       => esc_html__( 'You may want to hide front page content and want to show only Feature section and Home Widgets. Check this to hide front page content.', 'construction-field' ),
    'section'           => 'construction-field-front-page-content',
    'settings'          => 'construction_field_theme_options[construction-field-hide-front-page-content]',
    'type'	  	        => 'checkbox'
) );

/*hide front page header*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-hide-front-page-header]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-hide-front-page-header'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox',
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-hide-front-page-header]', array(
    'label'		        => esc_html__( 'Hide Front Page Header', 'construction-field' ),
    'description'       => esc_html__( 'You may want to hide front page header and want to show only Feature section and Home Widgets. Check this to hide front page Header.', 'construction-field' ),
    'section'           => 'construction-field-front-page-content',
    'settings'          => 'construction_field_theme_options[construction-field-hide-front-page-header]',
    'type'	  	        => 'checkbox',
    'active_callback'   => 'construction_field_active_callback_front_page_header'
) );