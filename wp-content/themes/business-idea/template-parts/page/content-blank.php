<?php 
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div>
	
</article><!-- page -->