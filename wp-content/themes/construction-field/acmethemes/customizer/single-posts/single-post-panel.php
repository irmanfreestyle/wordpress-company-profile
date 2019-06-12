<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'construction-field-single-post', array(
	'priority'       => 85,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Post Option', 'construction-field' )
) );

/*
* file for entry meta
*/
require_once construction_field_file_directory('acmethemes/customizer/single-posts/header-title.php');

/*
* file for feature-image
*/
require_once construction_field_file_directory('acmethemes/customizer/single-posts/feature-image.php');