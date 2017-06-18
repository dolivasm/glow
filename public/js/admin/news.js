$(document).ready(function() {
    loadNews();
    $("#searchNewsForm").validate({
        submitHandler: function(form) {
            //This methos is callback  when the form is valid
            filter();
        }
    });

});

function loadNews() {
    $.ajax({
            cache: false,
            url: 'newsDetail',
            contentType: 'application/html; charset=utf-8',
            type: 'GET',
            dataType: 'html'
        })
        .success(function(result) {
            $("#div-news").html(result);
        })
        .error(function(response) {
            notifyError(response.error);
        })

}

function filter() {
    var searchValue = $("#searchNewsForm #txt_search").val();
    if (searchValue != "") {
        var route = 'filter-news/' + searchValue + "";
    } else {
        var route = 'filter-news/' + " ";
    }

    $.ajax({
            cache: false,
            url: route,
            contentType: 'application/html; charset=utf-8',
            type: 'GET',
            dataType: 'html'
        })
        .success(function(result) {
            $("#div-news").html(result);
            $("#searchNewsForm #txt_search").val("");
        })
        .error(function(response) {
           notifyError(response.error);
        })

}