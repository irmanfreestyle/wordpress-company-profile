<?php
$construction_lite_cat_list = construction_lite_category_list();
$construction_lite_posts_list = construction_lite_posts_List();
$construction_lite_font_size = construction_lite_font_size();
$construction_lite_fonts = construction_lite_fonts();
 
 /** Customizers Panels **/
 $wp_customize->add_panel(
    'construction_lite_general_panel',array(
        'title' => __('General Setting','construction-lite'),
        'priority' => 2,
    )
 );
 $wp_customize->add_panel(
    'construction_lite_header_panel',array(
        'title' => __('Header Setting','construction-lite'),
        'description' => __('All The Header Setting Available Here','construction-lite'),
        'priority' => 2,
    )
 );
 $wp_customize->add_panel(
    'construction_lite_home_panel',
    array(
        'title' => __('Home Setting','construction-lite'),
        'description' => __('All The Setting For Home Sections','construction-lite'),
        'priority' => 3
    )
 );
 $wp_customize->add_panel(
    'construction_lite_typography_panel',
    array(
        'title' => __('Typography Setting','construction-lite'),
        'priority' => 5
    )
 );
 $wp_customize->add_panel(
    'construction_lite_footer_panel',
    array(
        'title' => __('Footer Setting','construction-lite'),
        'priority' => 4
    )
 );
 
 /** Customizer Sections **/
 $wp_customize->add_section(
    'construction_lite_menu_section',
    array(
        'title' => __('Menu Section','construction-lite'),
        'description' => __('All The Settings For Menu','construction-lite'),
        'priority' => 3,
        'panel' => 'construction_lite_header_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_slider_section',
    array(
        'title' => __('Slider Section','construction-lite'),
        'description' => __('All The Settings For Slider','construction-lite'),
        'priority' => 5,
        'panel' => 'construction_lite_header_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_page_section',
    array(
        'title' => __('Inner Page Title Bar Background','construction-lite'),
        'priority' => 6,
        'panel' => 'construction_lite_general_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_about_section',
    array(
        'title' => __('About Us Section','construction-lite'),
        'priority' => 3,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_feature_section',
    array(
        'title' => __('Feature Section','construction-lite'),
        'priority' => 6,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_team_section',
    array(
        'title' => __('Team Section','construction-lite'),
        'priority' => 8,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_portfolio_section',
    array(
        'title' => __('Portfolio Section','construction-lite'),
        'priority' => 10,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_blog_section',
    array(
        'title' => __('Blog Section','construction-lite'),
        'priority' => 12,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_cta_section',
    array(
        'title' => __('Call To Action Section','construction-lite'),
        'priority' => 14,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_shop_section',
    array(
        'title' => __('Shop Section','construction-lite'),
        'priority' => 15,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_testimonial_section',
    array(
        'title' => __('Testimonial Section','construction-lite'),
        'priority' => 16,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_client_section',
    array(
        'title' => __('Client Section','construction-lite'),
        'priority' => 18,
        'panel' => 'construction_lite_home_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_top_footer_section',
    array(
        'title' => __('Top Footer Section','construction-lite'),
        'priority' => 2,
        'panel' => 'construction_lite_footer_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_bottom_footer_section',
    array(
        'title' => __('Bottom Footer Section','construction-lite'),
        'priority' => 4,
        'panel' => 'construction_lite_footer_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_body_typography_section',
    array(
        'title' => __('Body','construction-lite'),
        'priority' => 4,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h1_typography_section',
    array(
        'title' => __('Heading 1','construction-lite'),
        'priority' => 5,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h2_typography_section',
    array(
        'title' => __('Heading 2','construction-lite'),
        'priority' => 6,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h3_typography_section',
    array(
        'title' => __('Heading 3','construction-lite'),
        'priority' => 7,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h4_typography_section',
    array(
        'title' => __('Heading 4','construction-lite'),
        'priority' => 8,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h5_typography_section',
    array(
        'title' => __('Heading 5','construction-lite'),
        'priority' => 9,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
 $wp_customize->add_section(
    'construction_lite_h6_typography_section',
    array(
        'title' => __('Heading 6','construction-lite'),
        'priority' => 10,
        'panel' => 'construction_lite_typography_panel',
        'capability' => 'edit_theme_options',
    )
 );
  $wp_customize->add_section(
    'construction_lite_skin_color_section',
    array(
        'title' => __('Template Color','construction-lite'),
        'priority' => 10,
        'panel' => 'construction_lite_general_panel',
        'capability' => 'edit_theme_options',
    )
 );
 /** Customizer Settings And Control **/
 $wp_customize->add_setting(
    'construction_lite_search_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_search_enable',
    array(
        'label' => __('Check Enable Search On Menu','construction-lite'),
        'priority' => 2,
        'type' => 'checkbox',
        'section' => 'construction_lite_menu_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cart_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cart_enable',
    array(
        'label' => __('Check Enable Cart On Menu (Only works if WooCommerce plugin is activated.)','construction-lite'),
        'priority' => 4,
        'type' => 'checkbox',
        'section' => 'construction_lite_menu_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_slider_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_slider_enable',
    array(
        'label' => __('Check Enable Slider','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_slider_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_slider_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list',
    )
 );
 $wp_customize->add_control(
    'construction_lite_slider_cat',
    array(
        'label' => __('Slider Category','construction-lite'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_slider_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_page_bg_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'construction_lite_page_bg_image',
           array(
               'label'      => __( 'Inner Page Title Bar Background Image', 'construction-lite' ),
               'section'    => 'construction_lite_page_section',
               'settings'   => 'construction_lite_page_bg_image',
               'priority' => 10,
           )
       )
   );
 $wp_customize->add_setting(
    'construction_lite_about_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_about_enable',
    array(
        'label' => __('Enable About US','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_about_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_about_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'=>'postMessage',
    )
 );
 $wp_customize->add_control(
    'construction_lite_about_title',
    array(
        'label' => __('About Us Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_about_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_about_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_about_sub_title',
    array(
        'label' => __('About Us Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_about_section'
    )
 );
  $wp_customize->add_setting(
    'construction_lite_about_post',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_select',
    )
  );
  $wp_customize->add_control(
    'construction_lite_about_post',
    array(
        'label' => __('About Us Post','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_posts_list,
        'section' => 'construction_lite_about_section',
        'priority' => 10
    )
  );
 $wp_customize->add_setting(
    'construction_lite_disable_feature_image_frame',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_disable_feature_image_frame',
    array(
        'label' => __('Disable Feature Image Frame','construction-lite'),
        'type' => 'checkbox',
        'priority' => 12,
        'section' => 'construction_lite_about_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_feature_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_feature_enable',
    array(
        'label' => __('Enable Feature Section','construction-lite'),
        'type' => 'checkbox',
        'priority' => '2',
        'section' => 'construction_lite_feature_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_feature_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_feature_title',
    array(
        'label' => __('Feature Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_feature_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_feature_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_feature_sub_title',
    array(
        'label' => __('Feature Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_feature_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_feature_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list'
    )
 );
 $wp_customize->add_control(
    'construction_lite_feature_cat',
    array(
        'label' => __('Feature Post Category','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_feature_section',
        'priority' => 8,
    )
 );
 $wp_customize->add_setting(
    'construction_lite_feature_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'construction_lite_feature_image',
           array(
               'label'      => __( 'Feature Section Image', 'construction-lite' ),
               'section'    => 'construction_lite_feature_section',
               'settings'   => 'construction_lite_feature_image',
               'priority' => 10,
           )
       )
   );
 $wp_customize->add_setting(
    'construction_lite_team_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_team_enable',
    array(
        'label' => __('Enable Team','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_team_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_team_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_team_title',
    array(
        'label' => __('Team Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_team_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_team_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_team_sub_title',
    array(
        'label' => __('Team Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_team_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_portfolio_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_portfolio_enable',
    array(
        'label' => __('Enable Portfolio','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_portfolio_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_portfolio_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_portfolio_title',
    array(
        'label' => __('Portfolio Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_portfolio_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_portfolio_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_portfolio_sub_title',
    array(
        'label' => __('Portfolio Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_portfolio_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_portfolio_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list'
    )
 );
 $wp_customize->add_control(
    'construction_lite_portfolio_cat',
    array(
        'label' => __('Portfolio Post Category','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_portfolio_section',
        'priority' => 8,
    )
 );
  $wp_customize->add_setting(
    'construction_lite_blog_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_blog_enable',
    array(
        'label' => __('Enable Bolog Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_blog_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_blog_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_blog_title',
    array(
        'label' => __('Blog Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_blog_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_blog_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_blog_sub_title',
    array(
        'label' => __('Blog Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_blog_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_blog_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list'
    )
 );
 $wp_customize->add_control(
    'construction_lite_blog_cat',
    array(
        'label' => __('Blog Post Category','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_blog_section',
        'priority' => 8,
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cta_enable',
    array(
        'label' => __('Enable Call To Action Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_cta_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cta_title',
    array(
        'label' => __('Call To Action Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_cta_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_section_description',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'construction_lite_sanitize_textarea'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cta_section_description',
    array(
        'label' => __('Call To Action Section Description','construction-lite'),
        'type' => 'textarea',
        'priority' => 6,
        'section' => 'construction_lite_cta_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_button_text',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cta_button_text',
    array(
        'label' => __('Call To Action Button Text','construction-lite'),
        'type' => 'text',
        'priority' => 8,
        'section' => 'construction_lite_cta_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_button_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_cta_button_link',
    array(
        'label' => __('Call To Action Button Link','construction-lite'),
        'type' => 'text',
        'priority' =>10,
        'section' => 'construction_lite_cta_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_cta_bg_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'construction_lite_cta_bg_image',
           array(
               'label'      => __( 'Section Background Image', 'construction-lite' ),
               'section'    => 'construction_lite_cta_section',
               'settings'   => 'construction_lite_cta_bg_image',
               'priority' => 15,
           )
       )
   );
 $wp_customize->add_setting(
    'construction_lite_shop_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_shop_enable',
    array(
        'label' => __('Enable Shop Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_shop_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_shop_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_shop_title',
    array(
        'label' => __('Shop Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_shop_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_shop_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_shop_sub_title',
    array(
        'label' => __('Shop Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_shop_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_testimonial_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_testimonial_enable',
    array(
        'label' => __('Enable Testimonial Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_testimonial_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_testimonial_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_testimonial_title',
    array(
        'label' => __('Testimonial Section Title','construction-lite'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'construction_lite_testimonial_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_testimonial_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'construction_lite_testimonial_sub_title',
    array(
        'label' => __('Testimonial Section Sub Title','construction-lite'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'construction_lite_testimonial_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_testimonial_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list'
    )
 );
 $wp_customize->add_control(
    'construction_lite_testimonial_cat',
    array(
        'label' => __('Testimonial Post Category','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_testimonial_section',
        'priority' => 8,
    )
 );
  $wp_customize->add_setting(
    'construction_lite_client_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_client_enable',
    array(
        'label' => __('Enable Client Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_client_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_client_cat',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_post_cat_list'
    )
 );
 $wp_customize->add_control(
    'construction_lite_client_cat',
    array(
        'label' => __('Client Post Category','construction-lite'),
        'type' => 'select',
        'choices' => $construction_lite_cat_list,
        'section' => 'construction_lite_client_section',
        'priority' => 4,
    )
 );
 $wp_customize->add_setting(
    'construction_lite_top_footer_enable',
    array(
        'default' => '',
        'sanitize_callback' => 'construction_lite_sanitize_checkbox'
    )
 );
 $wp_customize->add_control(
    'construction_lite_top_footer_enable',
    array(
        'label' => __('Enable Top Footer Section','construction-lite'),
        'priority' => 1,
        'type' => 'checkbox',
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_top_footer_logo',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'construction_lite_top_footer_logo',
           array(
               'label'      => __( 'Top Footer Logo', 'construction-lite' ),
               'section'    => 'construction_lite_top_footer_section',
               'settings'   => 'construction_lite_top_footer_logo',
               'priority' => 4,
           )
       )
   );
 $wp_customize->add_setting(
    'construction_lite_top_footer_description',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'construction_lite_sanitize_textarea'
    )
 );
 $wp_customize->add_control(
    'construction_lite_top_footer_description',
    array(
        'label' => __('Top Footer Description','construction-lite'),
        'type' => 'textarea',
        'priority' => 6,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 
 $wp_customize->add_setting(
    'construction_lite_facebook_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_facebook_link',
    array(
        'label' => __('Facebook Link','construction-lite'),
        'type' => 'text',
        'priority' => 8,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_twitter_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_twitter_link',
    array(
        'label' => __('Twitter Link','construction-lite'),
        'type' => 'text',
        'priority' => 10,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_youtube_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_youtube_link',
    array(
        'label' => __('Youtube Link','construction-lite'),
        'type' => 'text',
        'priority' => 12,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_pinterest_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_pinterest_link',
    array(
        'label' => __('Pinterest Link','construction-lite'),
        'type' => 'text',
        'priority' => 14,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_instagram_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_instagram_link',
    array(
        'label' => __('Instagram Link','construction-lite'),
        'type' => 'text',
        'priority' => 16,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_linkedin_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_linkedin_link',
    array(
        'label' => __('Linkedin Link','construction-lite'),
        'type' => 'text',
        'priority' => 18,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_googleplus_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_googleplus_link',
    array(
        'label' => __('GooglePlus Link','construction-lite'),
        'type' => 'text',
        'priority' => 20,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_flickr_link',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
 );
 $wp_customize->add_control(
    'construction_lite_flickr_link',
    array(
        'label' => __('Flickr Link','construction-lite'),
        'type' => 'text',
        'priority' => 22,
        'section' => 'construction_lite_top_footer_section'
    )
 );
 $wp_customize->add_setting(
    'construction_lite_footer_text',
    array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post'
    )
 );
 $wp_customize->add_control(
    'construction_lite_footer_text',
    array(
        'label' => __('Footer Text','construction-lite'),
        'type' => 'textarea',
        'priority' => 4,
        'section' => 'construction_lite_bottom_footer_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_body_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
 $wp_customize->add_control(
    'construction_lite_body_font_size',
    array(
        'label' => __('Body Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_body_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h1_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h1_font_size',
    array(
        'label' => __('Heading 1 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h1_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h2_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h2_font_size',
    array(
        'label' => __('Heading 2 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h2_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h3_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h3_font_size',
    array(
        'label' => __('Heading 3 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h3_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h4_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h4_font_size',
    array(
        'label' => __('Heading 4 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h4_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h5_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h5_font_size',
    array(
        'label' => __('Heading 5 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h5_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h6_font_size',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'construction_lite_sanitize_font_size'
    )
);
$wp_customize->add_control(
    'construction_lite_h6_font_size',
    array(
        'label' => __('Heading 6 Font Size','construction-lite'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $construction_lite_font_size,
        'section' => 'construction_lite_h6_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_body_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_body_font',
    array(
        'label' => __('Body Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_body_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h1_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h1_font',
    array(
        'label' => __('Heading 1 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h1_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h2_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h2_font',
    array(
        'label' => __('Heading 2 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h2_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h3_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h3_font',
    array(
        'label' => __('Heading 3 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h3_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h4_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h4_font',
    array(
        'label' => __('Heading 4 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h4_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h5_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h5_font',
    array(
        'label' => __('Heading 5 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h5_typography_section'
    )
 );
$wp_customize->add_setting(
    'construction_lite_h6_font',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback'=>'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'construction_lite_h6_font',
    array(
        'label' => __('Heading 6 Font','construction-lite'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $construction_lite_fonts,
        'section' => 'construction_lite_h6_typography_section'
    )
 );
 
 /** Dynamic Color Options **/
$wp_customize->add_setting( 'construction_lite_skin_color', array( 'default' => '#FEA100', 'sanitize_callback' => 'sanitize_hex_color' ));

$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'construction_lite_skin_color', 
    array(
        'label'      => esc_html__( 'Template Color', 'construction-lite' ),
        'section'    => 'construction_lite_skin_color_section',
        'settings'   => 'construction_lite_skin_color',
    ) ) 
);