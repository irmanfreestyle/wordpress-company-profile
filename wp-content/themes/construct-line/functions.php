<?php 
/* Enqueue style file. */
add_action( 'wp_enqueue_scripts' , 'construct_line_script', 99);
function construct_line_script() {
  $parent_style = 'parent-style';
  wp_enqueue_style( 'construct-line-style', get_stylesheet_directory_uri(). '/style.css', $parent_style  );
}

/* Overriding custom theme color scheme of parent theme. */
add_filter('business_idea_default_data','construct_line_default_data', 999 );
function construct_line_default_data( $themedata ){
	$themedata['theme_color'] = '#F7B901';
	$themedata['business_idea_gallery_disable'] = false;
	$themedata['business_idea_gallerytitle'] = sprintf(__('Gallery','construct-line'));
	$themedata['business_idea_gallerysubtitle'] = '';
	$themedata['business_idea_gallery_pageid'] = '';
	$themedata['business_idea_gallery_column'] = 4;
	$themedata['business_idea_gallery_bgcolor'] = '#ffffff';
	$themedata['business_idea_gallery_bgimage'] = '';
	return $themedata;
}


/* Overriding custom header function of parent theme function. This kind we are use use "business_idea" prefix for this function in below. */
if( !function_exists('construct_line_setup') ){
	function construct_line_setup(){
		
		$args = array(
			'width'        => 1600,
			'flex-width'   => true,
			'default-image' => get_stylesheet_directory_uri() . '/images/sub-header.jpg',
			// Header text
			'header-text'   => false,
		);
		add_theme_support( 'custom-header', $args );
		
		add_theme_support( 'recommend-plugins', array(
			'webdzier-companion' => array(
                'name' => esc_html__( 'Webdzier Companion', 'construct-line' ),
                'desc' => esc_html__( 'We highly recommend that you install the webdzier companion plugin to gain access to the team and testimonial sections.', 'construct-line' ),
                'active_filename' => 'webdzier-companion/webdzier-companion.php',
            ),
            'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'construct-line' ),
				'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on Front Page contact section and Contact custom page template.', 'construct-line' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
            ),
        ) );
	}
}
add_action( 'after_setup_theme', 'construct_line_setup' );


/*
 * Sidebar for contact page
 * 
 * Contact page sidebar register
 * 
 * @Since 1.4
 */
