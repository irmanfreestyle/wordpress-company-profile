<?php
/*
 * Template Name: About Us
 */ 
 
 get_header(); the_post(); ?>
<section class="sections about-page">
		<div class="container">
			<div class="row">

				<?php if( has_post_thumbnail() ): ?>
				<div class="col-md-6 col-sm-6">
					<div class="about-image-area">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
				<?php endif; ?>

				<div class="col-md-<?php echo ( has_post_thumbnail()?'6':'12'); ?> col-sm-6">
					<?php 
						the_title('<h3>','</h3>'); 
					
						the_content();
					?>
				</div>

			</div><!-- /.row -->
		</div><!-- /.container -->
</section><!-- /.about-area -->
<?php get_footer(); ?>