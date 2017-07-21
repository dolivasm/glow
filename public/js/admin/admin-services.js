//This Functios is to Open a Add Services Modal
function btn_addServices() {

    $.get('services/create', function(response) {
        $('#divForAddServices').html(response);
        $('#addServicesForm #duration').clockpicker({ autoclose: true});
        //Validation method with jquery validate
        $("#addServicesForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                postServices();
            }
        });

    $('#addServicesModal').modal('show');
    });

   
}

function editServices(id) {
    $.get('services/' + id + '/edit', function(response) {
        $('#divForEditServices').html(response);
        $('#formEditServices #duration').clockpicker({ autoclose: true});
         $("#formEditServices").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putServices(form);
            }
        });
    });
    $('#editServicesModal').modal('show');
}

function deleteServices(id) {
    $('#deleteServicesModal').modal('show');
    $('#idServicesDelete').val(id);
}
//This method insert a new services.
function postServices() {
    document.getElementById("addServiceSubmit").disabled = true;
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
            document.getElementById("addServiceSubmit").disabled = false;
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
    document.getElementById("editServiceSubmit").disabled = true;
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
            document.getElementById("editServiceSubmit").disabled = false;
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
        $("#deleteServicesModal").modal('hide'); 
        if (response.error==null) {
            notifySuccess(response.message);
            loadServices();
            
        }else{
            
            notifyError(response.error);
        }
     
    },
    error: function(response) {
      notifyError(response.error);
    }
  });
}

 function getActivateService(id, name) {
     $.get('services/' +id+ '', function(response) {
        $('#idServiceToActivate').val(id);
        $('#nameServiceToActivate').text(name);
     });
    $('#activateServiceModal').modal('show');
 }
 
 
 function activateService() {
     document.getElementById("activateServices").disabled = true;
    var route = "activateService/" + $('#idServiceToActivate').val() +"";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'PUT',
    dataType: 'json',
    success: function() {
        $("#activateServiceModal").modal('hide');
        loadServices();
        notifySuccess('El servicio fue activado exitosamente!');
    },
    error: function(response) {

        notifyError("Lo sentimos a ocurrido un error al intentar activar al usuario");
    }
  });
 }
    
