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
    
      var datepicker=  $(".datepicker").datepicker();
    

    /*-----------------------------------------------------------------------------------*/
    /*	Progress Bars
    /*-----------------------------------------------------------------------------------*/

    
       var progressbar= $('.progress .progress-bar').progressbar({ display_text: 'fill' });
   

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
