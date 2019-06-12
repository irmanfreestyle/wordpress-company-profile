jQuery(document).ready(function($){
        
    wp.customize( 'construction_lite_about_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_about_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_about_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_about_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_feature_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_feature_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_feature_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_feature_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_team_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_team_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_team_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_team_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_portfolio_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_portfolio_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_portfolio_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_portfolio_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_blog_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_blog_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_blog_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_blog_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_shop_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_shop_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_shop_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_shop_section .section-sub-title h2' ).html( newval );
		} );
	} );
     wp.customize( 'construction_lite_testimonial_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_testimonial_section .section-title h5' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_testimonial_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#construct_testimonial_section .section-sub-title h2' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_top_footer_description', function( value ) {
		value.bind( function( newval ) {
			$( '.top-footer-desc' ).html( newval );
		} );
	} );
     wp.customize( 'construction_lite_footer_text', function( value ) {
		value.bind( function( newval ) {
			$( 'span.text-input' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_cta_title', function( value ) {
		value.bind( function( newval ) {
			$( '.title-cta' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_cta_section_description', function( value ) {
		value.bind( function( newval ) {
			$( '.desc-cta' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_cta_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.cta-button a' ).html( newval );
		} );
	} );
    wp.customize( 'construction_lite_body_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'body, .about-post-content, .feature-post .feature-content, .member-description, .blog_section .blogs-loop .blog-content, .testimonial_section .test-desc, .top-footer-desc' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h1_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h1' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h2_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h2' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h3_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h3' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h4_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h4' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h5_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h5' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_h6_font_size', function( value ) {
		value.bind( function( newval ) {
			$( 'h6' ).attr( 'style','font-size:'+newval+'px !important' );
		} );
	} );
    wp.customize( 'construction_lite_body_font', function( value ) {
		value.bind( function( font ) {
			$( 'body' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h1_font', function( value ) {
		value.bind( function( font ) {
			$( 'h1' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h2_font', function( value ) {
		value.bind( function( font ) {
			$( 'h2' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h3_font', function( value ) {
		value.bind( function( font ) {
			$( 'h3' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h4_font', function( value ) {
		value.bind( function( font ) {
			$( 'h4' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h5_font', function( value ) {
		value.bind( function( font ) {
			$( 'h5' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
    wp.customize( 'construction_lite_h6_font', function( value ) {
		value.bind( function( font ) {
			$( 'h6' ).attr( 'style', 'font-family: '+font+' !important' );
                WebFont.load({
                    google: {
                      families: [font]
                    }
              });
		} );
	} );
});