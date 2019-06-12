<?php
/*
 * 404 page template file
 */ 
 
get_header(); ?>
<section class="page_404">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				
				<h2 class="error_title"><?php _e('404','business-idea'); ?></h2>
				
				<h4 class="error_subtitle"><?php _e('OOPS, WE CAN`T FIND THAT PAGE!','business-idea'); ?></h4>
				
				<p class="error_desc"><?php _e('The page you are looking for can`t be found. Go home by click on below button.','business-idea'); ?></p>
				
				<a class="theme-btn btn-info animated fadeInUp" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home Page','business-idea'); ?></a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>