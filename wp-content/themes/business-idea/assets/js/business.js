;(function($) {

   'use strict'
   
   var $window     = $(window);
   var $document = $(document);
     var herointerval = parseInt( business_idea_settings.hero_slider_speed );
	//$.fn.carousel.Constructor.TRANSITION_DURATION = interval + 2000;
	$('#hero_carousel').carousel({
		interval : herointerval
	});
   
   $(document).ready(function () {
	   
		if( business_idea_settings.disable_animation != true ){
			new WOW().init();
		}
		
		var window_width = $(window).width();
		if ( window_width >= 768 ) {
		    $('.nav li.dropdown').hover(function() {
			   $(this).addClass('open');
		   }, function() {
			   $(this).removeClass('open');
		   });
		}
	   
		//  Activate the Tooltips
		$( '[data-toggle="tooltip"], [rel="tooltip"]' ).tooltip(); 
		
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('.scroll_top').fadeIn();
			} else {
				$('.scroll_top').fadeOut();
			}
		});
		
		$('.scroll_top').click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
		
		if( $('.contact-area .wpcf7-form').length > 0 ){
			$('.contact-area .wpcf7-form').prepend('<div class="contact-section-header"><h3>GeT In Touch</h3></div>');
		}
		
		$('.rellax').parallax();
		
		$('li.dropdown').on('click', function() {
			var $el = $(this);
			if ($el.hasClass('open')) {
				var $a = $el.children('a.dropdown-toggle');
				if ($a.length && $a.attr('href')) {
					location.href = $a.attr('href');
				}
			}
		});
		
		$("html").easeScroll();
		
   });
	
	var headerFixed = function() {
		var headerFix = $('.site-header').offset().top;
		$(window).on('load scroll', function() {
			var y = $(this).scrollTop();
			if ( y >= headerFix) {
				$('.site-header').addClass('fixed');
				$('body').addClass('siteScrolled');
				$('#wpadminbar').css({position:'fixed'});
			} else {
				$('.site-header').removeClass('fixed');
				$('body').removeClass('siteScrolled');
			}
			if ( y >= 107 ) {
				$('.site-header').addClass('float-header');
			} else {
				$('.site-header').removeClass('float-header');
			}
		});
	};
	
	
	function fix_header_mobile(){		
		var isMobile = false; //initiate as false
		// device detection
		if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
			|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
			isMobile = true;
		}		
		
		var adminBarHeight = $("#wpadminbar").outerHeight();
		var navHeight = $('.site-header').outerHeight();		
		if( isMobile || $('body').width() <= 767 ){
			$(".site-header").css('margin-top', adminBarHeight + 'px');
			
			if( $('body').width() < 767){
				$(".slider").css('margin-top', navHeight + 'px');
			}			
			
		}else{	
			$(".site-header").css('margin-top', adminBarHeight + 'px');
			$(".slider").css('margin-top', '0');
		}		
	}
	
	$(document).ready( function(){
		$( window ).resize(fix_header_mobile);
		$( window ).load(fix_header_mobile);
	});
	
	// Dom Ready
	$(function() {
		headerFixed();
   	});
	
	function news_slider(){
		if($(window).width() <= 768 ){
			return;
		}
		if($(window).width() > 768 && $(window).width() <= 1024 ){
		   var total = 0;
		}
		if($(window).width() > 1024  ){
			var total = 1;
		}

		$('#news_slider .item').each(function(){
			var next = $(this).next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
			for (var i=0;i<total;i++) {
				next=next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}
		});
	}
	
	function product_slider(){
		if($(window).width() <= 768 ){
			return;
		}
		if($(window).width() > 768 && $(window).width() <= 1024 ){
		   var total = 0;
		}
		if($(window).width() > 1024  ){
			var total = 2;
		}

		$('#product_slider .item').each(function(){
			var next = $(this).next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
			for (var i=0;i<total;i++) {
				next=next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}
		});
	}
	
	$(document).ready( function(){
		$( window ).resize(function(){
		});
		$( window ).load(function(){
			news_slider();
			product_slider();
		});
	});
	
	var adminbarheight = function(){
        var height = 0;
        if ( $( '#wpadminbar' ).length ) {
            if ( $( '#wpadminbar' ).css('position') == 'fixed' ) {
                height = $( '#wpadminbar' ).height();
            }
        }
        return height;
    };
	
	function fullscreenSlider( no_trigger ){
        if ( $( '.hero-fullwidth').length > 0 ) {
            var window_h = $window.height();
            var top = adminbarheight();
            var $header = jQuery( '.header');
            var is_transparent = $header.hasClass('is-t');
            var header_h;
            if ( is_transparent ) {
                header_h = 0;
            } else {
                header_h = $header.height();
            }
            header_h += top;
            jQuery('.slider .slide img').css('height', ( window_h - header_h + 1) + 'px');
            if (  typeof  no_trigger === "undefined" || ! no_trigger ) {
                $document.trigger( 'hero_init' );
            }

        }
    }

    $window.on('resize', function (){
        fullscreenSlider();
    });
    fullscreenSlider();
    $document.on( 'header_view_changed', function(){
        fullscreenSlider();
    } );
    $document.on( 'hero_init','load', function(){
        fullscreenSlider( true );
    } );
})(jQuery);