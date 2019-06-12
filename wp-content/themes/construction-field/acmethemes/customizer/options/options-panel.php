<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'construction-field-options', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'construction-field' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'construction-field' )
) );

/*
* file for header breadcrumb options
*/
require construction_field_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require construction_field_file_directory('acmethemes/customizer/options/search.php');

/*
* file for social options
*/
require construction_field_file_directory('acmethemes/customizer/options/social-options.php');