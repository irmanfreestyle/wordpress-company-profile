<?php
/*check if enable header top*/
if ( !function_exists('construction_field_is_enable_header_top') ) :
	function construction_field_is_enable_header_top() {
		$construction_field_customizer_all_values = construction_field_get_theme_options();
		if( 1 == $construction_field_customizer_all_values['construction-field-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'construction-field-header-top-option', array(
    'priority'                  => 10,
    'capability'                => 'edit_theme_options',
    'title'                     => esc_html__( 'Header Top', 'construction-field' ),
    'panel'                     => 'construction-field-header-panel',
) );

/*header top enable*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-enable-header-top]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['construction-field-enable-header-top'],
    'sanitize_callback'         => 'construction_field_sanitize_checkbox',
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-enable-header-top]', array(
    'label'		                => esc_html__( 'Enable Header Top Options', 'construction-field' ),
    'section'                   => 'construction-field-header-top-option',
    'settings'                  => 'construction_field_theme_options[construction-field-enable-header-top]',
    'type'	  	                => 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-header-top-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-header-top-message]',
		array(
			'section'           => 'construction-field-header-top-option',
			'description'       => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','construction-field')."</h2>",
			'settings'          => 'construction_field_theme_options[construction-field-header-top-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'construction_field_is_enable_header_top'
		)
	)
);

/*Top Menu Display*/
$choices = construction_field_header_top_display_selection();
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-top-menu-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['construction-field-header-top-menu-display-selection'],
	'sanitize_callback'         => 'construction_field_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'construction-field' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-header-top-menu-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Menu Display', 'construction-field' ),
	'description'		        => $description,
	'section'                   => 'construction-field-header-top-option',
	'settings'                  => 'construction_field_theme_options[construction-field-header-top-menu-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'construction_field_is_enable_header_top'
) );

/*News/Notice display*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-top-news-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['construction-field-header-top-news-display-selection'],
	'sanitize_callback'         => 'construction_field_sanitize_select'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-header-top-news-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'News/Notice Display', 'construction-field' ),
	'section'                   => 'construction-field-header-top-option',
	'settings'                  => 'construction_field_theme_options[construction-field-header-top-news-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'construction_field_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-header-top-social-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['construction-field-header-top-social-display-selection'],
	'sanitize_callback'         => 'construction_field_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'construction-field' ), '<a class="at-customizer button button-primary" data-section="construction-field-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-header-top-social-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Social Display', 'construction-field' ),
	'description'               => $description,
	'section'                   => 'construction-field-header-top-option',
	'settings'                  => 'construction_field_theme_options[construction-field-header-top-social-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'construction_field_is_enable_header_top'
) );

/*header top message*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-header-top-newsnotice-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-header-top-newsnotice-message]',
		array(
			'section'           => 'construction-field-header-top-option',
			'description'       => "<hr />",
			'settings'          => 'construction_field_theme_options[construction-field-header-top-newsnotice-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'construction_field_is_enable_header_top'
		)
	)
);

/*News title*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-newsnotice-title]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['construction-field-newsnotice-title'],
    'sanitize_callback'         => 'sanitize_text_field'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-newsnotice-title]', array(
    'label'		                => esc_html__( 'News/Notice/Announcement Title', 'construction-field' ),
    'section'                   => 'construction-field-header-top-option',
    'settings'                  => 'construction_field_theme_options[construction-field-newsnotice-title]',
    'type'	  	                => 'text',
    'active_callback'           => 'construction_field_is_enable_header_top'
) );

/* News cat selection */
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-newsnotice-cat]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['construction-field-newsnotice-cat'],
    'sanitize_callback'         => 'construction_field_sanitize_number'
) );

$wp_customize->add_control(
    new Construction_Field_Customize_Category_Dropdown_Control(
        $wp_customize,
        'construction_field_theme_options[construction-field-newsnotice-cat]',
        array(
            'label'		        => esc_html__( 'Select Category News/Notice/Announcement', 'construction-field' ),
            'section'           => 'construction-field-header-top-option',
            'settings'          => 'construction_field_theme_options[construction-field-newsnotice-cat]',
            'type'	  	        => 'category_dropdown',
            'active_callback'   => 'construction_field_is_enable_header_top'
        )
    )
);