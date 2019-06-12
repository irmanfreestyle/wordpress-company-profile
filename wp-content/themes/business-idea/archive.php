<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();

$layout = business_idea_get_layout();
$col = '8';
if($layout=='none'){
	$col = '12';
}
?>
<section class="site-content">
	<div class="container">
		<div class="row">
			
			<?php 
			if ( $layout != 'none' && $layout=='left' ) {
				get_sidebar(); 
			} 
			?>
			
			<div class="col-md-<?php echo esc_attr( $col ); ?> col-sm-<?php echo esc_attr( $col ); ?>">
				
				<?php 
				if ( have_posts() ) :
				
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', get_post_format() );
						
					endwhile;
					
					the_posts_pagination( array(
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',
					) );
				
				else :
				
					get_template_part( 'template-parts/post/content', 'none' );
					
				endif;				
				?>	
			
			</div>
			
			<?php 
			if ( $layout != 'none' && $layout=='right' ) {
				get_sidebar(); 
			} 
			?>			
			
		</div>
	</div>
</section>

<?php get_footer(); ?>