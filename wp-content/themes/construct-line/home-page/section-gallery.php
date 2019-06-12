<?php
$option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );

$class = '';
if(empty($option['business_idea_gallery_bgimage'])){
	$class = 'noneimage-padding';
}else{
	$class = 'has_section_image';
}
				
if( !$option['business_idea_gallery_disable'] ): ?>
<section id="portfolio" class="sections portfolio-area <?php echo esc_attr( $class ); ?>" style="background-color:<?php echo esc_attr($option['business_idea_gallery_bgcolor']); ?>;">
	
	<div class="rellax">
		<img src="<?php echo esc_url($option['business_idea_gallery_bgimage']); ?>">
	</div>
	
	<?php if(!empty($option['business_idea_gallery_bgimage'])){ ?>
	<div class="section-overlay">
	<?php } ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $option['business_idea_gallerytitle'] ) ){ ?>
				<h2 class="section-title wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_gallerytitle'] ); ?></h2>
				<?php } ?>
				<?php if( !empty( $option['business_idea_gallerysubtitle'] ) ){ ?>
				<p class="section-description wow animated fadeIn"><?php echo wp_kses_post( $option['business_idea_gallerysubtitle'] ); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			<?php construct_line_gallery_generate(); ?>
		</div>

	</div><!-- /.container -->
	
	<?php if(!empty($option['business_idea_gallery_bgimage'])){ ?>
	</div>
	<?php } ?>
	
</section><!-- /.portfolio-area -->
<?php endif; ?>