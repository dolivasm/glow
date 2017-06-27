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
    
    $('#div-forlist').on('load', function() {
        var status = $('.userPreloader').fadeOut();
        var preloader = $('.userStatus').delay(350).fadeOut('slow');
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
    toastr.clear()
    toastr.success(message.toUpperCase(), null, {
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        positionClass: 'toast-top-full-width'

    });
}

function notifyError(message) {
    toastr.clear()
    toastr.error(message.toUpperCase(), null, {
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        positionClass: 'toast-top-full-width'
    });
}

function notifyInfo(message) {
    toastr.clear()
    toastr.warning(message.toUpperCase(), null, {
        newestOnTop: true,
        progressBar: true,
        closeButton: true,
        positionClass: 'toast-top-full-width'
    });
}

function getActualDate(){
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 
today = dd + '-' + mm + '-' + yyyy;
return today;
}

function loadUsers() {
    $.ajax({
        cache: false,
        url: 'getIndexUsers',
        contentType: 'application/html; charset=utf-8',
        type: 'GET',
        dataType: 'html'
    })
    .success(function (result) {
        $("#div-forcontent").html("");
        $("#div-forlist").html(result);
        $("#div-forlist").load();
    })
    .error(function (xhr, status) {
        notifyError("Lo sentimos no se han podido cargar los usuarios");
    })
}