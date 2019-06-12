<?php
/**
 *
 * @package construction lite
 */
 if(!function_exists('construction_lite_info_widget')){
add_action('widgets_init', 'construction_lite_info_widget');

function construction_lite_info_widget() {
    register_widget('construction_lite_info');
}
}
if(!class_exists('construction_lite_info')){
class construction_lite_info extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'construction_lite_info', __('Construction : Info', 'construction-lite'), array(
            'description' => __('Footer Info', 'construction-lite')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'construction_lite_info_title' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_title',
                'construction_lite_widgets_title' => __('Title', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_info_title_1' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_title_1',
                'construction_lite_widgets_title' => __('Company Name', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_info_1' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_1',
                'construction_lite_widgets_title' => __('Location', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'textarea',
            ),
            'construction_lite_info_title_2' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_title_2',
                'construction_lite_widgets_title' => __('Tel Text', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_info_2' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_2',
                'construction_lite_widgets_title' => __('Tel Number', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'textarea',
            ),
            'construction_lite_info_title_3' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_title_3',
                'construction_lite_widgets_title' => __('Email Text', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_info_3' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_3',
                'construction_lite_widgets_title' => __('Email Address', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'textarea',
            ),
            'construction_lite_info_title_4' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_title_4',
                'construction_lite_widgets_title' => __('Web Text', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'text',
            ),
            'construction_lite_info_4' => array(
                'construction_lite_widgets_name' => 'construction_lite_info_4',
                'construction_lite_widgets_title' => __('Web Address', 'construction-lite'),
                'construction_lite_widgets_field_type' => 'textarea',
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
        $construction_lite_info_title = isset($instance['construction_lite_info_title']) ? $instance['construction_lite_info_title'] : '';
        $construction_lite_info_title_1 = isset($instance['construction_lite_info_title_1']) ? $instance['construction_lite_info_title_1'] : '';
        $construction_lite_info_1 = isset($instance['construction_lite_info_1']) ? $instance['construction_lite_info_1'] : '';
        $construction_lite_info_title_2 = isset($instance['construction_lite_info_title_2']) ? $instance['construction_lite_info_title_2'] : '';
        $construction_lite_info_2 = isset($instance['construction_lite_info_2']) ? $instance['construction_lite_info_2'] : '';
        $construction_lite_info_title_3 = isset($instance['construction_lite_info_title_3']) ? $instance['construction_lite_info_title_3'] : '';
        $construction_lite_info_3 = isset($instance['construction_lite_info_3']) ? $instance['construction_lite_info_3'] : '';
        $construction_lite_info_title_4 = isset($instance['construction_lite_info_title_4']) ? $instance['construction_lite_info_title_4'] : '';
        $construction_lite_info_4 = isset($instance['construction_lite_info_4']) ? $instance['construction_lite_info_4'] : '';
        echo wp_kses_post($before_widget);
            if($construction_lite_info_title){ ?><h2 class="widget-title"><?php echo esc_html($construction_lite_info_title); ?></h2><?php }
            ?>
                <div class="footer-info-widget">
                <?php if($construction_lite_info_title_1 || $construction_lite_info_1){ ?>
                    <div class="title-info">
                        <?php if($construction_lite_info_title_1){ ?><span class="info-footer-title"><?php echo esc_html($construction_lite_info_title_1); ?></span><?php } ?>
                        <?php if($construction_lite_info_1){ ?><span class="footer-info"><?php echo wp_kses_post($construction_lite_info_1); ?></span><?php } ?>
                    </div>
                <?php } ?>
                <?php if($construction_lite_info_title_2 || $construction_lite_info_2){ ?>
                    <div class="title-info">
                        <?php if($construction_lite_info_title_2){ ?><span class="info-footer-title"><?php echo esc_html($construction_lite_info_title_2); ?></span><?php } ?>
                        <?php if($construction_lite_info_2){ ?><span class="footer-info"><?php echo wp_kses_post($construction_lite_info_2); ?></span><?php } ?>
                    </div>
                <?php } ?>
                <?php if($construction_lite_info_title_3 || $construction_lite_info_3){ ?>
                    <div class="title-info">
                        <?php if($construction_lite_info_title_3){ ?><span class="info-footer-title"><?php echo esc_html($construction_lite_info_title_3); ?></span><?php } ?>
                        <?php if($construction_lite_info_3){ ?><span class="footer-info"><?php echo wp_kses_post($construction_lite_info_3); ?></span><?php } ?>
                    </div>
                <?php } ?>
                <?php if($construction_lite_info_title_4 || $construction_lite_info_4){ ?>
                    <div class="title-info">
                        <?php if($construction_lite_info_title_4){ ?><span class="info-footer-title"><?php echo esc_html($construction_lite_info_title_4); ?></span><?php } ?>
                        <?php if($construction_lite_info_4){ ?><span class="footer-info"><?php echo wp_kses_post($construction_lite_info_4); ?></span><?php } ?>
                    </div>
                <?php } ?>
                </div>
            <?php
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