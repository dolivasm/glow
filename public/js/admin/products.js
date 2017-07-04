$(document).ready(function() {
  loadProducts();
  $("#searchProductsForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                filter();
            }
        });
});

function seeAllProducts(){
   $("#searchProductsForm #txt_search").val("")
   filter();
}

function loadProducts() {
    $.ajax({
        cache: false,
        url: 'productsDetail',
        contentType: 'application/html; charset=utf-8',
        type: 'GET',
        dataType: 'html'
    })
    .success(function (result) {
        $("#div-products").html(result);
    })
    .error(function (xhr, status) {
        alert("Lo sentimos no se ha podido cargar los usuaro");
    })

}

function filter(){
    var searchValue=$("#searchProductsForm #txt_search").val();
    if (searchValue!="") {
        var route='filter-products/'+searchValue+"";
    }else  {
        var route='filter-products/'+" ";
    }
   
    $.ajax({
        cache: false,
        url:route ,
        contentType: 'application/html; charset=utf-8',
        type: 'GET',
        dataType: 'html'
    })
    .success(function (result) {
        $("#div-products").html(result);
        $("#searchProductsForm #txt_search").val("");
    })
    .error(function (xhr, status) {
        alert("Lo sentimos no se ha podido cargar los productos existentes")
    })

}