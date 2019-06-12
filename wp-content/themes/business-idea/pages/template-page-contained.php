<?php
/*
 * Template Name: Page Contained Type
 */ 
 
get_header(); 
?>
<section class="site-content">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				
				<?php 
				if ( have_posts() ) :
				
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/page/content', 'blank' );
						
					endwhile;
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
	
				endif;				
				?>	
			
			</div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>