		<section class="footer">
			
			<?php
			$fcolumns = absint( get_theme_mod( 'footer_layout' , 4 ) );
			$mcols = 12;
			$layout = 12;
			if ( $fcolumns > 1 ){
				$default = "12";
				switch ( $fcolumns ) {
					case 4:
						$default = '3+3+3+3';
						break;
					case 3:
						$default = '4+4+4';
						break;
					case 2:
						$default = '6+6';
						break;
				}
				$layout = sanitize_text_field( get_theme_mod( 'footer_custom_'.$fcolumns.'_columns', $default ) );
			}

			$layout = explode( '+', $layout );
			foreach ( $layout as $key => $value ) {
				$value = absint( trim( $value ) );
				$value =  $value >= $mcols ? $mcols : $value;
				$layout[ $key ] = $value;
			}

			$havewidgets = false;

			for ( $count = 0; $count < $fcolumns; $count++ ) {
				$id = 'footer-' . ( $count + 1 );
				if ( is_active_sidebar( $id ) ) {
					$havewidgets = true;
				}
			}

			if ( $fcolumns > 0 && $havewidgets ) { ?>
			<div class="footer-widget-area">
				<div class="container">
					<div class="row">						
						<?php
						for ( $count = 0; $count < $fcolumns; $count++ ) {
							$col = isset( $layout[ $count ] ) ? $layout[ $count ] : '';
							$id = 'footer-' . ( $count + 1 );
							if ( $col ) {
								?>
							<div id="footer-<?php echo esc_attr( $count + 1 ) ?>" class="col-md-<?php echo esc_attr( $col ); ?> col-sm-12" role="complementary">
								<?php dynamic_sidebar( $id ); ?>
							</div>
						<?php
							}
						}
						?>						
					</div>
				</div><!-- /.container -->
			</div><!-- /.footer-widget-area -->
			<?php }  ?>
			
			<?php 
			do_action('copyright');
			?>		
			
		</section><!-- /.footer -->
		
		<?php do_action( 'business_idea_after_site_start' ); ?>
		
	</div>
	<?php wp_footer(); ?>
  </body>
</html>