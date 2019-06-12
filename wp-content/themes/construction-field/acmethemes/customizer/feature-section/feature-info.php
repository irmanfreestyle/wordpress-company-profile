<?php
/*adding sections for feature info options */
$wp_customize->add_section( 'construction-field-feature-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Info', 'construction-field' ),
	'panel'          => 'construction-field-feature-panel'
) );

/* basic info display options*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-info-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-feature-info-display-options'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_feature_info_display_options();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-info-display-options]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Display Options', 'construction-field' ),
	'section'           => 'construction-field-feature-info',
	'settings'          => 'construction_field_theme_options[construction-field-feature-info-display-options]',
	'type'	  	        => 'select',
) );

/* basic info number*/
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-feature-info-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['construction-field-feature-info-number'],
	'sanitize_callback' => 'construction_field_sanitize_select'
) );
$choices = construction_field_feature_info_number();
$wp_customize->add_control( 'construction_field_theme_options[construction-field-feature-info-number]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Number Display', 'construction-field' ),
	'section'           => 'construction-field-feature-info',
	'settings'          => 'construction_field_theme_options[construction-field-feature-info-number]',
	'type'	  	        => 'select',
) );

/*first info*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-first-info-message]',
		array(
			'section'      => 'construction-field-feature-info',
			'description'  => "<hr /><h2>".esc_html__('First Info','construction-field')."</h2>",
			'settings'     => 'construction_field_theme_options[construction-field-first-info-message]',
			'type'	  	   => 'message',
		)
	)
);
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-first-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-first-info-icon'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Construction_Field_Customize_Icons_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-first-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'construction-field' ),
			'section'       => 'construction-field-feature-info',
			'settings'      => 'construction_field_theme_options[construction-field-first-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-first-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-first-info-title'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-first-info-title]', array(
	'label'		            => esc_html__( 'Title', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-first-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-first-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-first-info-desc'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-first-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-first-info-desc]',
	'type'	  	            => 'text'
) );

/*Second Info*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-second-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-second-info-message]',
		array(
			'section'       => 'construction-field-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Second Info','construction-field')."</h2>",
			'settings'      => 'construction_field_theme_options[construction-field-second-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-second-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-second-info-icon'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Construction_Field_Customize_Icons_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-second-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'construction-field' ),
			'section'       => 'construction-field-feature-info',
			'settings'      => 'construction_field_theme_options[construction-field-second-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-second-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-second-info-title'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-second-info-title]', array(
	'label'		            => esc_html__( 'Title', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-second-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-second-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-second-info-desc'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-second-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-second-info-desc]',
	'type'	  	            => 'text'
) );

/*third info*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-third-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-third-info-message]',
		array(
			'section'       => 'construction-field-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Third Info','construction-field')."</h2>",
			'settings'      => 'construction_field_theme_options[construction-field-third-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-third-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-third-info-icon'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Construction_Field_Customize_Icons_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-third-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'construction-field' ),
			'section'       => 'construction-field-feature-info',
			'settings'      => 'construction_field_theme_options[construction-field-third-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-third-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-third-info-title'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-third-info-title]', array(
	'label'		            => esc_html__( 'Title', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-third-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-third-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-third-info-desc'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-third-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-third-info-desc]',
	'type'	  	            => 'text'
) );

/*forth info*/
$wp_customize->add_setting('construction_field_theme_options[construction-field-forth-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Construction_Field_Customize_Message_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-forth-info-message]',
		array(
			'section'       => 'construction-field-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Forth Info','construction-field')."</h2>",
			'settings'      => 'construction_field_theme_options[construction-field-forth-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'construction_field_theme_options[construction-field-forth-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-forth-info-icon'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Construction_Field_Customize_Icons_Control(
		$wp_customize,
		'construction_field_theme_options[construction-field-forth-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'construction-field' ),
			'section'       => 'construction-field-feature-info',
			'settings'      => 'construction_field_theme_options[construction-field-forth-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-forth-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-forth-info-title'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-forth-info-title]', array(
	'label'		            => esc_html__( 'Title', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-forth-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'construction_field_theme_options[construction-field-forth-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['construction-field-forth-info-desc'],
	'sanitize_callback'     => 'construction_field_sanitize_allowed_html'
) );
$wp_customize->add_control( 'construction_field_theme_options[construction-field-forth-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'construction-field' ),
	'section'               => 'construction-field-feature-info',
	'settings'              => 'construction_field_theme_options[construction-field-forth-info-desc]',
	'type'	  	            => 'text'
) );