<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
if( empty( $business_idea_option['business_idea_facebook_link'] ) || empty( $business_idea_option['business_idea_twitter_link'] ) || empty( $business_idea_option['business_idea_google_plus_link'] ) ){
	$business_idea_option['business_idea_social_disable'] = true;
}
$class = 'noneimage-padding';
if( !$business_idea_option['business_idea_social_disable'] ): ?>
<section id="social" class="sections social-area <?php echo esc_attr( $class ); ?>" style="background-color:<?php echo esc_attr($business_idea_option['business_idea_social_bgcolor']); ?>;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $business_idea_option['business_idea_socialtitle'] ) ){ ?>
				<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_socialtitle'] ); ?></h2>
				<?php } ?>				
			</div>
		</div>
		<div class="row">
			<div class="social-links">
				<ul>
					<?php if( !empty( $business_idea_option['business_idea_facebook_link'] ) ){ ?>
					<li class="Facebook"><a href="<?php echo esc_url( $business_idea_option['business_idea_facebook_link'] ); ?>" title="Facebook" rel="tooltip"><i class="fa fa-facebook-f"></i></a></li>
					<?php } ?>
					
					<?php if( !empty( $business_idea_option['business_idea_twitter_link'] ) ){ ?>
					<li class="Twitter"><a href="<?php echo esc_url( $business_idea_option['business_idea_twitter_link'] ); ?>" title="Twitter" rel="tooltip"><i class="fa fa-twitter"></i></a></li>
					<?php } ?>
					
					<?php if( !empty( $business_idea_option['business_idea_google_plus_link'] ) ){ ?>
					<li class="Google-Plus"><a href="<?php echo esc_url( $business_idea_option['business_idea_google_plus_link'] ); ?>" title="Google Plus" rel="tooltip"><i class="fa fa-google-plus"></i></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div><!-- /.container -->
</section><!-- /.social-area -->
<?php endif; ?>