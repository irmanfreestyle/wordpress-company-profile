<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */

get_header();
global $construction_field_customizer_all_values;

$bg_image_url ='';
if( get_header_image() ){
	$bg_image_url = esc_url( get_header_image() );
}
?>
<div class="wrapper inner-main-title">
    <?php
    echo construction_field_get_header_normal_image();
    ?>
	<div class="container">
		<header class="entry-header init-animate">
			<?php
			$single_header_title = $construction_field_customizer_all_values['construction-field-single-header-title'];
			if( !empty( $single_header_title ) ){
			    echo '<h2 class="entry-title">'.esc_html( $single_header_title ).'</h2>';
            }
            if( 1 == $construction_field_customizer_all_values['construction-field-show-breadcrumb'] ){
				construction_field_breadcrumbs();
			}
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = construction_field_sidebar_selection();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
        while ( have_posts() ) : the_post();
		    get_template_part( 'template-parts/content', 'single' ); ?>
            <div class="clearfix"></div>
			<?php
	        if ( is_singular( 'attachment' ) ) {
		        // Parent post navigation.
		        the_post_navigation( array(
			        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'construction-field' ),
		        ) );
	        } elseif ( is_singular( 'post' ) ) {
		        the_post_navigation();
	        }
	        
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile; // End of the loop.
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();