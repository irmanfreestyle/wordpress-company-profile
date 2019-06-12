<?php 
function business_idea_sidebars(){
	
	register_sidebar( array(
	'name' => __( 'Primary Sidebar', 'business-idea'),
	'id' => 'sidebar-primary',
	'description' => __( 'The primary widget area', 'business-idea'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
		'name' => __( 'Woocommerce', 'business-idea' ),
		'id' => 'sidebar-woocommerce',
		'description' => __( 'Woocommerce widget area', 'business-idea' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	}
	
	for ( $i = 1; $i<= 4; $i++ ) {
		register_sidebar( array(
		'name' => sprintf( __('Footer %s', 'business-idea'), $i ),
		'id' => 'footer-' . $i,
		'description' => sprintf( __('The footer sidebar widget area %s', 'business-idea'), $i ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title wow animated fadeIn" data-wow-duration="3s" data-wow-delay="0.5s">',
		'after_title'   => '</h3>',
		) );
	}

}
add_action('widgets_init','business_idea_sidebars');