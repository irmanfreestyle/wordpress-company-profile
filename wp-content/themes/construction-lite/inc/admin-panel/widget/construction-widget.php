<?php

/**
 * @package Construction
 */
function construction_lite_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    // Store Posts in array
    $construction_lite_postlist[0] = array(
        'value' => 0,
        'label' => '--choose--'
    );
    $arg = array('posts_per_page' => -1);
    $construction_lite_posts = get_posts($arg);
    foreach ($construction_lite_posts as $construction_lite_post) :
        $construction_lite_postlist[$construction_lite_post->ID] = array(
            'value' => $construction_lite_post->ID,
            'label' => $construction_lite_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($construction_lite_widgets_field_type) {

        // Standard text field
        case 'text' : ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>"><?php echo esc_attr($construction_lite_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($construction_lite_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($construction_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($construction_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>"><?php echo esc_attr($construction_lite_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($construction_lite_widgets_name)); ?>" type="text" value="<?php echo esc_url($athm_field_value); ?>" />

                <?php if (isset($construction_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($construction_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>"><?php echo esc_attr($construction_lite_widgets_title); ?>:</label>
                <textarea class="widefat" id="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($construction_lite_widgets_name)); ?>"><?php echo esc_html($athm_field_value); ?></textarea>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>"><?php echo esc_attr($construction_lite_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($construction_lite_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>" class="widefat">
                    <?php foreach ($construction_lite_widgets_field_options as $athm_option_name => $athm_option_title) { ?>
                        <option value="<?php echo esc_attr($athm_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>" <?php selected($athm_option_name, $athm_field_value); ?>><?php echo esc_attr($athm_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($construction_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($construction_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>"><?php echo esc_attr($construction_lite_widgets_title); ?>:</label><br />
                <input name="<?php echo esc_attr($instance->get_field_name($construction_lite_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($construction_lite_widgets_name)); ?>" value="<?php echo esc_attr($athm_field_value); ?>" class="small-text" />

                <?php if (isset($construction_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($construction_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;
    }
}

function construction_lite_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($construction_lite_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($construction_lite_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($construction_lite_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $construction_lite_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $construction_lite_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($construction_lite_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}