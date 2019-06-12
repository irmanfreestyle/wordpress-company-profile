<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'construction-field-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Enable Feature Section', 'construction-field' ),
    'panel'          => 'construction-field-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['construction-field-enable-feature'],
    'sanitize_callback' => 'construction_field_sanitize_checkbox'
) );

$wp_customize->add_control( 'construction_field_theme_options[construction-field-enable-feature]', array(
    'label'		        => esc_html__( 'Enable Feature Section', 'construction-field' ),
    'description'	    => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Slider and Feature Column.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'construction-field' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'           => 'construction-field-enable-feature',
    'settings'          => 'construction_field_theme_options[construction-field-enable-feature]',
    'type'	  	        => 'checkbox'
) );