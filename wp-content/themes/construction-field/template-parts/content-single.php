<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
$no_blog_image = '';
global $construction_field_customizer_all_values;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate'); ?>>
    <div class="content-wrapper">
		<?php
		$sidebar_layout = construction_field_sidebar_selection();
		$thumbnail = $construction_field_customizer_all_values['construction-field-single-img-size'];
		if( has_post_thumbnail() && 'disable' != $thumbnail):
			echo '<div class="image-wrap"><figure class="post-thumb">';
			the_post_thumbnail( $thumbnail );
			echo "</figure></div>";
		else:
			$no_blog_image = 'no-image';
		endif;
		?>
        <div class="entry-content <?php echo $no_blog_image?>">
			<?php
			if ( 'post' === get_post_type() && has_category() ) : ?>
                <header class="entry-header <?php echo $no_blog_image; ?>">
                    <div class="entry-meta">
						<?php
						construction_field_cats_lists()
						?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
			<?php
			endif; ?>
            <div class="entry-header-title">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
            </div>
            <footer class="entry-footer">
				<?php construction_field_entry_footer(); ?>
            </footer><!-- .entry-footer -->
			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'construction-field' ),
				'after'  => '</div>',
			) );
			?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->