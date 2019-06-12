<?php
/**
 * Custom Metabox
 * Only added icon not special data
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'construction_field_meta_add_featured_icon' )):
    function construction_field_meta_add_featured_icon() {
        add_meta_box(
            'construction_field_meta_fields', // $id
            esc_html__( 'Featured Icon', 'construction-field' ), // $title
            'construction_field_meta_featured_icon_callback', // $callback
            'page', // $page
            'side', // $context
            'core'// $priority
        );
    }
endif;
add_action('add_meta_boxes', 'construction_field_meta_add_featured_icon');

/**
 * Callback function for metabox
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('construction_field_meta_featured_icon_callback') ) :
    function construction_field_meta_featured_icon_callback(){
        global $post;
        $construction_field_featured_icon = get_post_meta( $post->ID, 'construction-field-featured-icon', true );
        wp_nonce_field( basename( __FILE__ ), 'construction_field_meta_fields_nonce' );
       ?>
        <div class="at-icons-wrapper">
            <div class="icon-preview">
                <?php if( !empty( $construction_field_featured_icon ) ) { echo '<i class="fa '. esc_attr( $construction_field_featured_icon ) .'"></i>'; } ?>
            </div>
            <div class="icon-toggle">
                <?php echo ( empty( $construction_field_featured_icon )? esc_html__('Add Icon','construction-field'): esc_html__('Edit Icon','construction-field') ); ?>
                <span class="dashicons dashicons-arrow-down"></span>
            </div>
            <div class="icons-list-wrapper hidden">
                <input class="icon-search widefat" type="text" placeholder="<?php esc_attr_e('Search Icon','construction-field')?>">
                <?php
                $fa_icon_list_array = construction_field_icons_array();
                foreach ( $fa_icon_list_array as $single_icon ) {
                    if( $construction_field_featured_icon == $single_icon ) {
                        echo '<span class="single-icon selected"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                    } else {
                        echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                    }
                }
                ?>
            </div>
            <input class="widefat at-icon-value" id="construction-field-featured-icon" type="hidden" name="construction-field-featured-icon" value="<?php echo esc_attr( $construction_field_featured_icon ); ?>" placeholder="fa-desktop"/>
        </div>
        <?php
}
endif;

/**
 * Save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('construction_field_meta_save_featured_icon') ) :
    function construction_field_meta_save_featured_icon( $post_id ) {

        /*
         * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
         *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
         * */
        if (
            !isset( $_POST[ 'construction_field_meta_fields_nonce' ] ) ||
            !wp_verify_nonce( $_POST[ 'construction_field_meta_fields_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
        ){
            return;
        }
        //Execute this saving function
        if(isset($_POST['construction-field-featured-icon'])){
            $new = sanitize_text_field( $_POST['construction-field-featured-icon'] );
            update_post_meta( $post_id, 'construction-field-featured-icon', $new );
        }
    }
endif;
add_action('save_post', 'construction_field_meta_save_featured_icon' );