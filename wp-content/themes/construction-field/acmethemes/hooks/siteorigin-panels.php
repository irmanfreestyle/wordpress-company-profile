<?php
/**
 * Adds Construction Field Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
function construction_field_siteorigin_widgets($widgets) {
    $theme_widgets = array(
        'Construction_Field_About',
        'Construction_Field_Accordion',
        'Construction_Field_Posts_Col',
        'Construction_Field_Contact',
        'Construction_Field_Service',
        'Construction_Field_Gallery',
        'Construction_Field_Social',
        'Construction_Field_Team',
        'Construction_Field_Testimonial',
        'Construction_Field_Feature',
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('construction-field');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'construction_field_siteorigin_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
function construction_field_siteorigin_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Construction Field Widgets', 'construction-field'),
        'filter' => array(
            'groups' => array('construction-field')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'construction_field_siteorigin_widgets_tab', 20 );