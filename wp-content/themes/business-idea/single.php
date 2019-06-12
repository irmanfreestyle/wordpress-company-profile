<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				
				if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ) {
					get_sidebar('woocommerce');
				}
				else {
					get_sidebar();
				}
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
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="nav-subtitle"><i class="fa fa-angle-double-left"></i> ' . __( 'Previous', 'business-idea' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle">' . __( 'Next', 'business-idea' ) . ' <i class="fa fa-angle-double-right"></i></span>',
					) );
	
				endif;				
				?>	
			
			</div>
			
			<?php 
			if ( $layout != 'none' && $layout=='right' ) {
				
				if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ) {
					get_sidebar('woocommerce');
				}
				else {
					get_sidebar();
				}
			} 
			?>		
			
		</div>
	</div>
</section>

<?php get_footer(); ?>