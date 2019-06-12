<?php
/**
 * Display default slider
 *
 * @since Construction Field 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('construction_field_default_slider') ) :
    function construction_field_default_slider(){
        global $construction_field_customizer_all_values;
        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        endif; // End header image check.

        $text_align = 'text-left';
        $animation1 = 'init-animate';
        $animation2 = 'init-animate';
        ?>
        <div class="image-slider-wrapper home-fullscreen ">
            <div class="featured-slider">
                <div class="item" style="<?php echo $bg_image_style; ?>">
                    <div class="slider-content <?php echo $text_align;?>">
                        <div class="container">
                            <div class="banner-title <?php echo $animation1;?>">
                                <?php esc_html_e('Construction Field','construction-field' );?>
                            </div>
                            <div class="image-slider-caption <?php echo $animation2;?>">
                                <?php esc_html_e('Building the World Together','construction-field' );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
endif;

function construction_field_slider_from_page(){
	global $construction_field_customizer_all_values;

	$construction_field_slides_data = json_decode( $construction_field_customizer_all_values['construction-field-slides-data'] );
	$construction_field_feature_slider_text_align = $construction_field_customizer_all_values['construction-field-feature-slider-text-align'];

	$construction_field_feature_slider_enable_animation = $construction_field_customizer_all_values['construction-field-feature-slider-enable-animation'];
	$construction_field_feature_slider_image_only = $construction_field_customizer_all_values['construction-field-feature-slider-display-title'];
	$construction_field_feature_slider_image_excerpt = $construction_field_customizer_all_values['construction-field-feature-slider-display-excerpt'];
	$construction_field_fs_image_display_options = $construction_field_customizer_all_values['construction-field-fs-image-display-options'];

	$post_in = array();
	$slides_other_data = array();
	if( is_array( $construction_field_slides_data ) ){
		foreach ( $construction_field_slides_data as $slides_data ){
			if( isset( $slides_data->selectpage ) && !empty( $slides_data->selectpage ) ){
				 $post_in[] = $slides_data->selectpage;
                    $selectpage =  $slides_data->selectpage;
                    if( function_exists('pll_get_post')){
                         $selectpage =  pll_get_post($slides_data->selectpage);
                    }
                 $slides_other_data[$selectpage] = array(
					'button-1-text'  =>$slides_data->button_1_text,
					'button-1-link'  =>$slides_data->button_1_link,
					'button-2-text'  =>$slides_data->button_2_text,
					'button-2-link'  =>$slides_data->button_2_link
				);
			}
		}
	}

	if( !empty( $post_in )) :
		$construction_field_child_page_args = array(
			'post__in'          => $post_in,
			'orderby'           => 'post__in',
			'posts_per_page'    => count( $post_in ),
			'post_type'         => 'page',
			'no_found_rows'     => true,
			'post_status'       => 'publish'
		);
		$slider_query = new WP_Query( $construction_field_child_page_args );
		/*The Loop*/
		if ( $slider_query->have_posts() ):
			?>
            <div class="image-slider-wrapper home-fullscreen <?php echo esc_attr( $construction_field_fs_image_display_options ); ?>">
                <div class="featured-slider">
					<?php
					$slider_index = 1;
					$text_align = '';
					$animation1 = '';
					$animation2 = '';
					$animation3 = '';
					$animation4 = '';

					$bg_image_style = '';
					if( 'alternate' != $construction_field_feature_slider_text_align ){
						$text_align = $construction_field_feature_slider_text_align;
					}
					if( 1 == $construction_field_feature_slider_enable_animation ){
						$animation1 = 'init-animate fadeInDown';
						$animation2 = 'init-animate fadeInDown';
						$animation3 = 'init-animate fadeInDown';
						$animation4 = 'init-animate fadeInDown';
						$animation5 = 'init-animate fadeInDown';
					}
					while( $slider_query->have_posts() ):$slider_query->the_post();

						if( 'alternate' == $construction_field_feature_slider_text_align ){
							if( 1 == $slider_index ){
								$text_align = 'text-left';
							}
                            elseif ( 2 == $slider_index ){
								$text_align = 'text-center';
							}
							else{
								$text_align = 'text-right';
							}
						}
						if (has_post_thumbnail()) {
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						}
						else {
							$image_url[0] = get_template_directory_uri().'/assets/img/default-image.jpg';
						}
						if( 'full-screen-bg' == $construction_field_fs_image_display_options ){
							$bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						}
						$slides_single_data = $slides_other_data[get_the_ID()];
						?>
                        <div class="item" style="<?php echo $bg_image_style; ?>">
							<?php
							if( 'responsive-img' == $construction_field_fs_image_display_options ){
								echo '<img src="'.esc_url( $image_url[0] ).'"/>';
							}
							?>
                            <div class="slider-content <?php echo esc_attr( $text_align );?>">
                                <div class="container">
									<?php
									if( 1 == $construction_field_feature_slider_image_only ){
										?>
                                        <div class="banner-title <?php echo esc_attr( $animation1 );?>"><?php the_title()?></div>
										<?php
									}
									if( 1 == $construction_field_feature_slider_image_excerpt ){
										?>
                                        <div class="image-slider-caption <?php echo esc_attr( $animation2 );?>">
											<?php the_excerpt(); ?>
                                        </div>
										<?php
									}
									if( !empty( $slides_single_data['button-1-text'] ) ){
										?>
                                        <a href="<?php echo esc_url( $slides_single_data['button-1-link'] )?>" class="<?php echo esc_attr( $animation4 );?> btn btn-primary btn-reverse outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-1-text'] ); ?>
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
										<?php
									}
									if( !empty( $slides_single_data['button-2-text'] ) ){
										?>
                                        <a href="<?php echo esc_url( $slides_single_data['button-2-link'] )?>" class="<?php echo esc_attr( $animation5 );?> btn btn-primary outline-outward banner-btn">
											<?php echo esc_html( $slides_single_data['button-2-text'] ); ?>
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
						<?php
						$slider_index ++;
						if( 3 < $slider_index ){
							$slider_index = 1;
						}
					endwhile;
					?>
                </div><!--acme slick carousel-->
				<?php
				$construction_field_feature_info_display_options = $construction_field_customizer_all_values['construction-field-feature-info-display-options'];
				if( 'absolute' == $construction_field_feature_info_display_options ){
					echo "<div class='container primary-bg at-absolute-feature-icon'>";
					do_action( 'construction_field_action_feature_info' );
					echo "</div>";
				}
				?>
            </div><!--.image slider wrapper-->
			<?php
			wp_reset_postdata();
		else:
			construction_field_default_slider();
		endif;
	else:
		construction_field_default_slider();
	endif;
}

/**
 * Featured Slider display
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'construction_field_feature_slider' ) ) :

    function construction_field_feature_slider( ){
	    construction_field_slider_from_page();
    }
endif;
add_action( 'construction_field_action_feature_slider', 'construction_field_feature_slider', 0 );