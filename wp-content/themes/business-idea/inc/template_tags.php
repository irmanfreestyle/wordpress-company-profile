<?php 
if ( ! function_exists( 'business_idea_post_thumbnail' ) ) {
	function business_idea_post_thumbnail(){
		
		$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		$postimage = $business_idea_option['business_idea_singlepostthumb_disable'];
		
		if( $postimage == true ){
			return;
		}

		$class = '';
		if(! is_single() ){
			$class = 'media-left';
		}else{
			$class = 'post_thumbnail';
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?>">
		
			<?php if(! is_single() ){ ?>
			<a href="<?php the_permalink(); ?>">
			<?php } ?>
			
				<?php the_post_thumbnail( 'full' ); ?>
			
			<?php if(! is_single() ){ ?>
			</a>
			<?php } ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'business_idea_get_media_url' ) ) {
    function business_idea_get_media_url($media = array(), $size = 'full' )
    {
        $media = wp_parse_args( $media, array('url' => '', 'id' => ''));
        $url = '';
        if ($media['id'] != '') {
            if ( strpos( get_post_mime_type( $media['id'] ), 'image' ) !== false ) {
                $image = wp_get_attachment_image_src( $media['id'],  $size );
                if ( $image ){
                    $url = $image[0];
                }
            } else {
                $url = wp_get_attachment_url( $media['id'] );
            }
        }

        if ($url == '' && $media['url'] != '') {
            $id = attachment_url_to_postid( $media['url'] );
            if ( $id ) {
                if ( strpos( get_post_mime_type( $id ), 'image' ) !== false ) {
                    $image = wp_get_attachment_image_src( $id,  $size );
                    if ( $image ){
                        $url = $image[0];
                    }
                } else {
                    $url = wp_get_attachment_url( $id );
                }
            } else {
                $url = $media['url'];
            }
        }
        return $url;
    }
}

function business_idea_copyrighttext(){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	?>
	<div class="footer-site-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
				
					<?php if( isset($business_idea_option['business_idea_copyright']) && !empty($business_idea_option['business_idea_copyright'])): ?>
					<p class="copyright-contents"><?php printf( sprintf( __('%s','business-idea'), $business_idea_option['business_idea_copyright'] ) ); ?></p>
					<?php endif; ?>
					
					<?php if( $business_idea_option['business_idea_btt_disable'] == false ): ?>
					<a class="scroll_top" href><i class="fa fa-angle-double-up"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.footer-site-info -->
	<?php	
}
add_action('copyright','business_idea_copyrighttext');


/**
 body class
 */
function business_idea_body_classes( $classes ) {
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );

	if ( $business_idea_option['business_idea_layout'] == true ) {
		$classes[] = 'theme_layout';
	}
	return $classes;
}

add_filter( 'body_class', 'business_idea_body_classes' );

if ( ! function_exists( 'business_idea_load_section' ) ) {
	function business_idea_load_section( $Section_Id ){
		
		do_action('business_idea_before_section_' . $Section_Id);
        do_action('business_idea_before_section_part', $Section_Id);

        get_template_part('home-page/section', $Section_Id );

        do_action('business_idea_after_section_part', $Section_Id);
        do_action('business_idea_after_section_' . $Section_Id);
	}
}

if ( ! function_exists( 'business_idea_get_section_services_data' ) ) {
	
	function business_idea_get_section_services_data(){
		$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		$services = $business_idea_option['business_idea_services'];
		if (is_string($services)) {
            $services = json_decode($services, true);
        }
		$page_ids = array();
		if (!empty($services) && is_array($services)) {
            foreach ($services as $k => $v) {
                if (isset ($v['content_page'])) {
                    $v['content_page'] = absint($v['content_page']);
                    if ($v['content_page'] > 0) {
                        $page_ids[] = wp_parse_args($v, array(
                            'icon_type' => 'icon',
                            'image' => '',
                            'icon' => 'gg',
                            'iconcolor' => '#242424',
                            'enable_link' => 0
                        ));
                    }
                }
            }
        }
        return $page_ids;
	}
}

if ( ! function_exists( 'business_idea_get_section_about_data' ) ) {
    function business_idea_get_section_about_data()
    {
        $business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		$boxes = $business_idea_option['business_idea_about_boxes'];
        if (is_string($boxes)) {
            $boxes = json_decode($boxes, true);
        }
        $page_ids = array();
        if (!empty($boxes) && is_array($boxes)) {
            foreach ($boxes as $k => $v) {
                if (isset ($v['content_page'])) {
                    $v['content_page'] = absint($v['content_page']);
                    if ($v['content_page'] > 0) {
                        $page_ids[] = wp_parse_args($v, array('enable_link' => 0, 'hide_title' => 0));
                    }
                }
            }
        }
        $page_ids = array_filter( $page_ids );

        return $page_ids;
    }
}