add_action('widgets_init','construct_line_sidebars',10);
 function construct_line_sidebars(){    
    register_sidebar( array(
    'name' => __( 'Contact Page Template Sidebar', 'construct-line' ),
    'id' => 'sidebar-contact',
    'description' => __( 'Contact Page Template widget area', 'construct-line' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    ) );
 }

/*
 * Generate New Gallery
 * 
 * Creating home page gallery
 * 
 * @Since 1.3
 */
function construct_line_gallery_generate( $echo = true ){
	
	$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
    $div = '';

    $data = construct_line_get_section_gallery_data();
    $display_type = get_theme_mod( 'construct_line_gallery_display', 'grid' );
    $lightbox = get_theme_mod( 'construct_line_g_lightbox', 1 );
    $class = '';
    if ( $lightbox ) {
        $class = ' enable-lightbox ';
    }
    $col = absint( $option['business_idea_gallery_column'] );
    if ( $col <= 0 ) {
        $col = 4;
    }
    switch( $display_type ) {
        case 'masonry':
            $html = construct_line_gallery_html( $data );
            if ( $html ) {
                $div .= '<div data-col="'.$col.'" class="g-zoom-in gallery-masonry '.$class.' gallery-grid g-col-'.$col.'">';
                $div .= $html;
                $div .= '</div>';
            }
            break;
        case 'carousel':
            $html = construct_line_gallery_html( $data );
            if ( $html ) {
                $div .= '<div data-col="'.$col.'" class="g-zoom-in gallery-carousel owl-theme owl-carousel owl-carousel'.$class.'">';
                $div .= $html;
                $div .= '</div>';
            }
            break;
        case 'slider':
            $html = construct_line_gallery_html( $data , true , 'full' );
            if ( $html ) {
                $div .= '<div class="gallery-slider owl-theme owl-carousel owl-carousel'.$class.'">';
                $div .= $html;
                $div .= '</div>';
            }
            break;
        case 'justified':
            $html = construct_line_gallery_html( $data, false );
            if ( $html ) {
                $gallery_spacing = absint( get_theme_mod( 'construct_line_g_spacing', 20 ) );
                $row_height = absint( get_theme_mod( 'construct_line_g_row_height', 120 ) );
                $div .= '<div data-row-height="'.$row_height.'" data-spacing="'.$gallery_spacing.'" class="g-zoom-in gallery-justified'.$class.'">';
                $div .= $html;
                $div .= '</div>';
            }
            break;
        default: // grid
            $html = construct_line_gallery_html( $data );
            if ( $html ) {
                $div .= '<div class="gallery-grid g-zoom-in '.$class.' g-col-'.$col .'">';
                $div .= $html;
                $div .= '</div>';
            }
            break;
    }

    if ( $echo ) {
       echo wp_kses_post( $div );
    } else {
        return wp_kses_post( $div );
    }

}

function construct_line_gallery_html( $data, $inner = true, $size = 'thumbnail' ) {
    $max_item = get_theme_mod( 'construct_line_g_number', 10 );
    $html = '';
    if ( ! is_array( $data ) ) {
        return $html;
    }
    $n = count( $data );
    if ( $max_item > $n ) {
        $max_item =  $n;
    }
    $i = 0;
    while( $i < $max_item ){
        $photo = current( $data );
        $i ++ ;
        if ( $size == 'full' ) {
            $thumb = $photo['full'];
        } else {
            $thumb = $photo['thumbnail'];
        }

        $html .= '<a href="'.esc_attr( $photo['full'] ).'" class="g-item" title="'.esc_attr( wp_strip_all_tags( $photo['title'] ) ).'">';
        if ( $inner ) {
            $html .= '<span class="inner">';
                $html .= '<span class="inner-content">';
                $html .= '<img src="'.esc_url( $thumb ).'" alt="">';
                $html .= '</span>';
            $html .= '</span>';
        } else {
            $html .= '<img src="'.esc_url( $thumb ).'" alt="">';
        }

        $html .= '</a>';

        next( $data );
    }
    reset( $data );

    return wp_kses_post( $html );
}


if ( ! function_exists( 'construct_line_get_section_gallery_data' ) ) {
    function construct_line_get_section_gallery_data()
    {
		
		$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );

        $source = 'page';
        if( has_filter( 'construct_line_get_section_gallery_data' ) ) {
            $data =  apply_filters( 'construct_line_get_section_gallery_data', false );
            return $data;
        }

        $data = array();

        switch ( $source ) {
            default:
                $page_id = intval( $option['business_idea_gallery_pageid'] );
				
                $images = '';
                if ( $page_id ) {
                    $gallery = get_post_gallery( $page_id , false );
                    if ( $gallery ) {
                        $images = $gallery['ids'];
                    }
                }

                $display_type = get_theme_mod( 'construct_line_gallery_display', 'grid' );
                if ( $display_type == 'masonry' || $display_type == ' justified' ) {
                    $size = 'large';
                } else {
                    $size = 'construct-line-small';
                }

                $image_thumb_size = apply_filters( 'construct_line_gallery_page_img_size', $size );

                if ( ! empty( $images ) ) {
                    $images = explode( ',', $images );
                    foreach ( $images as $post_id ) {
                        $post = get_post( $post_id );
                        if ( $post ) {
                            $img_thumb = wp_get_attachment_image_src($post_id, $image_thumb_size );
                            if ($img_thumb) {
                                $img_thumb = $img_thumb[0];
                            }

                            $img_full = wp_get_attachment_image_src( $post_id, 'full' );
                            if ($img_full) {
                                $img_full = $img_full[0];
                            }

                            if ( $img_thumb && $img_full ) {
                                $data[ $post_id ] = array(
                                    'id'        => $post_id,
                                    'thumbnail' => $img_thumb,
                                    'full'      => $img_full,
                                    'title'     => $post->post_title,
                                    'content'   => $post->post_content,
                                );
                            }
                        }
                    }
                }
            break;
        }

        return $data;

    }
}

include_once( get_stylesheet_directory() . '/inc/customizer/customizer.php' );