<?php
/**
 *
 * @package construction lite
 */
 if(!function_exists('construction_lite_recent_post_widget')){
add_action('widgets_init', 'construction_lite_recent_post_widget');

function construction_lite_recent_post_widget() {
    register_widget('construction_lite_recent_post');
}
}
if(!class_exists('construction_lite_recent_post')){
class construction_lite_recent_post extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'construction_lite_recent_post', __('Construction : Recent Post', 'construction-lite'), array(
            'description' => __('Recent Posts', 'construction-lite')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $construction_lite_cat_list = construction_lite_category_list();
        $fields = array(
            'construction_lite_recent_post_title' => array(
                'construction_lite_widgets_name' => 'construction_lite_recent_post_title',
                'construction_lite_widgets_title' => __('Title', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_recent_post_cat' => array(
                'construction_lite_widgets_name' => 'construction_lite_recent_post_cat',
                'construction_lite_widgets_title' => __('Recent Post Category', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'select',
                'construction_lite_widgets_field_options' => $construction_lite_cat_list,
            ),
            'construction_lite_recent_post_per_page' => array(
                'construction_lite_widgets_name' => 'construction_lite_recent_post_per_page',
                'construction_lite_widgets_title' => __('Posts Per Page', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'number',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $construction_lite_recent_post_title = isset($instance['construction_lite_recent_post_title']) ? $instance['construction_lite_recent_post_title'] : '';
        $construction_lite_recent_post_cat = isset($instance['construction_lite_recent_post_cat']) ? $instance['construction_lite_recent_post_cat'] : '';
        $construction_lite_recent_post_per_page = isset($instance['construction_lite_recent_post_per_page']) ? $instance['construction_lite_recent_post_per_page'] : '-1';
        echo wp_kses_post($before_widget);
            if($construction_lite_recent_post_title || $construction_lite_recent_post_cat){
                if($construction_lite_recent_post_title){
                    ?>
                        <h2 class="widget-title"><?php echo esc_html($construction_lite_recent_post_title); ?></h2>
                    <?php
                }
                $construction_lite_recent_post_args = array(
                        'post_type' => 'post',
                        'order' => 'DESC',
                        'posts_per_page' => $construction_lite_recent_post_per_page,
                        'post_status' => 'publish',
                        'category_name' => $construction_lite_recent_post_cat
                    );
                $construction_lite_recent_post_query = new WP_Query($construction_lite_recent_post_args);
                if($construction_lite_recent_post_query->have_posts()):
                    ?>
                    <div class="recent-post-widget">
                        <?php
                        while($construction_lite_recent_post_query->have_posts()):
                            $construction_lite_recent_post_query->the_post();
                            $construction_lite_recent_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'construction-recent-post-image');
                            $construction_lite_recent_post_image_url = $construction_lite_recent_post_image[0];
                            if($construction_lite_recent_post_image_url || get_the_title()){
                                ?>
                                    <div class="recent-posts-content clearfix">
                                        <?php if($construction_lite_recent_post_image_url){ ?><div class="image-recent-post"><img src="<?php echo esc_url($construction_lite_recent_post_image_url) ?>" alt="<?php the_title_attribute() ?>" title="<?php the_title_attribute() ?>" /></div><?php } ?>
                                        <div class="date-title-recent-post">
                                            <?php if(get_the_title()){ ?><span class="recent-post-title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr(wp_trim_words(get_the_title(),'5','...')); ?></a></span><?php } ?>
                                            <span class="recent-post-date"><?php echo esc_attr(get_the_date('d,F,Y')); ?></span>
                                        </div>
                                    </div>
                                <?php
                            }
                        endwhile;
                        //wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                endif;
            }
        echo wp_kses_post($after_widget);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$construction_lite_widgets_name] = construction_lite_widgets_updated_field_value($widget_field, $new_instance[$construction_lite_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	construction_lite_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $construction_lite_widgets_field_value = !empty($instance[$construction_lite_widgets_name]) ? esc_attr($instance[$construction_lite_widgets_name]) : '';
            construction_lite_widgets_show_widget_field($this, $widget_field, $construction_lite_widgets_field_value);
        }
    }
}
}