<?php
/*active callback function for excerpt*/
if ( !function_exists('construction_field_active_callback_content_from_excerpt') ) :
	function construction_field_active_callback_content_from_excerpt() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 'excerpt' == $construction_field_customizer_all_values['construction-field-blog-archive-content-from'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for blog layout options*/
$wp_customize->add_section( 'construction-field-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'construction-field' ),
    'panel'          => 'construction-field-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-blog-archive-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-blog-archive-img-size'],
    'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_get_image_sizes_options(1);
$wp_customize->add_control( 'construction_field_theme_options[construction-field-blog-archive-img-size]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Blog/Archive Feature Image Size', 'construction-field' ),
    'section'       => 'construction-field-design-blog-layout-option',
    'settings'      => 'construction_field_theme_options[construction-field-blog-archive-img-size]',
    'type'	  	    => 'select'
) );

/*blog content from*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-blog-archive-content-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-blog-archive-content-from'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_blog_archive_content_from();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-blog-archive-content-from]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Blog/Archive Content From', 'construction-field' ),
	'section'       => 'construction-field-design-blog-layout-option',
	'settings'      => 'construction_field_theme_options[construction-field-blog-archive-content-from]',
	'type'	  	    => 'select'
) );

/*Excerpt Length*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-blog-archive-excerpt-length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-blog-archive-excerpt-length'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-blog-archive-excerpt-length]', array(
	'label'		        => esc_html__( 'Except Length', 'construction-field' ),
	'section'           => 'construction-field-design-blog-layout-option',
	'settings'          => 'construction_field_theme_options[construction-field-blog-archive-excerpt-length]',
	'type'	  	        => 'number',
	'active_callback'   => 'construction_field_active_callback_content_from_excerpt'
) );

/*Read More Text*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-blog-archive-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-blog-archive-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-blog-archive-more-text]', array(
    'label'		=> esc_html__( 'Read More Text', 'construction-field' ),
    'section'   => 'construction-field-design-blog-layout-option',
    'settings'  => 'construction_field_theme_options[construction-field-blog-archive-more-text]',
    'type'	  	=> 'text'
) );

/*Exclude Categories In Blog Page*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-exclude-categories]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-exclude-categories'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-exclude-categories]', array(
	'label'		    => esc_html__( 'Exclude Categories In Blog Page', 'construction-field' ),
	'description'   =>  esc_html__( 'Enter categories ids in comma separated eg: 3,5,7,95. For including all categories left blank', 'construction-field' ),
	'section'       => 'construction-field-design-blog-layout-option',
	'settings'      => 'construction_field_theme_options[construction-field-exclude-categories]',
	'type'	  	    => 'text'
) );
