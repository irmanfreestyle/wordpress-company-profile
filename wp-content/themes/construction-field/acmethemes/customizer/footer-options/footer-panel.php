<?php
/*adding footer options panel*/
$wp_customize->add_panel( 'construction-field-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'construction-field' ),
    'description'    => esc_html__( 'Customize your awesome site footer ', 'construction-field' )
) );

/*
* file for background image
*/
require construction_field_file_directory('acmethemes/customizer/footer-options/footer-bg-img.php');

/*
* file for footer logo options
*/
require construction_field_file_directory('acmethemes/customizer/footer-options/footer-copyright.php');