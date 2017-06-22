 $(document).ready(function () {
     $( '#formUpdateUser' ).on( 'submit', function(e) {
        e.preventDefault();
        
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
            //location.reload();
            toastr.clear();
            notifySuccess(response.mensaje);
            document.getElementById("addSubmitInfo").disabled = false;
        },
        error: function(response) {
          if (response.status == 422) {
            displayFieldErrors(response);
            document.getElementById("addSubmitInfo").disabled = false;
          } else {}
        }
      });

    });
    
  
 
 //Método para guardar cambios a un usuario existente en la base de datos
 $( '#formChangePassword' ).on( 'submit', function(e) {
     e.preventDefault();
     document.getElementById("addSubmitPass").disabled = true;
    var currentPassword = $("#formChangePassword #currentPassword").val();
    var newPassword = $("#formChangePassword #newPassword").val();
    var confirmPassword = $("#formChangePassword #confirmPassword").val();
    var token = $("#token").val();
    var route = 'changePassword';
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
 });
 
});
 
   //Método para llamar al modal para editar a un usuario
 function getPassword() {
    $('#changePasswordModal').modal({
    backdrop: 'static',
    }, 'show');
 }
 

 
//Método para guardar cambios a un usuario existente en la base de datos
 /*function putPassword() {
     //e.preventDefault();
     document.getElementById("addSubmit").disabled = true;
    var currentPassword = $("#formChangePassword #currentPassword").val();
    var newPassword = $("#formChangePassword #newPassword").val();
    var confirmPassword = $("#formChangePassword #confirmPassword").val();
    var token = $("#token").val();
    var route = 'users/changePassword';
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
            $("#changePasswordModal").modal('hide');
            location.reload();
            toastr.clear();
            notifySuccess("Usuario Editado Correctamente");
        },
        error: function(response) {
          if (response.status == 422) {
            displayFieldErrors(response);
          } else {}
        }
      });
 }*/

/*document.getElementById("addSubmit").addEventListener("click", function(event){
    event.preventDefault()
    
         document.getElementById("addSubmit").disabled = true;
    var currentPassword = $("#formChangePassword #currentPassword").val();
    var newPassword = $("#formChangePassword #newPassword").val();
    var confirmPassword = $("#formChangePassword #confirmPassword").val();
    var token = $("#token").val();
    var route = 'changePassword';
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
            $("#changePasswordModal").modal('hide');
            location.reload();
            toastr.clear();
            notifySuccess("Usuario Editado Correctamente");
        },
        error: function(response) {
          if (response.status == 422) {
            displayFieldErrors(response);
          } else {}
        }
      });
    
});*/