if ( ! function_exists( 'business_idea_get_section_team_data' ) ) {
    function business_idea_get_section_team_data()
    {
        $business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		$members = $business_idea_option['business_idea_team'];
        if (is_string($members)) {
            $members = json_decode($members, true);
        }
        $page_ids = array();
		if (!empty($members) && is_array($members)) {
            foreach ($members as $k => $v) {
                $page_ids[] = wp_parse_args($v, array(
                            'user_id' => '',
                            'name' => '',
                            'designation' => '',
                            'desc' => ''
                        ));
            }
        }
        return $page_ids;
    }
}

if ( ! function_exists( 'business_idea_get_section_testimonial_data' ) ) {
    function business_idea_get_section_testimonial_data(){		
        $business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		$members = $business_idea_option['business_idea_testimonial'];
        if (is_string($members)) {
            $members = json_decode($members, true);
        }
        $page_ids = array();
		if (!empty($members) && is_array($members)) {
            foreach ($members as $k => $v) {
                $page_ids[] = wp_parse_args($v, array(
                            'user_id' => '',
                            'name' => '',
                            'designation' => '',
                            'desc' => '',                            
                            'link' => '',
                        ));
            }
        }
        return $page_ids;
    }
}

function business_idea_categorized_blog() {
	$category_count = get_transient( 'business_idea_categories' );

	if ( false === $category_count ) {
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );


		$category_count = count( $categories );

		set_transient( 'business_idea_categories', $category_count );
	}

	
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Flush out the transients
 */
function business_idea_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'business_idea_categories' );
}
add_action( 'edit_category', 'business_idea_category_transient_flusher' );
add_action( 'save_post',     'business_idea_category_transient_flusher' );


add_filter('get_avatar','business_idea_gravatar_class');
function business_idea_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar news-author-thumb", $class);
    return $class;
}

