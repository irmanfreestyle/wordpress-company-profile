<?php
if ( !function_exists( 'webdzierc_homepage_slider' ) ) :
	function webdzierc_homepage_slider(){
		$option = wp_parse_args(  get_option( 'businessmax_options', array() ), business_max_data() );

		$slides = business_max_get_section_slider_data();

		if ( empty( $slides ) || !is_array( $slides ) ) {
		    $slides = array();
		}

		if( $option['hero_section'] == true ){
		?>
		<section class="main-carousel">
		 	<div id="main-slider" class="carousel slide" data-ride="carousel">	  
			    <ol class="carousel-indicators">
			    	<?php $i = 1; foreach ($slides as $key => $slide) { ?>
					<li data-target="#main-slider" data-slide-to="<?php echo esc_attr($key); ?>" class="<?php if( $i == 1 ){ echo 'active'; } $i++; ?>"></li>
					<?php } ?>
				</ol>
		 
				<div class="carousel-inner" role="listbox">
					 <?php $i = 1; foreach ($slides as $key => $slide) { 

					 	$slideimage = business_max_get_media_url( $slide['image'] );
					 	?>
				     <div class="<?php if( $i == 1 ){ echo 'active'; } $i++; ?> carousel-item">
					   <img src="<?php echo esc_url($slideimage); ?>" class="d-block w-100">
					    <div class="carousel-caption">
							<h1 class="wow animated zoomIn" data-wow-delay="0.4s"><?php echo wp_kses_post( $slide['large_text'] ); ?></h1>
							  <p class="wow animated zoomIn" data-wow-delay="0.6s"><?php echo wp_kses_post( $slide['small_text'] ); ?></p>
							  <a href="<?php echo wp_kses_post( $slide['buttonlink'] ); ?>" class="main-btn big-btn wow animated fadeInUp" data-wow-delay="1s"><?php echo wp_kses_post( $slide['buttontext'] ); ?></a> 
					    </div>
					 </div>
					 <?php } ?>
					 <?php
					 if(empty($slides)){
					 	echo '<div class="active carousel-item">
					 	<div style="width: 100%; height: 450px; background-color: '.esc_attr($option['theme_color']).';">'; ?>

					 	<div class="carousel-caption">
							<h1 class="wow animated zoomIn" data-wow-delay="0.4s"><?php echo wp_kses_post( $option['hero_largetext'] ); ?></h1>
							  <p class="wow animated zoomIn" data-wow-delay="0.6s"><?php echo wp_kses_post( $option['hero_smalltext'] ); ?></p>
							  <a href="<?php echo wp_kses_post( $option['hero_btn_link'] ); ?>" class="main-btn big-btn wow animated fadeInUp" data-wow-delay="1s"><?php echo wp_kses_post( $option['hero_btn_text'] ); ?></a> 
					    </div>

					<?php 	echo '</div>
					 	</div>';
					 }
					 ?>
				</div> 
			 	
			 	<?php if( count($slides) > 1 ){ ?>
				<ul class="carousel-navigation">
					<li><a class="carousel-prev" href="#main-slider" data-slide="prev"></a></li>
					<li><a class="carousel-next" href="#main-slider" data-slide="next"></a></li>
				</ul> 
				<?php } ?>
			</div>
		</section> 
		<div class="clearfix"></div>
		<?php }
	}
endif;

if ( function_exists( 'webdzierc_homepage_slider' ) ) {

	$section_priority = apply_filters( 'business_max_section_priority', 11, 'webdzierc_homepage_slider' );

	add_action( 'business_max_sections', 'webdzierc_homepage_slider', absint( $section_priority ) );
}
?>