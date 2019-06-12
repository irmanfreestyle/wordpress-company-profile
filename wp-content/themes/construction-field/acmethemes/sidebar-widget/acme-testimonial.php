<?php
/**
 * Class for adding Testimonial Section Widget
 *
 * @package Acme Themes
 * @subpackage Construction Field
 * @since 1.0.0
 */
if ( ! class_exists( 'Construction_Field_Testimonial' ) ) {

    class Construction_Field_Testimonial extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'         => '',
            'bg_image'          => '',
            'title'             => '',
            'page_id'               => '',
            'at_all_page_items' => '',
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'construction_field_testimonial',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Testimonial Section', 'construction-field'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Testimonial Section.', 'construction-field' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance           = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id          = esc_attr( $instance[ 'unique_id' ] );
            $bg_image           = esc_url( $instance[ 'bg_image' ] );
            $title              = esc_attr( $instance[ 'title' ] );
	        $page_id                = absint( $instance['page_id'] );
	        $at_all_page_items  = $instance['at_all_page_items'];
	        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','construction-field')?></small>
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
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'construction-field' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Page', 'construction-field' ); ?></label>
                <br />
                <small><?php esc_html_e( 'Select page and its title and its content will display in the frontend.', 'construction-field' ); ?></small>
		        <?php
		        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
		        $args = array(
			        'selected'              => $page_id,
			        'name'                  => $this->get_field_name( 'page_id' ),
			        'id'                    => $this->get_field_id( 'page_id' ),
			        'class'                 => 'widefat',
			        'show_option_none'      => esc_html__('Select Page','construction-field'),
			        'option_none_value'     => 0 // string
		        );
		        wp_dropdown_pages( $args );
		        ?>
            </p>
            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'construction-field' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Featured Image and Excerpt on selected pages. ', 'construction-field' ); ?></small>
            <div class="at-repeater">
		        <?php
		        $total_repeater = 0;
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $about){
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
							        'selected'              => $about['page_id'],
							        'name'                  => $repeater_name,
							        'id'                    => $repeater_id,
							        'class'                 => 'widefat at-select',
							        'show_option_none'      => esc_html__( 'Select Page', 'construction-field'),
							        'option_none_value'     => 0 // string
						        );
						        wp_dropdown_pages( $args );
						        ?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','construction-field');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','construction-field');?></button>
	                                <?php
	                                if( get_edit_post_link( $about['page_id'] ) ){
		                                ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $about['page_id'] ) ); ?>">
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
						        'selected'              => '',
						        'name'                  => $repeater_name,
						        'id'                    => $repeater_id,
						        'class'                 => 'widefat at-select',
						        'show_option_none'      => esc_html__( 'Select Page', 'construction-field'),
						        'option_none_value'     => 0 // string
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
		        echo '<span class="button-primary at-add-repeater" id="'.$coder_repeater_depth.'">'.$add_field.'</span><br/>';
		        ?>
            </div>
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
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance                   = $old_instance;
            $instance['unique_id']    = sanitize_key( $new_instance[ 'unique_id' ] );
            $instance['bg_image']       = ( isset( $new_instance['bg_image'] ) ) ?  esc_url_raw( $new_instance['bg_image'] ): '';
            $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );

	        $instance['page_id']      = construction_field_sanitize_page( $new_instance['page_id'] );
	       /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items    = $new_instance['at_all_page_items'];
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $key=>$about ){
				        $page_ids[$key]['page_id'] = construction_field_sanitize_page( $about['page_id'] );
			        }
		        }
	        }
	        $instance['at_all_page_items'] = $page_ids;

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
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id              = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
            $bg_image               = esc_url( $instance['bg_image'] );
            $title                  = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
	        $page_id            = absint( $instance['page_id'] );

	        $at_all_page_items      = $instance['at_all_page_items'];
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
            <section id="<?php echo esc_attr( $unique_id );?>" class="at-widgets acme-testimonials <?php echo $bg_image_class; ?>" style="<?php echo $bg_image_style; ?>">
                <div class="container">
	                <?php
                    if( ! empty( $title ) ){
		                echo "<div class='at-widget-title-wrapper'>";
		                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		                echo "</div>";
	                }
	                ?>
                    <div class="row">
	                    <?php
	                    $col= 'col-md-12';
	                    $animation1 = "init-animate zoomIn";

	                    if( !empty( $page_id )){
		                    $col= 'col-md-6';
	                    }

	                    if( !empty ( $page_id ) ) :
		                    $construction_field_post_in_page_args = array(
			                    'page_id'             => $page_id,
			                    'posts_per_page'      => 1,
			                    'post_type'           => 'page',
			                    'no_found_rows'       => true,
			                    'post_status'         => 'publish'
		                    );
		                    $service_query = new WP_Query( $construction_field_post_in_page_args );

		                    /*The Loop*/
		                    if ( $service_query->have_posts() ):
			                    while( $service_query->have_posts() ):$service_query->the_post();
				                    ?>
                                    <div class="<?php echo $col;?>  <?php echo $animation1; ?>">
					                    <?php
					                    the_title( '<h3 class="entry-title">', '</h3>' );
					                    the_content();
					                    ?>
                                    </div>
			                    <?php
			                    endwhile;
		                    endif;
		                    wp_reset_postdata();
	                    endif;

                        $post_in = array();
                        if  ( is_array( $at_all_page_items ) && count($at_all_page_items) > 0 ){
	                        foreach ( $at_all_page_items as $about ){
		                        if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
			                        $post_in[] = $about['page_id'];
		                        }
	                        }
                        }
                        if( !empty ( $post_in ) ) :
	                        $construction_field_post_in_page_args = array(
		                        'post__in'          => $post_in,
		                        'orderby'           => 'post__in',
		                        'posts_per_page'    => count( $post_in ),
		                        'post_type'         => 'page',
		                        'no_found_rows'     => true,
		                        'post_status'       => 'publish'
	                        );
	                        $testimonial_query = new WP_Query( $construction_field_post_in_page_args );
                            /*The Loop*/
                            if ( $testimonial_query->have_posts() ):
	                            echo "<div class='".$col." testimonial-wrapper acme-widget-carausel'>";
                                while( $testimonial_query->have_posts() ):$testimonial_query->the_post();
                                    $animation1 = "init-animate zoomIn";
	                                $b_col = " col-sm-12";
                                    ?>
                                    <div class="single-testi-item <?php echo esc_attr( $b_col ); ?>">
                                        <div class="testimonial-item <?php echo esc_attr( $animation1 );?>">
                                            <div class="testimonial-content row">
                                                <div class="testimonial-author col-md-3">
	                                                <?php
	                                                if( has_post_thumbnail( ) ){
		                                                ?>
                                                        <div class="testimonial-image">
			                                                <?php the_post_thumbnail('thumbnail'); ?>
                                                        </div>
		                                                <?php
	                                                }
	                                                ?>
                                                </div>
                                                <div class="testimonial-details col-md-9">
	                                                <?php
	                                                the_excerpt();
	                                                the_title( sprintf( '<h3 class="testimonial-author-name"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
	                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
	                            echo "</div>";
                            endif;
	                        wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Construction_Field_Testimonial ends here
}