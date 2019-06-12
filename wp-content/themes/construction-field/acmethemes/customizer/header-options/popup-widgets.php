<?php
/*Title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'construction-field' ),
	'section'           => 'construction-field-menu-options',
	'settings'          => 'construction_field_theme_options[construction-field-popup-widget-title]',
	'type'	  	        => 'text',
	'priority'	  	    => 1,
) );
$construction_field_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
if ( ! empty( $construction_field_popup_widget_area ) ) {
	$construction_field_popup_widget_area->panel = 'construction-field-header-panel';
	$construction_field_popup_widget_area->title = esc_html__( 'Popup Widgets', 'construction-field' );
	$construction_field_popup_widget_area->priority = 999;

	$construction_field_popup_widget_title = $wp_customize->get_control( 'construction_field_theme_options[construction-field-popup-widget-title]' );
	if ( ! empty( $construction_field_popup_widget_title ) ) {
		$construction_field_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
		$construction_field_popup_widget_title->priority = -1;
	}
}