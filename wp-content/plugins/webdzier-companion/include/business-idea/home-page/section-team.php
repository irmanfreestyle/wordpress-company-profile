<?php 
if ( !function_exists( 'webdzierc_frontpage_team' ) ) :
	function webdzierc_frontpage_team(){
		
		$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		
		$user_ids =  business_idea_get_section_team_data();
		if ( empty( $user_ids ) ) {
			$user_ids = webdzierc_team_default_data();
		}

		$class = 'noneimage-padding';
		if( !$option['business_idea_team_disable'] ): ?>
		<section id="team" class="sections team-area <?php echo esc_attr( $class ); ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php if( !empty( $option['business_idea_teamtitle'] ) ){ ?>
						<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_teamtitle'] ); ?></h2>
						<?php }else{ ?>
						<h2 class="section-title wow animated fadeIn"><?php _e('Our Team','business-idea'); ?></h2>
						<?php } ?>
						
						<?php if( !empty( $option['business_idea_teamsubtitle'] ) ){ ?>
						<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_teamsubtitle'] ); ?></p>
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
									
									$link = '';
									
									$image = business_idea_get_media_url( $member['user_id'] );
							?>
							<div class="col-md-6">
								<div class="team-item-area">
									<div class="media">
									  
									  <?php if ( $link ) { ?>
										<a href="<?php echo esc_url( $link ); ?>">
									  <?php } ?>
									  <img class="team-picture" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>">
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
										<?php echo wp_kses_post( $member['desc'] ); ?>
										
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
		</section><!-- /.team-area -->
		<?php endif; 
	}
endif;

if ( function_exists( 'webdzierc_frontpage_team' ) ) {
	$section_priority = apply_filters( 'business_idea_section_priority', 11, 'webdzierc_frontpage_team' );
	add_action( 'business_idea_sections', 'webdzierc_frontpage_team', absint( $section_priority ) );
}