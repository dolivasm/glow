$(document).ready(function () {
    loadServices();
   $("#searchServicesForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                filter();
            }
        });    
});

function seeAllServices(){
   $("#searchServicesForm #txt_search").val("")
   filter();
}


function loadServices() {
    
    $.ajax({
        cache: false,
        url: 'servicesDetail',
        contentType: 'application/html; charset=utf-8',
        type: 'GET',
        dataType: 'html'
    })
    .success(function (result) {
              
        $("#div-services").html(result);
    })
    .error(function (xhr, status) {
        alert("Lo sentimos no se ha podido cargar los Servicios existentes")
    })

}


function filter(){
    var searchValue=$("#searchServicesForm #txt_search").val();
    if (searchValue!="") {
        var route='filter-services/'+searchValue+"";
    }else  {
        var route='filter-services/'+" ";
    }

    $.ajax({
        cache: false,
        url:route ,
        contentType: 'application/html; charset=utf-8',
        type: 'GET',
        dataType: 'html'
    })
    .success(function (result) {
        $("#div-services").html(result);
        $("#searchServicesForm #txt_search").val("");
    })
    .error(function (xhr, status) {
        alert("Lo sentimos no se ha podido cargar los servicios existentes")
    })

}

