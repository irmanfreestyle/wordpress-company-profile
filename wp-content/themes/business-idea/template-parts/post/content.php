<?php 
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

 $business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
 $postmeta = $business_idea_option['business_idea_singlepostmeta_disable'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
	
	<?php
	if ( is_sticky() && is_home() ) :
		echo business_idea_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	 
	if ( is_single() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );
	}elseif ( is_front_page() && is_home() ) {
		the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h3 class="entry-title">', '</h3></a>' );
	} else {
		the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>' );
	}
	
	if ( 'post' === get_post_type() && $postmeta == false ) { ?>
	<div class="entry-meta">
		<span class="post_author">
			<i class="fa fa-user"></i> <?php _e('Posted by :','business-idea') ?> 
			<strong>
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo esc_html(get_the_author_link());?></a>
			</strong>
		</span>
		<span class="tags">
			<i class="fa fa-file-text"></i>
			<?php 
			$separate_meta = __( ', ', 'business-idea' );
			$categories_list = get_the_category_list( $separate_meta );
			
			 if( ( business_idea_categorized_blog() && $categories_list ) ){
			 echo $categories_list;
			 } 
			?>
		</span>
		
		<?php  
		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', $separate_meta ); 
		if ( $tags_list && ! is_wp_error( $tags_list ) ) { ?>
		<span class="tags">
			<i class="fa fa-bookmark"></i>
			<?php echo $tags_list; ?>
		</span>
		<?php } ?>
		
	</div>
	<?php } ?>
	
	<div class="post_content">								
		<div class="media">
		  
		  <?php business_idea_post_thumbnail(); ?>

		  <div class="media-body">									
			<div class="entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'business-idea' ),
					get_the_title()
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'business-idea' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div>
		  </div>
		</div>							
	</div>							
</article><!-- .blog -->