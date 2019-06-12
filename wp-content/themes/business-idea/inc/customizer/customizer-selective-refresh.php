<?php
function business_idea_customizer_load_template( $template_names ){
    $located = '';

    $is_child =  get_stylesheet_directory() != get_template_directory() ;
    foreach ( (array) $template_names as $template_name ) {
        if (  !$template_name )
            continue;

        if ( $is_child && file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {  // Child them
            $located = get_stylesheet_directory() . '/' . $template_name;
            break;

        }elseif ( file_exists( get_template_directory() . '/' . $template_name) ) { // current_theme
            $located =  get_template_directory() . '/' . $template_name;
            break;
        }
    }
    
    return $located;
}

function business_idea_get_customizer_section_content( $section_tpl, $section = array() ){
    ob_start();
    $GLOBALS['business_idea_is_selective_refresh'] = true;
    $file = business_idea_customizer_load_template( $section_tpl );
    if ( $file ) {
        include $file;
    }
    $content = ob_get_clean();
    return trim( $content );
}

function business_idea_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $selective_refresh_keys = array(
      
        // section services
        array(
            'id' => 'service',
            'selector' => '.service-area .container',
            'settings' => array(
                'business_idea_option[business_idea_servicetitle]',
                'business_idea_option[business_idea_servicesubtitle]',
                'business_idea_option[business_idea_services]',
            ),
        ),
		// section about
        array(
            'id' => 'about',
            'selector' => '.about-area .container',
            'settings' => array(
                'business_idea_option[business_idea_abouttitle]',
                'business_idea_option[business_idea_aboutsubtitle]',
                'business_idea_option[business_idea_about_boxes]',
            ),
        ),
		// section team
        array(
            'id' => 'team',
            'selector' => '.team-area .container',
            'settings' => array(
                'business_idea_option[business_idea_teamtitle]',
                'business_idea_option[business_idea_teamsubtitle]',
                'business_idea_option[business_idea_team]',
            ),
        ),
		// section contact
        array(
            'id' => 'contact',
            'selector' => '.contact-area .container',
            'settings' => array(
                'business_idea_option[business_idea_contacttitle]',
                'business_idea_option[business_idea_contactsubtitle]',
            ),
        ),
		// section blog
        array(
            'id' => 'blog',
            'selector' => '.news-area .container',
            'settings' => array(
                'business_idea_option[business_idea_blogtitle]',
                'business_idea_option[business_idea_blogsubtitle]',
            ),
        ),
		// section social
        array(
            'id' => 'social',
            'selector' => '.social-area .container',
            'settings' => array(
                'business_idea_option[business_idea_socialtitle]',
                'business_idea_option[business_idea_socialsubtitle]',
            ),
        ),

    );

    foreach ( $selective_refresh_keys as $section ) {
        foreach ( $section['settings'] as $key ) {
            if ( $wp_customize->get_setting( $key ) ) {
                $wp_customize->get_setting( $key )->transport = 'postMessage';
            }
        }
		
		 $wp_customize->selective_refresh->add_partial( 'section-'.$section['id'] , array(
            'selector' => $section['selector'],
            'settings' => $section['settings'],
            'render_callback' => 'business_idea_selective_refresh_render_section_content',
        ));
    }

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname' , array(
		'selector' => '.site-title span',
		'settings' => array('blogname'),
		'render_callback' => 'business_idea_blogname',
	));
	$wp_customize->selective_refresh->add_partial( 'blogdescription' , array(
		'selector' => '.site-description',
		'settings' => array('blogdescription'),
		'render_callback' => 'business_idea_blogdescription',
	));

}
add_action( 'customize_register', 'business_idea_customizer_partials', 199 );


function business_idea_selective_refresh_render_section_content( $partial, $container_context = array() ) {
    $tpl = 'home-page/'.$partial->id.'.php';
    $GLOBALS['business_idea_is_selective_refresh'] = true;
    $file = business_idea_customizer_load_template( $tpl );
    if ( $file ) {
        include $file;
    }
}

function business_idea_blogname(){
	bloginfo('name');
}

function business_idea_blogdescription(){
	bloginfo('decription');
}