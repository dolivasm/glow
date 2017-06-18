function btn_addProducts() {
    $.get('products/create', function(response) {
        $('#divForAddProducts').html(response);
        //Validation method with jquery validate
        $("#addProductsForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                postProducts();
            }
        });


    });

    $('#addProductsModal').modal({
        backdrop: 'static',
    }, 'show');
}

 function postProducts(){
    var token = $("#token").val();
    var route = "/products";
    var formulario = $('#addProductsForm');
	var datos = formulario.serialize();
	var archivos = new FormData();
	
	archivos.append('name',$("#addProductsForm #name").val());
	archivos.append('description',$("#addProductsForm #description").val());
	archivos.append('price',$("#addProductsForm #price").val());

	for (var i = 0; i < (formulario.find('input[type=file]').length); i++) { 
				
       	 archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
   	}
    $.ajax({
            url: route,
            headers: {
              'X-CSRF-TOKEN': token
            },
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            data:archivos, 
            success: function(response) {
            $("#addProductsModal").modal('hide');
            notifySuccess(response.message);
            //Reload the news
            loadProducts();
            },
            error: function(response) {
              if (response.status == 422) {
                displayFieldErrors(response);
              } else {
                notifyError("Lo sentimosa ocurrido un error al ingresar eliminar producto");
              }
            }
  });
 }
 
 
function deleteProduct(idProduct) {
  $('#deleteProductsModal').modal({
    backdrop: 'static',
  }, 'show');
  $('#idProductsDelete').val(idProduct);
}

function deleteProductsSend() {
  var route = "products/" + $('#idProductsDelete').val() + "";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'DELETE',
    dataType: 'json',
    success: function() {
      $("#deleteProductsModal").modal('hide');
      notifySuccess('PRODUCTO BORRADO CORRECTAMENTE');
      loadProducts();
       cleanBody();
    },
    error: function(response) {
        notifyError("Lo sentimosa ocurrido un error al intentar eliminar producto");
    }
  });
}

function editProduct(id) {
    $.get('products/' + id + '/edit', function(response) {
        $('#divForEditProducts').html(response);
         $("#formEditProducts").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putProducts(form);
            }
        });
    });
    $('#editProductsModal').modal({
        backdrop: 'static',
    }, 'show');
}

    //This method update the services selected to edit
    function putProducts() {
    var value = $("#formEditProducts #id").val();
    var token = $("#formEditProducts #token").val();
    var route = "/update-products";
    var formulario = $('#formEditProducts');
    var datos = formulario.serialize();
    var archivos = new FormData();
    
    archivos.append('id', value);
    archivos.append('name', $("#formEditProducts #name").val());
    archivos.append('description', $("#formEditProducts #description").val());
    archivos.append('price', $("#formEditProducts #price").val());

    for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {

        archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
    }
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: 'json',
        data: archivos,
        success: function(response) {
            $("#editProductsModal").modal('hide');
            toastr.clear()
            notifySuccess(response.message);
            //Reload the news
            loadProducts();

        },
        error: function(a,b,c) {
            if (response.status == 422) {
                displayFieldErrors(response);
            } else {}
        }
    });

}
