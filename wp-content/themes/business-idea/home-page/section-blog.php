<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$number    = absint( $business_idea_option['business_idea_news_no'] );
$column    = absint( $business_idea_option['business_idea_news_layout'] );
$cat = absint( $business_idea_option['business_idea_news_cat'] );
$orderby = sanitize_text_field( $business_idea_option['business_idea_news_orderby'] );
$order = sanitize_text_field( $business_idea_option['business_idea_news_order'] );
$class = 'noneimage-padding';
if( !$business_idea_option['business_idea_blog_disable'] ): ?>
<section id="news" class="sections news-area <?php echo esc_attr( $class ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $business_idea_option['business_idea_blogtitle'] ) ){ ?>
				<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_blogtitle'] ); ?></h2>
				<?php } ?>
				<?php if( !empty( $business_idea_option['business_idea_blogsubtitle'] ) ){ ?>
				<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_blogsubtitle'] ); ?></p>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<?php
			$i = 1;
			$columns = 4;
			switch ( $business_idea_option['business_idea_news_layout'] ) {
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
			
			$count = wp_count_posts('post')->publish; 
			$args = array(
				'posts_per_page' => $number,
				'suppress_filters' => 0,
			);
			if ( $cat > 0 ) {
				$args['category__in'] = array( $cat );
			}
						
			if ( $orderby && $orderby != 'default' ) {
				$args['orderby'] = $orderby;
			}

			if ( $order) {
				$args['order'] = $order;
			}

			$query = new WP_Query( $args );
			?>
			
			<?php if ( $query->have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="col-md-<?php echo esc_attr( $column ); ?> col-sm-<?php echo esc_attr( $column ); ?> col-xs-12">
					<div class="news-item-area">
						
						<?php if( has_post_thumbnail() ){ ?>
						<div class="news-thumbnail">
							<?php the_post_thumbnail(); ?>
							<div class="news-overlay">
								<?php 
								$separate_meta = __( ', ', 'business-idea' );
								$categories_list = get_the_category_list( $separate_meta );
								 if( ( business_idea_categorized_blog() && $categories_list ) ){
								 echo $categories_list;
								 } ?>
							</div>
						</div>
						<?php } ?>

						<div class="news-content">
						
						<?php the_title('<a class="news-title-link" href="'.esc_url( get_the_permalink() ).'"><h3 class="news-title">','</h3></a>'); ?>
						
						<?php
							$more = '... <p><a class="more-link" href="'.esc_url( get_the_permalink() ).'">'.__('Read More','business-idea').' <i class="fa fa-angle-double-right"></i></a></p>';
							echo apply_filters( 'the_content', wp_trim_words( get_the_content(), 13, $more ) );
						?>
						</div>
						
					</div>
				</div>
				
				<?php 
				if ( $i % $columns == 0 ) {
					echo '<div class="clearfix"></div>';
				} 
				$i++;
				?>
				
			<?php endwhile; ?>
	
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
		
		<?php if(!empty( $business_idea_option['business_idea_news_more_link'] ) && ( $count > $query->post_count ) ){ ?>
		<div class="row text-center" style="margin-top: 30px;">
			<a class="theme-btn btn-primary animated fadeInDown" href="<?php echo esc_url( $business_idea_option['business_idea_news_more_link'] ); ?>"><?php echo wp_kses_post( $business_idea_option['business_idea_news_more_text'] ); ?></a>
		</div>
		<?php } ?>
		
	</div><!-- /.container -->
</section><!-- /.news-area -->
<?php endif; ?>