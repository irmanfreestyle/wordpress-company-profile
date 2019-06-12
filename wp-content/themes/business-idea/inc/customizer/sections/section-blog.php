<?php 
function business_idea_section_blog( $wp_customize ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	
	$wp_customize->add_panel( 'blog_panel', array(
		'priority'       => 51,
		'capability'     => 'edit_theme_options',
		'title'      => __('Section : Blog', 'business-idea'),
		'active_callback' => 'business_idea_showon_frontpage'
	) );	
		$wp_customize->add_section( 'blog_setting' , array(
			'title'      => __('Blog Settings', 'business-idea'),
			'panel'  => 'blog_panel',
		) );			
			$wp_customize->add_setting( 'business_idea_option[business_idea_blog_disable]' , array(
			'default'    => $business_idea_option['business_idea_blog_disable'],
			'sanitize_callback' => 'business_idea_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_blog_disable]' , array(
			'label' => __('Hide Blog Section?','business-idea' ),
			'description' => __('Check this setting to hide blog section from the FrontPage.','business-idea' ),
			'section' => 'blog_setting',
			'type'=>'checkbox',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_blogtitle]' , array(
			'default'    => $business_idea_option['business_idea_blogtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_blogtitle]' , array(
			'label' => __('Blog Title','business-idea' ),
			'description' => __('This setting for blog section title.','business-idea' ),
			'section' => 'blog_setting',
			'type'=>'text',
			) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_blogsubtitle]' , array(
			'default'    => $business_idea_option['business_idea_blogsubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('business_idea_option[business_idea_blogsubtitle]' , array(
			'label' => __('Blog Subtitle','business-idea' ),
			'description' => __('This setting for blog section subtitle.','business-idea' ),
			'section' => 'blog_setting',
			'type'=>'text',
			) );	
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_layout]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $business_idea_option['business_idea_news_layout'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_news_layout]',
				array(
					'label' 		=> esc_html__('Blog Layout Settings', 'business-idea'),
					'section' 		=> 'blog_setting',
					'description'   => '',
					'type'          => 'select',
					'choices'       => array(
						'3' => esc_html__( '4 Columns', 'business-idea' ),
						'4' => esc_html__( '3 Columns', 'business-idea' ),
						'6' => esc_html__( '2 Columns', 'business-idea' ),
						'12' => esc_html__( '1 Column', 'business-idea' ),
					),
				)
			);
		$wp_customize->add_section( 'blog_content' , array(
			'title'      => __('blog Content', 'business-idea'),
			'panel'  => 'blog_panel',
		) );
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_no]',
				array(
					'sanitize_callback' => 'absint',
					'default'           => $business_idea_option['business_idea_news_no'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_news_no]',
				array(
					'label'     	=> esc_html__('Number of post to show', 'business-idea'),
					'section' 		=> 'blog_content',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_cat]',array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $business_idea_option['business_idea_news_cat'],
					'type'=>'option',
				)
			);

			$wp_customize->add_control( new business_idea_Category_Control(
				$wp_customize,'business_idea_option[business_idea_news_cat]',
				array(
					'label' 		=> esc_html__('Category to show', 'business-idea'),
					'section' 		=> 'blog_content',
					'description'   => '',
				)
			));
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_orderby]',
				array(
					'sanitize_callback' => 'business_idea_sanitize_select',
					'default'           => $business_idea_option['business_idea_news_orderby'],
					'type'=>'option',
				)
			);

			$wp_customize->add_control(
				'business_idea_option[business_idea_news_orderby]',
				array(
					'label' 		=> esc_html__('Order By', 'business-idea'),
					'section' 		=> 'blog_content',
					'type'   => 'select',
					'choices' => array(
						'default' => esc_html__('Default', 'business-idea'),
						'id' => esc_html__('ID', 'business-idea'),
						'author' => esc_html__('Author', 'business-idea'),
						'title' => esc_html__('Title', 'business-idea'),
						'date' => esc_html__('Date', 'business-idea'),
						'comment_count' => esc_html__('Comment Count', 'business-idea'),
						'menu_order' => esc_html__('Order by Page Order', 'business-idea'),
						'rand' => esc_html__('Random order', 'business-idea'),
					)
				)
			);
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_order]',
				array(
					'sanitize_callback' => 'business_idea_sanitize_select',
					'default'           => $business_idea_option['business_idea_news_order'],
					'type'=>'option',
				)
			);

			$wp_customize->add_control('business_idea_option[business_idea_news_order]',array(
					'label' 		=> esc_html__('Order', 'business-idea'),
					'section' 		=> 'blog_content',
					'type'   => 'select',
					'choices' => array(
						'desc' => esc_html__('Descending', 'business-idea'),
						'asc' => esc_html__('Ascending', 'business-idea'),
					)
				)
			);
			
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_more_link]',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => $business_idea_option['business_idea_news_more_link'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_news_more_link]',
				array(
					'label'       => esc_html__('More News button link', 'business-idea'),
					'section'     => 'blog_content',
					'description' => esc_html__(  'It should be your blog page link.', 'business-idea' )
				)
			);
			$wp_customize->add_setting( 'business_idea_option[business_idea_news_more_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $business_idea_option['business_idea_news_more_text'],
					'type'=>'option',
				)
			);
			$wp_customize->add_control( 'business_idea_option[business_idea_news_more_text]',
				array(
					'label'     	=> esc_html__('More News Button Text', 'business-idea'),
					'section' 		=> 'blog_content',
					'description'   => '',
				)
			);
			
}
add_action( 'customize_register', 'business_idea_section_blog' );