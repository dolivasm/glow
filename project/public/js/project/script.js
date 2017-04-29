(function () {
    "use strict";


/*-----------------------------------------------------------------------------------*/
/*	PreLoader
/*-----------------------------------------------------------------------------------*/
$(window).on('load',function () {
   var status= $('#status').fadeOut();
   var preloader= $('#preloader').delay(350).fadeOut('slow');
   var delay= $('body').delay(350).css({ 'overflow': 'visible' });
})




var homeHeight=$("#home").css({ 'height': ($(window).height()) + 'px' });//Fix fullscreen slider height
var homeHalfHeight=$("#home-half").css({ 'height': (($(window).height() / 3) * 2) + 'px' });//Fix 2/3 screen slider height
var fullscreenImageHeight=$(".full-screen-img").css({ 'height': ($(window).height()) + 'px' });//Fix fullscreen image height
var fsVideo=$(".full-screen-video").css({ 'height': ($(window).height()) + 'px' });//Fix fullscreen video height
var patternOverlay=$(".pattern-overlay").css({ 'height': ($(window).height()) + 'px' });//Fix fullscreen pattern overlay height

$(document).ready(function () {
/*-----------------------------------------------------------------------------------*/
/*	Sliders
/*-----------------------------------------------------------------------------------*/
    /* Home Fullscreen Slider */
   var fsSlider= $(".fullscreen-slider").backstretch([
        "assets/img/bg/bg1.jpg",
        "assets/img/bg/bg2.jpg"
    ], { duration: 4500, fade: 650 });

    /* Home Title Slider */
   var titleSlider= $('.title-slider').bxSlider({
        mode: 'fade',
        pager: false,
        auto: true,
        controls: false
    });
    
    /* Blog Title Slider */
   var blogSlider= $('.blog-title-slider').bxSlider({
        mode: 'fade',
        pager: true,
        auto: true,
        controls: false
    });

    /* Portfolio Slider*/
   var portfolioSlider= $('#portfolio-slider').bxSlider({
        mode: 'fade',
        pager: true,
        auto: true,
        controls: false
    });
    /* Portfolio Featured Projects Slider*/
   var portfolioFeaturedProjectSlider= $('.portfolio-featured-projects-slider').bxSlider({
        mode: 'fade',
        pager: true,
        auto: true,
        controls: false
    });
    /*-----------------------------------------------------------------------------------*/
    /*	Full Screen Video 
    /*-----------------------------------------------------------------------------------*/
    
       var fsvideo= $(".player").mb_YTPlayer();
    

    /*-----------------------------------------------------------------------------------*/
    /*	Go Back  Top Button
    /*-----------------------------------------------------------------------------------*/

    
       var hide= $("#go-back-top").hide();
      
        var goBackTop=$(window).on('scroll',function () {
                if ($(this).scrollTop() > 100) {
                  var fadeIn=  $('#go-back-top').fadeIn();
                } else {
                  var fadeOut= $('#go-back-top').fadeOut();
                }
        });

    /*-----------------------------------------------------------------------------------*/
    /*	Date Picker
    /*-----------------------------------------------------------------------------------*/
    
      var datepicker=  $("#datepicker").datepicker();
    
    /*-----------------------------------------------------------------------------------*/
    /*	Pricing Table
    /*-----------------------------------------------------------------------------------*/
     var plan = $('.plan');
     var mostPopular = $('#most-popular');
     var pricingTable3ColumnsEnter=$('body').on('mouseenter', '#pricing-table-3-columns .plan', function () {         
          plan.removeClass('plan-active');
          var $this= $(this);
          $this.addClass('plan-active');
    });
     var pricingTable3ColumnsLeave=$('body').on('mouseleave', '#pricing-table-3-columns .plan', function () {
        plan.removeClass('plan-active');
        mostPopular.addClass('plan-active');
    })
     var pricingTable4ColumnsEnter=$('body').on('mouseenter', '#pricing-table-4-columns .plan', function () {
        plan.removeClass('plan-active');
        var $this = $(this);
        $this.addClass('plan-active');
    });
     var pricingTable4ColumnsLeave=$('body').on('mouseleave', '#pricing-table-4-columns .plan', function () {
        plan.removeClass('plan-active');
        mostPopular.addClass('plan-active');
    })
    /*-----------------------------------------------------------------------------------*/
    /*	Progress Bars
    /*-----------------------------------------------------------------------------------*/

    
       var progressbar= $('.progress .progress-bar').progressbar({ display_text: 'fill' });
   
    /*-----------------------------------------------------------------------------------*/
    /*	Our Numbers
    /*-----------------------------------------------------------------------------------*/

    
        var shownx = false;

       var ourNumbers= $('#our-numbers').waypoint(function () {

            if (!shownx) {

                function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                    shownx = true;
                }
                $('.timer').each(count);
            }

        }, { offset: '80%' });
 

    /*-----------------------------------------------------------------------------------*/
    /*	Testimonals
    /*-----------------------------------------------------------------------------------*/
   var testimonialSlider= $('.testimonals-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1
    });
    
/*-----------------------------------------------------------------------------------*/
/*  Scroll Navigation
/*-----------------------------------------------------------------------------------*/
      var scroll=  $('.scroll').on('click', function (e) {
            var navItem = $(this);
            $(navItem).parent().siblings().removeClass('active');
            var headerH = $('.navbar').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $(navItem.attr('href')).offset().top - headerH + "px"
            }, 1000, 'easeInOutExpo');

            e.preventDefault();
        });
/*-----------------------------------------------------------------------------------*/
/*  Responsive Adjustment for team members
/*-----------------------------------------------------------------------------------*/
        var windowWidth = $(window).width();
        var imgwidth = $('.team-member-img').width();
        if (windowWidth < 768) {
            var teamMemberWrap = $('.team-member-wrap');
            var teamMemberDetails = $('.team-member-details');
            var teamMemberLinks = $('.team-member-links');
            teamMemberWrap.width(imgwidth);
            teamMemberDetails.width(imgwidth);
            teamMemberLinks.width(imgwidth);
        }
});

})();
