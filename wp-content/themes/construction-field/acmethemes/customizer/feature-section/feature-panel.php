<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'construction-field-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Featured Section Options', 'construction-field' ),
    'description'    => esc_html__( 'Customize your awesome site feature section ', 'construction-field' )
) );

/*
* file for feature section enable
*/
require construction_field_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require construction_field_file_directory('acmethemes/customizer/feature-section/feature-slider.php');

/*
* file for feature info
*/
require construction_field_file_directory('acmethemes/customizer/feature-section/feature-info.php');