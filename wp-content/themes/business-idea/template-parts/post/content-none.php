<article class="blog">
	
	<h2 class="entry-title"><?php _e( 'Nothing Found', 'business-idea' ); ?></h2>
	
	<div class="post_content">								
		<div class="media">
		  <div class="media-body">									
			<div class="entry-content">
				
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'business-idea' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php else : ?>

					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'business-idea' ); ?></p>
					<?php
						get_search_form();

				endif; ?>
				
			</div>
		  </div>
		</div>							
	</div>							
</article><!-- .blog -->