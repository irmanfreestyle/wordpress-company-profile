<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$page_ids =  business_idea_get_section_about_data();
if ( empty( $page_ids ) ) {
	$business_idea_option['business_idea_about_disable'] = true;
}
$class = '';
if(empty($business_idea_option['business_idea_about_bgimage'])){
	$class = 'noneimage-padding';
}else{
	$class = 'has_section_image';
}
if( !$business_idea_option['business_idea_about_disable'] ): ?>
<section id="about" class="sections about-area <?php echo esc_attr( $class ); ?>" style="background-color:<?php echo esc_attr($business_idea_option['business_idea_about_bgcolor']); ?>;">
	<div class="rellax">
		<img src="<?php echo esc_url($business_idea_option['business_idea_about_bgimage']); ?>">
	</div>
	<?php if(!empty($business_idea_option['business_idea_about_bgimage'])){ ?>
	<div class="section-overlay">
	<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if( !empty( $business_idea_option['business_idea_abouttitle'] ) ){ ?>
					<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_abouttitle'] ); ?></h2>
					<?php } ?>
					<?php if( !empty( $business_idea_option['business_idea_aboutsubtitle'] ) ){ ?>
					<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_aboutsubtitle'] ); ?></p>
					<?php } ?>
				</div>
			</div>
			<div class="row" style="margin-top: 30px;">
			<?php
			if ( ! empty ( $page_ids ) ) {
				$columns = 2;
				switch ( $business_idea_option['business_idea_aboutlayout'] ) {
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

				foreach ( $page_ids as $post_id => $settings ) {
					$post_id = $settings['content_page'];
					$post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
					$post = get_post( $post_id );
					
					if ( $business_idea_option['business_idea_aboutlayout'] ) {
						$classes = 'col-xs-12 col-sm-'.$business_idea_option['business_idea_aboutlayout'].' col-lg-'.$business_idea_option['business_idea_aboutlayout'];
					} else {
						$classes = 'col-xs-12 col-sm-'.$business_idea_option['business_idea_aboutlayout'].' col-lg-'.$business_idea_option['business_idea_aboutlayout'];
					}

					if ($si >= $columns) {
						$si = 1;
						$classes .= ' clearleft';
					} else {
						$si++;
					}
					?>
				<div class="<?php echo esc_attr($classes); ?>">
					
					<?php if ( has_post_thumbnail( $post ) ) { ?>
						<div class="about-item-image"><?php
							if ($settings['enable_link']) {
								echo '<a href="' . esc_url( get_permalink( $post )  ). '">';
							}
							echo get_the_post_thumbnail( $post, 'medium' );
							if ($settings['enable_link']) {
								echo '</a>';
							}
							?>
						</div>
					<?php } ?>
					
					<?php if (!$settings['hide_title']) { ?>
						<h3 class="about-post-title"><?php
							if ($settings['enable_link']) {
								echo '<a href="' .esc_url( get_permalink($post) ). '">';
							}
							echo get_the_title( $post );
							if ($settings['enable_link']) {
								echo '</a>';
							}

							?></h3>
					<?php } ?>
								
					<div class="about-content">
						<?php
						if ( $business_idea_option['business_idea_about_content_source'] == 'excerpt' ) {
							$excerpt = get_the_excerpt( $post );
							echo apply_filters( 'the_excerpt', $excerpt  );
						} else {
							$content = apply_filters( 'the_content', $post->post_content );
							$content = str_replace( ']]>', ']]&gt;', $content );
							echo $content;
						}

						?>
					</div>
				</div>
				
				<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div><!-- /.container -->
	<?php if(!empty($business_idea_option['business_idea_about_bgimage'])){ ?>
	</div>
	<?php } ?>
</section><!-- /.about-area -->
<?php endif; ?>