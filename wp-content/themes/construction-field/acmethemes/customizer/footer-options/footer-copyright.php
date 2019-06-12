<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'construction-field-footer-copyright-option', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Bottom Copyright Section', 'construction-field' ),
    'panel'                 => 'construction-field-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-footer-copyright]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['construction-field-footer-copyright'],
    'sanitize_callback'     => 'wp_kses_post'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-footer-copyright]', array(
    'label'		            => esc_html__( 'Copyright Text', 'construction-field' ),
    'section'               => 'construction-field-footer-copyright-option',
    'settings'              => 'construction_field_theme_options[construction-field-footer-copyright]',
    'type'	  	            => 'text'
) );

/*footer copyright beside*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-footer-copyright-beside-option]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-footer-copyright-beside-option'],
	'sanitize_callback'     => 'construction_field_sanitize_select'
) );
$choices = construction_field_footer_copyright_beside_option();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-footer-copyright-beside-option]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Footer Copyright Beside Option', 'construction-field' ),
	'section'               => 'construction-field-footer-copyright-option',
	'settings'              => 'construction_field_theme_options[construction-field-footer-copyright-beside-option]',
	'type'	  	            => 'select'
) );