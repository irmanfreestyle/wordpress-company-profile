jQuery(document).ready(function($){
   /** Header Slider **/
$("#header-slider-wrap").owlCarousel({
    nav:true,
    items:1,
  	loop:true,
  	dots: false,
    navElement: 'div',
});
/** Portfolio Slider **/
$("#portfolio-workd-wrap").owlCarousel({
    nav:true,
    items: 5,
  	dots: false,
  	loop:true,
    navElement: 'div',
    responsive:{
            360:{
                items:1
            },
            420:{
                items:2
            },
            768:{
                items:3  
            },
            1000:{
                items:5
            }
        }
});
$(".test-post-loop-wrap").owlCarousel({
    nav:true,
    loop:true,
    items: 2,
    margin: 40,
  	dots: false,
    navElement: 'div',
    responsive:{
            500:{
                items:1
            },
            650:{
                items:2
            }
        }
});

var open = false;
  $('.search-icon').on('click',function(){
    open = !open;
    if(open){
      $('.ak-search').show();
      $(this).find('i.fa4').removeClass('fa-search').addClass('fa-caret-right');
    }else{
      $('.ak-search').hide();
      $(this).find('i.fa4').addClass('fa-search').removeClass('fa-caret-right');
    }
  });
  
  //Navigation toggle
$("#toggle").click(function () {
    $(this).toggleClass("on");
    $(".primary-menu").slideToggle();
});
//Entrance WOW JS
var wow = new WOW(
    {
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 150, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function (box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        }
    }
);
wow.init();
// Parallax Background
$(window).load(function(){
   $('#construct_cta_section').parallax('50%', 0.4, true);
});
});
