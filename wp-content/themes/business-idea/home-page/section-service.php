<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$page_ids =  business_idea_get_section_services_data();
if ( empty( $page_ids ) ) {
	$business_idea_option['business_idea_service_disable'] = true;
}

$class = 'noneimage-padding';
if( !$business_idea_option['business_idea_service_disable'] ): ?>
<section id="service" class="sections service-area <?php echo esc_attr( $class ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $business_idea_option['business_idea_servicetitle'] ) ){ ?>
				<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_servicetitle'] ); ?></h2>
				<?php } ?>
				<?php if( !empty( $business_idea_option['business_idea_servicesubtitle'] ) ){ ?>
				<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_servicesubtitle'] ); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			<?php  if ( ! empty( $page_ids ) ) { ?>
			<?php
			$columns = 2;
			switch ( $business_idea_option['business_idea_servicelayout'] ) {
				case 12:
					$columns =  1;
					break;
				case 6:
					$columns =  2;
					break;
				case 4:
					$columns =  3;
					break;
				case 3:
					$columns =  4;
					break;
			} 
			
			$si = 0;
			
			$size = sanitize_text_field( get_theme_mod( 'hotelone_service_icon_size', '5x' ) );
			
			foreach ($page_ids as $settings) {
				$post_id = $settings['content_page'];
				$post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
				$post = get_post($post_id);
				setup_postdata( $post );
				$settings['icon'] = trim($settings['icon']);
				
				$media = '';
				
				if ( $settings['icon'] ) {
					$settings['icon'] = trim( $settings['icon'] );
					if ( $settings['icon'] != '' && strpos($settings['icon'], 'fa') !== 0) {
						$settings['icon'] = 'fa-' . $settings['icon'];
					}
					$media = '<a href="'.esc_url(get_the_permalink()).'" target="_blank"><i class="fa '.esc_attr( $settings['icon'] ).' fa-'.esc_attr( $size ).'" style="color: #'.$settings['iconcolor'].';"></i></a>';
				}
				if ( $business_idea_option['business_idea_servicelayout'] ) {
					$classes = 'col-xs-12 col-sm-'.$business_idea_option['business_idea_servicelayout'].' col-lg-'.$business_idea_option['business_idea_servicelayout'];
				} else {
					$classes = 'col-xs-12 col-sm-'.$business_idea_option['business_idea_servicelayout'].' col-lg-'.$business_idea_option['business_idea_servicelayout'];
				}

				if ($si >= $columns) {
					$si = 1;
					$classes .= ' clearleft';
				} else {
					$si++;
				}
			?>
			<div class="<?php echo esc_attr( $classes ); ?>">
				<div class="service-post wow animated fadeIn text-center">
					<div class="service-icon">
						<?php if ( $media != '' ) {
							echo $media;
						} ?>
					</div>
					
					<a href="<?php the_permalink(); ?>">
						<h4 class="service-title"><?php echo get_the_title( $post ); ?></h4>
					</a>
					<div class="service-contents">
						<?php 
						if ( $settings['icon_type'] == 'image' && $settings['image'] ){
							$url = business_idea_get_media_url( $settings['image'] );
							if ( $url ) {
								$media = '<div class="service-icon-image"><img src="'.esc_url( $url ).'" alt="'.esc_attr(get_the_title()).'"></div>';
							}
							echo $media;
						}
						?>
						<?php if ( has_post_thumbnail( $post ) ) { ?>
						<div class="service-icon-image">
						<?php
							echo get_the_post_thumbnail( $post, 'hotelone-medium' );
							?>
						</div>
						<?php } ?>
						<?php the_excerpt(); ?>
					</div>
					<?php if($settings['enable_link']){ ?>
					<div class="service-link text-center">
						<a class="service-button" href="<?php the_permalink(); ?>" target="_blank"><?php _e('Read More','business-idea'); ?></a>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php  } wp_reset_postdata(); ?>
			<?php  } ?>
			
		</div>
	</div>
</section><!-- /.service-area -->
<?php endif; ?>