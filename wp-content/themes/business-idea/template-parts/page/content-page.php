<?php 
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>

	<?php 
	
	the_title( '<h2 class="entry-title">', '</h2>' ); 
	
	?>
	
	<div class="post_content">								
		<div class="media">
			
		  <?php if ( has_post_thumbnail() ) : ?>
		  <div class="post_thumbnail">
				<?php the_post_thumbnail( 'full' ); ?>
		  </div>
		  <?php endif; ?>
		  
		  <div class="media-body">									
			<div class="entry-content">
				<?php
				the_content();

					wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'business-idea' ),
					'after'  => '</div>',
				) );
				?>
			</div>
		  </div>
		</div>							
	</div>							
</article><!-- page -->