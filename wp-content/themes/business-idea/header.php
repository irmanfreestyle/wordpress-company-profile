<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
	
	<?php do_action( 'business_idea_before_site_start' ); ?>
	
	<div id="page" class="site">
		
		<header class="site-header">
			<div class="header navbar-default">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
					<div class="navbar-header">
						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Business Max">
							<?php 
							if( has_custom_logo() ){
								the_custom_logo();
							}else{
								if( is_front_page() ){ ?>
									<span><?php bloginfo( 'name' ); ?></span>
								<?php }else{ ?>
									<p><?php bloginfo( 'name' ); ?></p>
								<?php }
							}
							?>							
						</a>
						
						<?php
						if( ! has_custom_logo() ){
							$description = get_bloginfo( 'description', 'display' );

							if ( $description || is_customize_preview() ) :
							?>
								<p class="site-description"><?php echo esc_html( $description ); ?></p>
							<?php 
							endif; 
						} 
						?>
						
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only"><?php _e('Toggle navigation','business-idea'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					   </button>
					</div>
					
				   <!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <?php 
							wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class' => 'nav navbar-nav',
							'fallback_cb' => 'business_idea_fallback_page_menu',
							'walker' => new business_idea_bootstrap_navwalker())
							); 
						?>			 
					</div><!-- /.navbar-collapse -->
					
					<?php if( class_exists('woocommerce') ): ?>
					<div class="shop-counts-contents">
						<a class="cart-counts" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View cart', 'business-idea' ); ?>"><i class="fa fa-shopping-cart"></i></a>
					</div>
					<?php endif; ?>
				</div>
				</div>
				</div>
			</div>
		</header><!-- /.site-header -->
		
		<?php 
		if( is_front_page() && is_page_template('template-homepage.php') ){
			business_idea_load_section('hero'); 
		}else{
			business_idea_breadcrumbs();
		}
		?>