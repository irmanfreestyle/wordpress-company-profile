<?php
/**
 * Class for adding Service Section Widget
 *
 * @package Acme Themes
 * @subpackage Construction Field
 * @since 1.0.0
 */
if ( ! class_exists( 'Construction_Field_Service' ) ) {

	class Construction_Field_Service extends WP_Widget {
		/*defaults values for fields*/
		private $defaults = array(
			'unique_id'             => '',
			'title'                 => '',
			'bg_image'          => '',
			'at_all_page_items'     => '',
			'background_options'    => 'default',
		);

		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'construction_field_service',
				/*Widget name will appear in UI*/
				esc_html__( 'AT Service Section', 'construction-field' ),
				/*Widget description*/
				array(
					'description' => esc_html__( 'Show Section with beautiful Icons.', 'construction-field' )
				)
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance           = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id          = esc_attr( $instance['unique_id'] );
			$title              = esc_attr( $instance['title'] );
			$bg_image           = esc_url( $instance[ 'bg_image' ] );
			$at_all_page_items  = $instance['at_all_page_items'];
			$background_options = esc_attr( $instance['background_options'] );
			?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>"/>
                <br/>
                <small><?php esc_html_e( 'Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.', 'construction-field' ) ?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('bg_image'); ?>">
					<?php esc_html_e( 'Select Background Image', 'construction-field' ); ?>
                </label>
				<?php
				$construction_field_display_none = '';
				if ( empty( $bg_image ) ){
					$construction_field_display_none = ' style="display:none;" ';
				}
				?>
                <span class="img-preview-wrap" <?php echo  $construction_field_display_none ; ?>>
                    <img class="widefat" src="<?php echo esc_url( $bg_image ); ?>" alt="<?php esc_attr_e( 'Image preview', 'construction-field' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('bg_image'); ?>" id="<?php echo $this->get_field_id('bg_image'); ?>" value="<?php echo esc_url( $bg_image ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Upload Image', 'construction-field' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Background Image','construction-field'); ?>" data-button="<?php esc_attr_e( 'Select Background Image','construction-field'); ?>"/>
                <input type="button" value="<?php esc_attr_e( 'Remove Image', 'construction-field' ); ?>" class="button media-image-remove" />
            </p>
            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'construction-field' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Icon and Excerpt on selected pages.', 'construction-field' ); ?></small>
            <div class="at-repeater">
				<?php
				$total_repeater = 0;
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0  ){
					foreach ($at_all_page_items as $service){
						$repeater_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
						$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
						?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Select Item', 'construction-field' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>
								<?php
								/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
								$args = array(
									'selected'          => $service['page_id'],
									'name'              => $repeater_name,
									'id'                => $repeater_id,
									'class'             => 'widefat at-select',
									'show_option_none'  => esc_html__( 'Select Page', 'construction-field'),
									'option_none_value' => 0 // string
								);
								wp_dropdown_pages( $args );
								?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','construction-field');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','construction-field');?></button>
									<?php
									if( get_edit_post_link( $service['page_id'] ) ){
										?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $service['page_id'] ) ); ?>">
											<?php esc_html_e('Full Edit','construction-field');?>
                                        </a>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
						<?php
						$total_repeater = $total_repeater + 1;
					}
				}
				$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
				$repeater_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
				$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
				?>
                <script type="text/html" class="at-code-for-repeater">
                    <div class="repeater-table">
                        <div class="at-repeater-top">
                            <div class="at-repeater-title-action">
                                <button type="button" class="at-repeater-action">
                                    <span class="at-toggle-indicator" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="at-repeater-title">
                                <h3><?php esc_html_e( 'Select Item', 'construction-field' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>
							<?php
							/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
							$args = array(
								'selected'         => '',
								'name'             => $repeater_name,
								'id'               => $repeater_id,
								'class'            => 'widefat at-select',
								'show_option_none' => esc_html__( 'Select Page', 'construction-field'),
								'option_none_value'=> 0 // string
							);
							wp_dropdown_pages( $args );
							?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','construction-field');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','construction-field');?></button>
                            </div>
                        </div>
                    </div>
                </script>
				<?php
				/*most imp for repeater*/
				echo '<input class="at-total-repeater" type="hidden" value="'.$total_repeater.'">';
				$add_field = esc_html__('Add Item', 'construction-field');
				echo '<span class="button-primary at-add-repeater" id="'.esc_attr( $coder_repeater_depth ).'">'.$add_field.'</span><br/>';
				?>
            </div>
            <!--updated code-->

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'construction-field' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
					<?php
					$construction_field_background_options = construction_field_background_options();
					foreach ( $construction_field_background_options as $key => $value ) {
						?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_attr( $value ); ?></option>
						<?php
					}
					?>
                </select>
            </p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 *
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                  = $old_instance;
			$instance['unique_id']     = sanitize_key( $new_instance['unique_id'] );
			$instance['title']         = sanitize_text_field( $new_instance['title'] );
			$instance['bg_image']       = ( isset( $new_instance['bg_image'] ) ) ?  esc_url_raw( $new_instance['bg_image'] ): '';

			/*updated code*/
			$page_ids = array();
			if( isset($new_instance['at_all_page_items'] )){
				$at_all_page_items    = $new_instance['at_all_page_items'];
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
					foreach ($at_all_page_items as $key=>$service ){
						$page_ids[$key]['page_id'] = construction_field_sanitize_page( $service['page_id'] );
					}
				}
			}
			$instance['at_all_page_items']  = $page_ids;

			$construction_field_widget_background_options   = construction_field_background_options();
			$instance['background_options']       = construction_field_sanitize_choice_options( $new_instance['background_options'], $construction_field_widget_background_options, 'default' );

			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id              = ! empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
			$title                  = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$at_all_page_items      = $instance['at_all_page_items'];

			$bg_image               = esc_url( $instance['bg_image'] );

			$background_options     = esc_attr( $instance['background_options'] );
			$bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

			$div_attr = 'class="row featured-entries-col featured-entries-logo"';
			echo $args['before_widget'];
			?>
            <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-services <?php echo $bg_gray_class;?>">
                <div class="container">
					<?php
					if( ! empty( $title ) ){
						echo "<div class='at-widget-title-wrapper'>";
						echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
						echo "</div>";
					}
					?>
                    <div <?php echo $div_attr;?>>
						<?php
						$post_in = array();
						if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
							foreach ( $at_all_page_items as $service ){
								if( isset( $service['page_id'] ) && !empty( $service['page_id'] ) ){
									$post_in[] = $service['page_id'];
								}
							}
						}
						if( !empty( $post_in )) :
							$construction_field_post_in_page_args = array(
								'post__in'          => $post_in,
								'orderby'           => 'post__in',
								'posts_per_page'    => count( $post_in ),
								'post_type'         => 'page',
								'no_found_rows'     => true,
								'post_status'       => 'publish'
							);
							$service_query = new WP_Query( $construction_field_post_in_page_args );

							/*The Loop*/
							if ( $service_query->have_posts() ):
								$unique_col = 'col-md-6';
								if( !empty( $bg_image ) ){
							        $unique_col = 'col-md-4';
								}
							?>
                            <div class="<?php echo esc_attr( $unique_col );?>">
                                <?php
                                $left_index = 1;
                                while ( $service_query->have_posts() ):$service_query->the_post();
									if( $left_index % 2 != 1 ){
										$left_index ++;
										continue;
									}
									$construction_field_list_classes = 'single-list ';

									$animation1 = "init-animate zoomIn";
									?>
                                    <div class="<?php echo esc_attr( $construction_field_list_classes ); ?> column">
                                        <div class="single-item left-wrapper <?php echo esc_attr( $animation1 ); ?>">
                                            <div class="single-service-content">
                                                <h3 class="title">
                                                    <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
		                                                <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                                <div class="content">
                                                    <div class="details">
	                                                    <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="icon clearfix">
	                                            <?php
	                                            $construction_field_icon = get_post_meta( get_the_ID(), 'construction-field-featured-icon', true );
	                                            $construction_field_icon = isset( $construction_field_icon ) ? esc_attr( $construction_field_icon ) : '';

	                                            if ( ! empty ( $construction_field_icon ) ) { ?>
                                                    <a href="<?php the_permalink() ?>" class="all-link">
                                                        <i class="fa <?php echo esc_attr( $construction_field_icon ); ?>"></i>
                                                    </a>
		                                            <?php
	                                            }
	                                            else {
		                                            echo '<a href="' . esc_url( get_the_permalink() ) . '"><i class="fa fa-suitcase"></i></a>';
	                                            }
	                                            ?>
                                            </div>
                                        </div>
                                    </div>
									<?php
									$left_index ++;
								endwhile;
								?>
                            </div>
                            <?php
                            if( !empty( $bg_image ) ){
                                ?>
                                <div class="<?php echo esc_attr( $unique_col );?>">
                                    <div class="featured-image-wrap">
                                        <img src="<?php echo $bg_image;?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="<?php echo esc_attr( $unique_col );?>">
                                <?php
                                $right_index = 1;
                                while ( $service_query->have_posts() ):$service_query->the_post();
                                    if( $right_index % 2 == 1 ){
                                        $right_index ++;
                                        continue;
                                    }
                                    $construction_field_list_classes = 'single-list ';
                                    $animation1 = "init-animate zoomIn";
                                    ?>
                                    <div class="<?php echo esc_attr( $construction_field_list_classes ); ?> column">
                                        <div class="single-item right-wrapper  <?php echo esc_attr( $animation1 ); ?>">
                                            <div class="single-service-content">
                                                <h3 class="title">
                                                    <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
		                                                <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                                <div class="content">
                                                    <div class="details">
			                                            <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="icon clearfix">
	                                            <?php
	                                            $construction_field_icon = get_post_meta( get_the_ID(), 'construction-field-featured-icon', true );
	                                            $construction_field_icon = isset( $construction_field_icon ) ? esc_attr( $construction_field_icon ) : '';

	                                            if ( ! empty ( $construction_field_icon ) ) { ?>
                                                    <a href="<?php the_permalink() ?>" class="all-link">
                                                        <i class="fa <?php echo esc_attr( $construction_field_icon ); ?>"></i>
                                                    </a>
		                                            <?php
	                                            }
	                                            else {
		                                            echo '<a href="' . esc_url( get_the_permalink() ) . '"><i class="fa fa-suitcase"></i></a>';
	                                            }
	                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $right_index ++;
                                endwhile;
                                ?>
                            </div>
							<?php
							endif;
							wp_reset_postdata();
						endif;
						?>
                    </div><!--row-->
                </div><!--cointainer-->
            </section>
			<?php
			echo $args['after_widget'];
		}
	} // Class Construction_Field_Service ends here
}