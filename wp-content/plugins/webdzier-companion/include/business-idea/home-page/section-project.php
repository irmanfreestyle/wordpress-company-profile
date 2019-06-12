<?php 
if ( !function_exists( 'webdzierc_frontpage_project' ) ) :
	function webdzierc_frontpage_project(){
		$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
						
		if( !$option['business_idea_project_disable'] ): ?>
		<section id="portfolio" class="sections portfolio-area">			
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php if( !empty( $option['business_idea_projecttitle'] ) ){ ?>
						<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_projecttitle'] ); ?></h2>
						<?php }else{ ?>
						<h2 class="section-title wow animated fadeIn"><?php _e('Our Projects','business-idea'); ?></h2>
						<?php } ?>
						
						<?php if( !empty( $option['business_idea_projectsubtitle'] ) ){ ?>
						<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_projectsubtitle'] ); ?></p>
						<?php }else{ ?>
						<p class="section-description wow animated fadeIn"><?php _e('Edit it in the customizer settings','business-idea'); ?></p>
						<?php } ?>
					</div>
				</div>
				
				<div class="row">
					
					<?php  for( $i=1; $i<=3; $i++ ){ ?>
					
					<?php 
					$option['business_idea_ps_image'.$i] = isset( $option['business_idea_ps_image'.$i] ) ? $option['business_idea_ps_image'.$i] : webdzierc_plugin_url . 'include/business-idea/images/event'.$i.'.jpg';
					
					$option['business_idea_ps_title'.$i] = isset( $option['business_idea_ps_title'.$i] ) ? $option['business_idea_ps_title'.$i] : 'Project '.$i;
					
					$option['business_idea_ps_desc'.$i] = isset( $option['business_idea_ps_desc'.$i] ) ? $option['business_idea_ps_desc'.$i] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula…';
					
					if( 
					isset( 
					$option['business_idea_ps_image'.$i] ) && 
					$option['business_idea_ps_image'.$i] == '' && 
					isset( $option['business_idea_ps_title'.$i] ) && 
					$option['business_idea_ps_title'.$i] == '' && 
					isset( $option['business_idea_ps_desc'.$i] )  && 
					$option['business_idea_ps_desc'.$i] == '' ){
						continue;
					}
					?>
					<div class="col-md-4 col-sm-4">
						<div class="portfolio-item-area">
							<figure class="imghvr-shutter-out-vert">
								<img src="<?php echo esc_url($option['business_idea_ps_image'.$i]); ?>" alt="<?php echo esc_attr($option['business_idea_ps_title'.$i]); ?>">
							 </figure>
							 <div class="project_content">
							  <h4><?php echo esc_html($option['business_idea_ps_title'.$i]); ?></h4>
							  <p><?php echo esc_html($option['business_idea_ps_desc'.$i]); ?></p>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div><!-- /.container -->			
		</section><!-- /.portfolio-area -->

		<?php endif; 
	}
endif;

if ( function_exists( 'webdzierc_frontpage_project' ) ) {
	$section_priority = apply_filters( 'business_idea_section_priority', 13, 'webdzierc_frontpage_project' );
	add_action( 'business_idea_sections', 'webdzierc_frontpage_project', absint( $section_priority ) );
}