<?php
/**
 * Class for adding Social Section Widget
 *
 * @package Acme Themes
 * @subpackage Construction Field
 * @since 1.0.0
 */
if ( ! class_exists( 'Construction_Field_Feature' ) ) {

	class Construction_Field_Feature extends WP_Widget {
		/*defaults values for fields*/

		private function defaults(){
			/*defaults values for fields*/
			$defaults = array(
				'unique_id'         => '',
				'title'             => '',
				'bg_image'          => '',
				'feature_title'     => '',
				'button_one_text'   => esc_html__( 'Book Now', 'construction-field' ),
				'button_one_url'    => '',
				'button_two_text'   => esc_html__( 'Learn More', 'construction-field' ),
				'button_two_url'    => ''
			);
			return $defaults;
		}

		function __construct() {
			parent::__construct(
			        /*Base ID of your widget*/
			        'construction_field_feature',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Feature Section', 'construction-field'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Feature Section.', 'construction-field' )
                    )
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance           = wp_parse_args( (array) $instance, $this->defaults() );
			/*default values*/
			$unique_id          = esc_attr( $instance[ 'unique_id' ] );
			$title              = esc_attr( $instance[ 'title' ] );
			$bg_image           = esc_url( $instance[ 'bg_image' ] );
			$feature_title        = esc_attr( $instance[ 'feature_title' ] );
			$button_one_text    = esc_attr( $instance[ 'button_one_text' ] );
			$button_one_url     = esc_url( $instance[ 'button_one_url' ] );
			$button_two_text    = esc_attr( $instance[ 'button_two_text' ] );
			$button_two_url     = esc_url( $instance[ 'button_two_url' ] );
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'construction-field' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
				<br />
				<small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','construction-field')?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'construction-field' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
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
            <p>
                <label for="<?php echo $this->get_field_id( 'feature_title' ); ?>"><?php esc_html_e( 'Feature Title', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'feature_title' ); ?>" name="<?php echo $this->get_field_name( 'feature_title' ); ?>" type="text" value="<?php echo $feature_title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_one_text' ); ?>"><?php esc_html_e( 'Extra Button Text', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_one_text' ); ?>" name="<?php echo $this->get_field_name( 'button_one_text' ); ?>" type="text" value="<?php echo $button_one_text; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_one_url' ); ?>"><?php esc_html_e( 'Button Link Url', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_one_url' ); ?>" name="<?php echo $this->get_field_name( 'button_one_url' ); ?>" type="text" value="<?php echo $button_one_url; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_two_text' ); ?>"><?php esc_html_e( 'Extra Button Text', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_two_text' ); ?>" name="<?php echo $this->get_field_name( 'button_two_text' ); ?>" type="text" value="<?php echo $button_two_text; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_two_url' ); ?>"><?php esc_html_e( 'Button Link Url', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_two_url' ); ?>" name="<?php echo $this->get_field_name( 'button_two_url' ); ?>" type="text" value="<?php echo $button_two_url; ?>" />
            </p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance[ 'unique_id' ]            = sanitize_key( $new_instance[ 'unique_id' ] );
			$instance[ 'title' ]                = sanitize_text_field( $new_instance[ 'title' ] );
			$instance['bg_image']       = ( isset( $new_instance['bg_image'] ) ) ?  esc_url_raw( $new_instance['bg_image'] ): '';
			$instance[ 'feature_title' ]          = sanitize_text_field( $new_instance[ 'feature_title' ] );

			$instance[ 'button_one_text' ]      = sanitize_text_field( $new_instance[ 'button_one_text' ] );
			$instance[ 'button_one_url' ]       = esc_url_raw( $new_instance[ 'button_one_url' ] );
			$instance[ 'button_two_text' ]      = sanitize_text_field( $new_instance[ 'button_two_text' ] );
			$instance[ 'button_two_url' ]       = esc_url_raw( $new_instance[ 'button_two_url' ] );
			
			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 * @return void
		 *
		 */
		public function widget($args, $instance) {
			$instance               = wp_parse_args( (array) $instance, $this->defaults());

			/*default values*/
			$unique_id              = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
			$title                  = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$bg_image               = esc_url( $instance['bg_image'] );
			$feature_title            = esc_html( $instance[ 'feature_title' ] );
			$button_one_text        = esc_html( $instance[ 'button_one_text' ] );
			$button_one_url         = esc_url( $instance[ 'button_one_url' ] );
			$button_two_text        = esc_html( $instance[ 'button_two_text' ] );
			$button_two_url         = esc_url( $instance[ 'button_two_url' ] );

			echo $args['before_widget'];

			$bg_image_style = '';
			if ( !empty( $bg_image ) ) {
				$bg_image_style .= 'background-image:url(' . $bg_image . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position: center;';
				$bg_image_class = 'at-parallax';
			}
			else{
				$bg_image_class = 'at-no-parallax';
			}
			?>
			<section id="<?php echo $unique_id;?>" class="at-widgets primary-bg <?php echo $bg_image_class; ?> " style="<?php echo $bg_image_style; ?>">
				<div class="container">
					<?php
					if( ! empty( $title ) ){
						echo "<div class='at-widget-title-wrapper'>";
						echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
						echo "</div>";
					}
					$animation1 = "init-animate zoomIn";
					?>
					<div class="row">
                        <div class="col-md-12 <?php echo $animation1;?>">
	                        <?php
	                        if( !empty( $feature_title ) ) {
		                        echo $feature_title;
	                        }
	                        ?>
                        </div>
						<div class="col-md-12 at-btn-wrap <?php echo $animation1;?>">
                            <?php
                            if( !empty( $button_one_text ) ){
                                ?>
                                <a href="<?php echo $button_one_url; ?>" class="init-animate zoomIn btn btn-primary btn-reverse outline-outward banner-btn">
                                    <?php echo $button_one_text;?>
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                                <?php
                            }
                            if( !empty( $button_two_text ) ){
                                ?>
                                <a href="<?php echo $button_two_url; ?>" class="init-animate zoomIn btn btn-primary btn-reverse outline-outward banner-btn">
	                                <?php echo $button_two_text;?>
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
					</div>
				</div>
			</section>
			<?php
			echo $args['after_widget'];
		}
	} // Class Construction_Field_Feature ends here
}