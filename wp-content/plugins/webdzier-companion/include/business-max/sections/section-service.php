<?php
if ( !function_exists( 'webdzierc_homepage_service' ) ) :
	function webdzierc_homepage_service(){
		$option = wp_parse_args(  get_option( 'businessmax_options', array() ), business_max_data() );

		$services = $option['service_content'];

		if( empty($services)){
			$services = array();
		}

		if( $option['service_section'] == true ){
		?>
		<section class="services-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<?php if( $option['service_title'] != '' ){ ?>
							<h1 class="wow animated slideInLeft"><?php echo wp_kses_post($option['service_title']); ?></h1>
							<?php } ?>

							<?php if( $option['service_subtitle'] != '' ){ ?>
							<p class="wow animated slideInRight"><?php echo wp_kses_post($option['service_subtitle']); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>

		   		<div class="row">
		   			<?php foreach ($services as $key => $service) {
		   			?>
					<div class="col-md-4">
						<div class="service-grid">
							<i class="fa <?php echo esc_attr( $service['icon'] ); ?> hvr-pulse"></i>
							<h3><?php echo esc_html( $service['title'] ); ?></h3>
							<p><?php echo esc_html( $service['desc'] ); ?></p>

							<?php if( $service['link'] != '' ){ ?>
							<a href="<?php echo esc_url( $service['link'] ); ?>" class="main-btn"><i class="fa fa-chevron-circle-right"></i><?php echo esc_html( $service['btn_text'] ); ?></a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>		
				</div>
			</div>	 
		</section>
		<div class="clearfix"></div>
		<?php }
	}
endif;

if ( function_exists( 'webdzierc_homepage_service' ) ) {

	$section_priority = apply_filters( 'business_max_section_priority', 12, 'webdzierc_homepage_service' );

	add_action( 'business_max_sections', 'webdzierc_homepage_service', absint( $section_priority ) );
}
?>