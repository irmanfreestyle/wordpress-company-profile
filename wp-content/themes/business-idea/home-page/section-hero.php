<?php 
$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
$_images = $business_idea_option['hero_media'];
if (is_string($_images)) {
	$_images = json_decode($_images, true);
}

if ( empty( $_images ) || !is_array( $_images ) ) {
    $_images = array();
}

$images = array();

foreach ( $_images as $m ) {
	$m  = wp_parse_args( $m, array('image' => '' ) );
	$_u = business_idea_get_media_url( $m['image'] );
	if ( $_u ) {
		$images[] = $_u;
	}
}

if ( empty( $images ) ){
	$images = array( get_template_directory_uri().'/assets/images/slider1.jpg' );
}

$hero_class = '';
if( $business_idea_option['business_idea_herofullscreen'] ){
	$hero_class = 'hero-fullwidth';
}

$heroeffect = '';
if( $business_idea_option['business_idea_slider_effect'] == 'fade' ){
	$heroeffect = 'carousel-fade';
}
?>
<?php if( !$business_idea_option['business_idea_hero_disable'] ): ?>
<section class="slider <?php echo esc_attr( $hero_class ); ?>">
	<div id="hero_carousel" class="carousel slide <?php echo esc_attr( $heroeffect ); ?>" data-ride="carousel">
		<?php if( count($images) > 1 ){ ?>
		<?php $i = 1; ?>
		<ol class="carousel-indicators">
		<?php foreach($images as $index => $image){ ?>
		 
			<li data-target="#hero_carousel" data-slide-to="<?php echo esc_attr( $index ); ?>" class="<?php if( $i == 1 ){ echo 'active'; } $i++; ?>"></li>		  
		
		<?php } ?>
		</ol>
		<?php } ?>

		<div class="carousel-inner" role="listbox">
			
			<?php $i = 1; ?>
			<?php foreach($images as $image){ ?>
			<div class="item <?php if( $i == 1 ){ echo 'active'; } $i++; ?>">
				<div class="slide slide-filter" style="background: url('<?php echo esc_url($image); ?>');">
					<img src="<?php echo esc_url($image); ?>" alt="slide">
					
					<div class="slider-overlay">
						<div class="slider-content-area">
							<?php if(!empty( $business_idea_option['business_idea_hero_largetext'] )){ ?>
							<h1 class="big-title animated <?php echo esc_attr( $business_idea_option['business_idea_textanimation'] ); ?>"><?php echo wp_kses_post( $business_idea_option['business_idea_hero_largetext'] ); ?></h1>
							<?php } ?>
							<?php if(!empty( $business_idea_option['business_idea_hero_smalltext'] )){ ?>
							<p class="slider-content animated <?php echo esc_attr( $business_idea_option['business_idea_textanimation'] ); ?>"><?php echo wp_kses_post( $business_idea_option['business_idea_hero_smalltext'] ); ?></p>
							<?php } ?>
							
							<?php if(!empty( $business_idea_option['business_idea_hero_buttonlink'] )){ ?>
							<a href="<?php echo esc_url( $business_idea_option['business_idea_hero_buttonlink'] ); ?>" <?php if($business_idea_option['business_idea_hero_buttontarget']){ echo 'target="_blank"';} ?> class="theme-btn btn-secondary animated <?php echo esc_attr( $business_idea_option['business_idea_textanimation'] ); ?>"><?php echo wp_kses_post( $business_idea_option['business_idea_hero_buttontext'] ); ?></a>
							<?php } ?>
							
							<?php if(!empty( $business_idea_option['business_idea_hero_buttonlink'] )){ ?>
							<a href="<?php echo esc_url( $business_idea_option['business_idea_hero_buttonlink2'] ); ?>" <?php if($business_idea_option['business_idea_hero_buttontarget2']){ echo 'target="_blank"';} ?> class="theme-btn btn-primary animated <?php echo esc_attr( $business_idea_option['business_idea_textanimation'] ); ?>"><?php echo wp_kses_post( $business_idea_option['business_idea_hero_buttontext2'] ); ?></a>
							<?php } ?>
							
							
						</div>
					</div><!-- /.slider-overlay -->
				</div>
			</div>
			<?php } ?>
			
		</div><!-- .carousel-inner -->
		<?php if( count($images) > 1 ){ ?>
		<a class="left carousel-control" href="#hero_carousel" role="button" data-slide="prev">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
			<span class="sr-only"><?php _e('Previous','business-idea'); ?></span>
		</a>
		<a class="right carousel-control" href="#hero_carousel" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
			<span class="sr-only"><?php _e('Next','business-idea'); ?></span>
		</a>
		<?php } ?>		
	</div>
</section><!-- /.slider -->

<?php endif; ?>