<?php
/**
 * Template Name: Construction Home
 */
 get_header();
    $construction_lite_enable_sections = construction_lite_enable_disable_section();
    if($construction_lite_enable_sections){
        foreach($construction_lite_enable_sections as $construction_lite_enable_section){
            if( $construction_lite_enable_section['section'] == 'shop') {
                if(class_exists('woocommerce')) { 
            ?>
                <section id="<?php echo esc_attr($construction_lite_enable_section['id']); ?>" class="<?php echo esc_attr($construction_lite_enable_section['section']).'_section'; ?>">
                    <?php
                        get_template_part('template-parts/section',$construction_lite_enable_section['section']);
                    ?>                
                </section>
            <?php
                }
            } else {
            ?>
                <section id="<?php echo esc_attr($construction_lite_enable_section['id']); ?>" class="<?php echo esc_attr($construction_lite_enable_section['section']).'_section'; ?>">
                    <?php
                        get_template_part('template-parts/section',$construction_lite_enable_section['section']);
                    ?>                
                </section>
            <?php
            }
        }
    }
 get_footer();