if( !function_exists('business_idea_breadcrumbs')){
	function business_idea_breadcrumbs(){
		$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		?>
		<section class="sub-header">
			
			<?php if(has_header_image()){?>
			
			<?php 
			$headerImage = get_header_image(); 
			if(class_exists('woocommerce')){
				if( is_woocommerce() || is_product() || is_cart() || is_shop() ){
					$thumbId = get_post_thumbnail_id();
					$thumbImage = wp_get_attachment_url( $thumbId );
				}
				
				if(!empty($thumbImage)){
					$headerImage = $thumbImage;
				}
			}			
			?>
			<div class="rellax">
				<img src="<?php echo esc_url( $headerImage ); ?>">
			</div>
			<?php } ?>
	
			<?php if(has_header_image()){?>
			<div class="sub-header-overlay">
			<?php } ?>
				<div class="container sub-header-container">					
					<div class="row">
						<div class="col-md-12 text-center">
							<?php 
							if( function_exists('bcn_display') ){
								bcn_display(); 
							}else if( is_front_page() && is_home() ){
								echo '<h1 class="page_title">' . __('Home','business-idea') . '</h1>';
							}else if( is_archive() ){
								the_archive_title( '<h1 class="page_title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							}else{
								?>
							 <h1 class="page_title"><?php single_post_title(); ?></h1>
							 <?php
							}
							?>
						</div>
					</div>
				</div>
			<?php if(has_header_image()){?>
			</div>
			<?php } ?>		
		</section>
		<?php
	}
}

function business_idea_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'business-idea' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'business-idea' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

include_once( get_template_directory() . '/inc/install/class-install-helper.php' );

if ( ! function_exists( 'business_idea_author_detail' ) ) :
function business_idea_author_detail(){
?>
<div class="author_detail">
	<div class="media">
	  <div class="media-left">
		<?php echo get_avatar( get_the_author_meta( 'ID') , 150 ); ?>
	  </div>
	  <div class="media-body">
		<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="author_title">
			<h4><?php the_author(); ?></h4>
		</a>
		<p><?php the_author_meta( 'description' ); ?></p>
	  </div>
	</div>
</div><!-- .author_detail -->
<?php 
}
endif;

add_action('wp_head','business_idea_primary_color');
function business_idea_primary_color(){
	$data = business_idea_default_data();
	$color = $data['theme_color'];
	echo '<style id="business_idea-color">';
		business_idea_set_color($color);
	echo '</style>';
}
function business_idea_set_color( $color = '#00B2FF' ){
	$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
	
	$color = sanitize_hex_color($color);
	list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
	?>
	/* hero section */
	.slide-filter::before{
		background-color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_hero_overlay_color']); ?>;
	}
	.big-title{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_hero_largetextcolor']); ?>;
	}
	.slider-content{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_hero_smalltextcolor'] ); ?>;
	}
	
	.about-area .section-title,
	.about-area .section-overlay .section-title{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_about_titleColor'] ); ?>;
	}
	.about-area .section-description,
	.about-area .section-overlay .section-description{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_about_subtitleColor'] ); ?>;
	}
	.about-area h3.about-post-title,
	.about-area h3.about-post-title a{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_about_posttitlecolor'] ); ?>;
	}
	.about-area .about-content,
	.about-area blockquote{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_about_posttextcolor'] ); ?>;
	}

	.contact-area .section-title,
	.contact-area .section-overlay .section-title{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_contact_titleColor'] ); ?>;
	}
	.contact-area .section-description,
	.contact-area .section-overlay .section-description{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_contact_subtitleColor'] ); ?>;
	}
	
	.news-area .section-title,
	.news-area .section-overlay .section-title{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_news_titleColor'] ); ?>;
	}
	.news-area .section-description,
	.news-area .section-overlay .section-description{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_news_subtitleColor'] ); ?>;
	}
	
	.social-area .section-title,
	.social-area .section-overlay .section-title{
		color: <?php echo sanitize_hex_color( $business_idea_option['business_idea_social_titleColor'] ); ?>;
	}
	
	.dropdown-menu>li>a:focus, 
	.dropdown-menu>li>a:hover,
	.nav .open > a,
	.nav .open > a:hover,
	.nav .open > a:focus,
	.dropdown-menu>.active>a, 
	.dropdown-menu>.active>a:focus, 
	.dropdown-menu>.active>a:hover,
	.sub-header a,
	.sub-header a:hover,
	.sub-header a:focus,
	.slider .carousel-control .fa,
	.sections .section-title strong,
	.service-icon .fa,
	.service-area .service-title:hover,
	.service-area .service-title:focus,
	.about-area a,
	.about-area h3 a:hover,
	.about-area h3 a:focus,
	.product-category h6,
	.product-category a,
	.product-title a h3:hover,
	.product-title a h3:focus,
	.team-area .team-item-area .team-title:hover,
	.team-area .team-item-area .team-title:focus,
	.team-item-area .team-footer ul li .fa,
	.newsletter-content-area input[type="submit"]:hover,
	.newsletter-content-area input[type="submit"]:focus,
	.news-title-link:hover, 
	.news-title-link:focus, 
	.news-title-link h3:hover,
	.news-title-link h3:focus,
	.news-item-area .time,
	.news-item-area .media-body a:hover,
	.news-item-area .media-body a:focus,
	.news-item-area a,
	.callout-link,
	.pricing-item-area.active .pricing-features .pricing-icon,
	.portfolio-tabs ul li a:hover,
	.portfolio-tabs ul li a:focus,
	.widget ul li > a:hover,
	.widget ul li > a:focus,
	.footer-post-area .footer-post-time,
	.footer-post-area .footer_post_title:hover,
	.footer-post-area .footer_post_title:hover,
	.footer-contact-info span .fa,
	.copyright-contents a:hover,
	.copyright-contents a:focus,
	.site-content .blog a:hover,
	.site-content .blog a:focus,
	.site-content .blog .entry-title:hover,
	.site-content .blog .entry-title:focus,
	.author_detail .author_title, 
	.author_detail .author_title h4,
	.widget a,
	.widget .widget-title,
	.widget .widget-title a,
	.site-content a,
	.site-content .blog a,
	.comment-reply-link,
	.btn-primary,
	.btn-link:hover,
	.btn-link:focus,
	.btn-secondary:hover,
	.btn-secondary:focus{
		color: <?php echo $color; ?>;
	}
	@media (max-width: 767px){
		.float-header .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
		.float-header .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus{
			color: <?php echo $color; ?> !important;
		}
	}
	
	.header .btn-primary,
	.navbar-default .navbar-nav>.open>a, 
	.navbar-default .navbar-nav>.open>a:focus, 
	.navbar-default .navbar-nav>.open>a:hover,
	.header .navbar-nav > .active > a,
	.header .navbar-nav > .active > a:before,
	.slide-btn:hover,
	.slide-btn:focus,
	.slide-back,
	.carousel-indicators .active,
	.sections .section-title:before,
	.service-button,
	.start-add-to-cart a,
	.testimonial-client-profile,
	.testimonial-client-profile:after,
	.newsletter-content-area input[type="submit"],
	.news-thumbnail .news-overlay a,
	input[type="submit"],
	.callout-link:hover,
	.callout-link:focus,
	.carousel-control,
	.pricing-item-area .pricing-header,
	.pricing-features .pricing-button:hover,
	.pricing-features .pricing-button:focus,
	.pricing-item-area.active .pricing-features .pricing-button,
	.portfolio-tabs ul li.active a,
	.portfolio-tabs ul li.active a:hover,
	.portfolio-tabs ul li.active a:focus,
	.portfolio-item-area span,
	.scroll_top,
	.site-content .blog .more-link,
	.blog .tags a,
	.search-submit,
	.widget .tagcloud a,
	.page-numbers.current,
	.contact-area .contact-section-header,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-secondary{
		background-color: <?php echo $color; ?>;
	}

	.header .btn-primary,
	.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-secondary{
		border-color: <?php echo $color; ?>;
	}

	.pricing-features .pricing-button:hover,
	.pricing-features .pricing-button:focus,
	.pricing-item-area.active .pricing-features .pricing-button,
	.carousel-indicators li,
	div[role=form] input[type="text"]:focus, 
	div[role=form] input[type="email"]:focus,
	div[role=form] textarea:focus{
		border: 1px solid <?php echo $color; ?>;
	}

	.slide-btn:hover,
	.slide-btn:focus,
	.newsletter-content-area input[type="submit"]{
		border: 2px solid <?php echo $color; ?>;
	}

	.dropdown-menu{
		border-top: 2px solid <?php echo $color; ?>;
	}

	input[type="submit"] {
	  background-color: <?php echo $color; ?>;
	}

	blockquote {
		border-left: 1px solid <?php echo $color; ?>;
	}

	@media ( max-width: 768px ){
		.site-header{
			background-color: <?php echo $color; ?>;
		}
	}
	
	<?php
	if ( class_exists( 'WooCommerce' ) ) { ?>
		.woocommerce span.onsale,
		.shop-counts-contents,
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button, 
		.woocommerce button.button.alt, 
		.pirate-forms-submit-button, 
		.pirate-forms-submit-button:hover,
		
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt {
			background-color: <?php echo $color; ?>;
		}
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover {
			background-color: <?php echo $color; ?>;
		}
    <?php 
	}
	
	$b_fontsize = intval( $business_idea_option['typo_p_fontsize'] ); 
	$m_fontsize = intval( $business_idea_option['typo_m_fontsize'] );
	$h1_fontsize = intval( $business_idea_option['typo_h1_fontsize'] );
	$h2_fontsize = intval( $business_idea_option['typo_h2_fontsize'] );
	$h3_fontsize = intval( $business_idea_option['typo_h3_fontsize'] );
	$h4_fontsize = intval( $business_idea_option['typo_h4_fontsize'] );
	$h5_fontsize = intval( $business_idea_option['typo_h5_fontsize'] );
	$h6_fontsize = intval( $business_idea_option['typo_h6_fontsize'] );
	?>
	body{
		<?php if($b_fontsize){ ?>
		font-size: <?php echo $b_fontsize; ?>px !important;
		<?php } ?>
	}
	
	.header .navbar-nav > li > a,
	.dropdown-menu > li > a{
		<?php if($m_fontsize){ ?>
		font-size: <?php echo $m_fontsize; ?>px !important;
		<?php } ?>
	}
	h1{
		<?php if($h1_fontsize){ ?>
		font-size: <?php echo $h1_fontsize; ?>px;
		<?php } ?> 
	}
	h2{
		<?php if($h2_fontsize){ ?>
		font-size: <?php echo $h2_fontsize; ?>px;
		<?php } ?> 
	}
	h3{
		<?php if($h3_fontsize){ ?>
		font-size: <?php echo $h3_fontsize; ?>px;
		<?php } ?> 
	}
	h4{
		<?php if($h4_fontsize){ ?>
		font-size: <?php echo $h4_fontsize; ?>px;
		<?php } ?> 
	}
	h5{
		<?php if($h5_fontsize){ ?>
		font-size: <?php echo $h5_fontsize; ?>px;
		<?php } ?> 
	}
	h6{
		<?php if($h6_fontsize){ ?>
		font-size: <?php echo $h6_fontsize; ?>px;
		<?php } ?> 
	}
	.sub-header{
		background-color: rgb(<?php echo ($r - 50); ?>,<?php echo ($g - 23); ?>,<?php echo ($b - 19); ?>);
	}
	<?php	
}

if ( ! function_exists( 'business_idea_shop_content' ) ) {
/**
 * Displays shop section products
 *
 */
	function business_idea_shop_content( $shop_items, $is_callback = false ){
		$business_idea_option = wp_parse_args(  get_option( 'business_idea_option', array() ), business_idea_default_data() );
		
		$productcontentclass = 'center';
		if( $business_idea_option['business_idea_shop_product_align'] != ''){
			$productcontentclass = 'text-' . sanitize_text_field( $business_idea_option['business_idea_shop_product_align'] );
		}
		
		$args = array(
			'post_type' => 'product',
		);
		
		$args['posts_per_page'] = ! empty( $shop_items ) ? absint( $shop_items ) : 4;
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
		$i = 1;
		
		echo '<div class="row">';
		
			if($business_idea_option['business_idea_shop_scroll_effect_hide'] == false ) {
				 echo '<div id="product_slider" class="carousel slide" data-ride="carousel">';
				 echo '<div class="carousel-inner">';
			 }
			 
			 while ( $loop->have_posts() ) :
				$loop->the_post();
				global $product;
				global $post;
				
				$productclass = 'item';
				if( $i == '1' ){
					$productclass = $productclass . ' active';
				}else{
					$productclass = 'item';
				}
				?>
				
				<?php if($business_idea_option['business_idea_shop_scroll_effect_hide'] == false ) { ?>
				<div class="<?php echo $productclass; ?>">
				<?php } ?>
				
				<div class="col-md-3">
					<div class="product-item-area">
						
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="product-image-area text-center">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<?php endif; ?>
						
						<?php if( $business_idea_option['business_idea_shop_cat_hide'] == false ){ ?>
						<div class="product-category">
							<?php 
							if ( function_exists( 'wc_get_product_category_list' ) ) {
									$prod_id = get_the_ID();
									$product_categories = wc_get_product_category_list( $prod_id );
								} else {
									$product_categories = $product->get_categories();
								}
								
							if ( ! empty( $product_categories ) ) {
								$allowed_html = array(
									'a' => array(
										'href' => array(),
										'rel' => array(),
									),
								);
								echo '<h6 class="category">';
								echo wp_kses( $product_categories, $allowed_html );
								echo '</h6>';
							} ?>
						</div>
						<?php } ?>
						
						<div class="product-content <?php echo esc_attr( $productcontentclass ); ?>">
							<div class="product-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<h3><?php esc_html( the_title() ); ?></h3>
								</a>
							</div>
							
							<?php if( $business_idea_option['business_idea_shop_desc_hide'] == false ){ ?>
							<?php if ( $post->post_excerpt ) : ?>
							<div class="product-description">
								<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
							</div>
							<?php endif; ?>
							<?php } ?>
							
							<div class="product-footer">
								<?php
								$product_price = $product->get_price_html();

								if ( ! empty( $product_price ) ) {

									echo '<div class="price"><h3>';

									echo wp_kses(
										$product_price, array(
											'span' => array(
												'class' => array(),
											),
											'del' => array(),
										)
									);

									echo '</h3></div>';

								}
								?>
								<div class="start-add-to-cart">
									<?php business_idea_add_to_cart(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<?php if($business_idea_option['business_idea_shop_scroll_effect_hide'] == false ) { ?>
				</div>
				<?php } ?>
				 
				<?php	
				if($business_idea_option['business_idea_shop_scroll_effect_hide'] != false ) {
					if ( $i % 4 == 0 ) {
						echo '<div class="clearfix"></div>';
					}
				}
				$i++;
				
				
			 endwhile;
			 
			if($business_idea_option['business_idea_shop_scroll_effect_hide'] == false ) {
				echo '</div>';
				echo '</div>';
			}
			 
		echo '</div>';

		if($business_idea_option['business_idea_shop_scroll_effect_hide'] == false ) {
			echo '<a class="left carousel-control" href="#product_slider" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#product_slider" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				  </a>';
		}
		
		endif;
	}
}