(function() {
    "use strict";


    /*-----------------------------------------------------------------------------------*/
    /*	PreLoader
    /*-----------------------------------------------------------------------------------*/
    $(window).on('load', function() {
        var status = $('#status').fadeOut();
        var preloader = $('#preloader').delay(350).fadeOut('slow');
        var delay = $('body').delay(350).css({
            'overflow': 'visible'
        });
    })

    var homeHeight = $("#home").css({
        'height': ($(window).height()) + 'px'
    }); //Fix fullscreen slider height
    var homeHalfHeight = $("#home-half").css({
        'height': (($(window).height() / 3) * 2) + 'px'
    }); //Fix 2/3 screen slider height
    var fullscreenImageHeight = $(".full-screen-img").css({
        'height': ($(window).height()) + 'px'
    }); //Fix fullscreen image height
    var fsVideo = $(".full-screen-video").css({
        'height': ($(window).height()) + 'px'
    }); //Fix fullscreen video height
    var patternOverlay = $(".pattern-overlay").css({
        'height': ($(window).height()) + 'px'
    }); //Fix fullscreen pattern overlay height

    $(document).ready(function() {

        /*-----------------------------------------------------------------------------------*/
        /*	Go Back  Top Button
        /*-----------------------------------------------------------------------------------*/

        var hide = $("#go-back-top").hide();

        var goBackTop = $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                var fadeIn = $('#go-back-top').fadeIn();
            } else {
                var fadeOut = $('#go-back-top').fadeOut();
            }
        });
        /*-----------------------------------------------------------------------------------*/
        /*  Scroll Navigation
        /*-----------------------------------------------------------------------------------*/
        var scroll = $('.scroll').on('click', function(e) {
            var navItem = $(this);
            $(navItem).parent().siblings().removeClass('active');
            var headerH = $('.navbar').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $(navItem.attr('href')).offset().top - headerH + "px"
            }, 1000, 'easeInOutExpo');

            e.preventDefault();
        });

    });

})();

function displayFieldErrors(response) {
    var gotErrors = false;
    var errorPostion = "top left";
    $.each(response.responseJSON, function(key, item) {
        //key is the field
        $gotErrors = true;
        notifyError(item);

    });
    return gotErrors;
}

function notifySuccess(message) {

    toastr.success(message, null, {
        newestOnTop: true,
        positionClass: 'toast-bottom-center'

    });
}

function notifyError(message) {
    toastr.error(message, null, {
        newestOnTop: true,
        positionClass: 'toast-bottom-center'
    });
}

function notifyInfo(message) {
    toastr.warning(message, null, {
        newestOnTop: true,
        positionClass: 'toast-bottom-center'
    });
}