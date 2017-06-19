//This Functios is to Open a Add Services Modal
function btn_addServices() {

    $.get('services/create', function(response) {
        $('#divForAddServices').html(response);
        //Validation method with jquery validate
        $("#addServicesForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                postServices();
            }
        });


    });

    $('#addServicesModal').modal({
        backdrop: 'static',
    }, 'show');
}

function editServices(id) {
    $.get('services/' + id + '/edit', function(response) {
        $('#divForEditServices').html(response);
         $("#formEditServices").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putServices(form);
            }
        });
    });
    $('#editServicesModal').modal({
        backdrop: 'static',
    }, 'show');
}

function deleteServices(id) {
    $('#deleteServicesModal').modal({
        backdrop: 'static',
    }, 'show');
    $('#idServicesDelete').val(id);
}
//This method insert a new services.
function postServices() {
    var token = $("#token").val();
    var route = "/services";
    var formulario = $('#addServicesForm');
    var datos = formulario.serialize();
    var archivos = new FormData();
    
    archivos.append('name', $("#addServicesForm #name").val());
    archivos.append('description', $("#addServicesForm #description").val());
    archivos.append('price', $("#addServicesForm #price").val());
    archivos.append('duration', $("#addServicesForm #duration").val());

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
            
            $("#addServicesModal").modal('hide');
            toastr.clear()
            notifySuccess(response.message);
            //Reload the Services
           loadServices();

        },
        error: function(a,b,c) {
            alert(a+" | "+b+"| "+c);
            if (response.status == 422) {
                displayFieldErrors(response);
            } else {
                 notifyError("Lo sentimos ha ocurrido un error al ingresar el servicio");
            }
        
        }
    });
}
    //This method update the services selected to edit
    function putServices() {
    var value = $("#formEditServices #id").val();
    var token = $("#formEditServices #token").val();
    var route = "/update-services";
    var formulario = $('#formEditServices');
    var datos = formulario.serialize();
    var archivos = new FormData();
    
    archivos.append('id', value);
    archivos.append('name', $("#formEditServices #name").val());
    archivos.append('description', $("#formEditServices #description").val());
    archivos.append('price', $("#formEditServices #price").val());
    archivos.append('duration', $("#formEditServices #duration").val());

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
            $("#editServicesModal").modal('hide');
            toastr.clear()
            notifySuccess(response.message);
            //Reload the news
            loadServices();

        },
        error: function(a,b,c) {
            if (response.status == 422) {
                displayFieldErrors(response);
            } else {}
        }
    });

}


function  acceptDeleteServices () {
  var route = "services/" + $('#idServicesDelete').val() + "";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'DELETE',
    dataType: 'json',
    success: function(response) {
      notifySuccess(response.message);
      loadServices();
      $("#deleteServicesModal").modal('hide');
    },
    error: function(response) {
      notifyError(response.error);
    }
  });
} 
    
