<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$class = '';
if(empty($business_idea_option['business_idea_contact_bgimage'])){
	$class = 'noneimage-padding';
}else{
	$class = 'has_section_image';
}
if( !$business_idea_option['business_idea_contact_disable'] ): ?>
<section id="contact" class="sections contact-area <?php echo esc_attr( $class ); ?>" style="background-color:<?php echo esc_attr($business_idea_option['business_idea_contact_bgcolor']); ?>;">
	<div class="rellax">
		<img src="<?php echo esc_url($business_idea_option['business_idea_contact_bgimage']); ?>">
	</div>
	<?php if(!empty($business_idea_option['business_idea_contact_bgimage'])){ ?>
	<div class="section-overlay">
	<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if( !empty( $business_idea_option['business_idea_contacttitle'] ) ){ ?>
					<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_contacttitle'] ); ?></h2>
					<?php } ?>
					<?php if( !empty( $business_idea_option['business_idea_contactsubtitle'] ) ){ ?>
					<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $business_idea_option['business_idea_contactsubtitle'] ); ?></p>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-5">
					<?php if( !empty( $business_idea_option['business_idea_contactcontent'] ) ){ 
					echo wp_kses_post( $business_idea_option['business_idea_contactcontent'] );
					} ?>
	
					<div class="footer-contact-info">
					    <?php if( !empty( $business_idea_option['business_idea_contactaddress'] ) ){ ?>
						<address>
							<span class="footer-contact-icon"><i class="fa fa-map-marker"></i></span> <?php echo esc_html( $business_idea_option['business_idea_contactaddress'] ); ?>
						</address>
						<?php } ?>
						
						<?php if( !empty( $business_idea_option['business_idea_contactphone'] ) ){ ?>
						<p><span class="footer-contact-icon"><i class="fa fa-phone"></i></span> <?php echo esc_html( $business_idea_option['business_idea_contactphone'] ); ?></p>
						<?php } ?>
						
						<?php if( !empty( $business_idea_option['business_idea_contactemail'] ) ){ ?>
						<p><span class="footer-contact-icon"><i class="fa fa-envelope"></i></span> <?php echo esc_html( $business_idea_option['business_idea_contactemail'] ); ?></p>
						<?php } ?>
						
						<?php if( !empty( $business_idea_option['business_idea_contactwebsite'] ) ){ ?>
						<p><span class="footer-contact-icon"><i class="fa fa-globe"></i></span> <?php echo esc_html( $business_idea_option['business_idea_contactwebsite'] ); ?></p>
						<?php } ?>
					</div>
				</div>
				
				<div class="col-md-5 col-md-offset-2">
					<?php 
					if( !empty( $business_idea_option['business_idea_contactshortcode'] ) ){
						echo do_shortcode( $business_idea_option['business_idea_contactshortcode'] );
					}
					?>
				</div>
				
			</div>
		</div><!-- /.container -->
	<?php if(!empty($business_idea_option['business_idea_contact_bgimage'])){ ?>
	</div>
	<?php } ?>
</section><!-- /.contact-area -->
<?php endif; ?>