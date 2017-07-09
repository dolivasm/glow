 $(document).ready(function () {
   
   $("#formUpdateUser").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putMyInfo(form);
            }
        });
        
        $("#formChangePassword").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putPasswod(form);
            }
        });
        
       function putMyInfo() {
                
                document.getElementById("addSubmitInfo").disabled = true;
                var phone = $("#formUpdateUser #phone").val();
                var email = $("#formUpdateUser #email").val();
                var username = $("#formUpdateUser #username").val();
                var token = $("#token").val();
                var route = 'updateMyInfo';
                  $.ajax({
                    url: route,
                    headers: {
                      'X-CSRF-TOKEN': token
                    },
                    type: 'PUT',
                    dataType: 'json',
                    data: {
                      phone, email, username
                    },
                    success: function(response) {
                        document.getElementById("addSubmitInfo").disabled = false;
                        toastr.clear();
                        notifySuccess(response.mensaje);
                    },
                    error: function(response) {
                      document.getElementById("addSubmitInfo").disabled = false;
                      if (response.status == 422) {
                        displayFieldErrors(response);
                      } else {}
                    }
                  });
    }
    
 //Método para guardar cambios a un usuario existente en la base de datos
   function putPasswod() {
     
    var currentPassword = $("#formChangePassword #currentPassword").val();
    var newPassword = $("#formChangePassword #newPassword").val();
    var confirmPassword = $("#formChangePassword #confirmPassword").val();
    var token = $("#token").val();
    var route = 'changePassword';
    document.getElementById("addSubmitPass").disabled = true;
      $.ajax({
        url: route,
        headers: {
          'X-CSRF-TOKEN': token
        },
        type: 'PUT',
        dataType: 'json',
        data: {
          currentPassword, newPassword, confirmPassword
        },
        success: function(response) {
            toastr.clear();
            $("#formChangePassword")[0].reset();
            if (typeof response.mensaje === 'undefined' || response.mensaje === null) {
                notifyError(response.error);
            } else {
                $("#changePasswordModal").modal('hide');
                notifySuccess(response.mensaje);
            }
            document.getElementById("addSubmitPass").disabled = false;
        },
        error: function(response) {
          if (response.status == 422) {
            displayFieldErrors(response);
            document.getElementById("addSubmitPass").disabled = false;
          } else {}
        }
      });
 }
 
});
 
   //Método para llamar al modal para editar a un usuario
 function getPassword() {
    $('#changePasswordModal').modal('show');
 }