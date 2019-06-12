<?php 
if ( !function_exists( 'webdzierc_frontpage_testimonial' ) ) :
	function webdzierc_frontpage_testimonial(){
		$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		
		$user_ids =  business_idea_get_section_testimonial_data();
		if ( empty( $user_ids ) ) {
			$user_ids = webdzierc_testimonial_default_data();
		}

		if( !$option['business_idea_testimonial_disable'] ): ?>
		<section id="testimonial" class="sections testimonial-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php if( !empty( $option['business_idea_testimonialtitle'] ) ){ ?>
						<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_testimonialtitle'] ); ?></h2>
						<?php }else{ ?>
						<h2 class="section-title wow animated fadeIn"><?php _e('Testimonials','business-idea'); ?></h2>
						<?php } ?>
						
						<?php if( !empty( $option['business_idea_testimonialsubtitle'] ) ){ ?>
						<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_testimonialsubtitle'] ); ?></p>
						<?php }else{ ?>
						<p class="section-description wow animated fadeIn"><?php _e('Edit it in the customizer settings','business-idea'); ?></p>
						<?php } ?>
					</div>
				</div>
				<div class="row">
							
					<?php 
					if ( ! empty( $user_ids ) ) { 
						
						$i = 1;
					
						foreach ( $user_ids as $member ) {
							
							$link = isset( $member['link'] ) ?  $member['link'] : '';
							
							$image = business_idea_get_media_url( $member['user_id'] );
					?>
						<div class="col-md-6">
							<div class="testimonial-item-area">
								<div class="testimonial-content">
									<p><?php echo wp_kses_post( $member['desc'] ); ?></p>
								</div>
								<div class="testimonial-client-profile">
									<div class="media">
									  <?php if ( $link ) { ?>
										<a href="<?php echo esc_url( $link ); ?>">
									  <?php } ?>
									  <img class="testimonial-picture" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $member['link'] ); ?>">
									  <?php if ( $link ) { ?>
										</a>
									  <?php } ?>
									  <div class="media-body">
										
										<?php if ( $link ) { ?>
											<a href="<?php echo esc_url( $link ); ?>">
										  <?php } ?>
										<h5 class="team-title"><?php echo wp_kses_post( $member['name'] ); ?></h5>
										<?php if ( $link ) { ?>
											</a>
										  <?php } ?>
										  
										<span><?php echo esc_html( $member['designation'] ); ?></span>
									  </div>
									</div>
								</div>
							</div>
						</div>
					<?php 
						}
					}
					?>				
				</div>
			</div><!-- /.container -->
		</section><!-- /.testimonial-area -->
		<?php endif; 
	}
endif;

if ( function_exists( 'webdzierc_frontpage_testimonial' ) ) {
	$section_priority = apply_filters( 'business_idea_section_priority', 12, 'webdzierc_frontpage_testimonial' );
	add_action( 'business_idea_sections', 'webdzierc_frontpage_testimonial', absint( $section_priority ) );
}