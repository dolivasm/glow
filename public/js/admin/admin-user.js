 $(document).ready(function () {
  configTable();
});
  
function configTable() {
 $('#usersTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    responsive: true
  });
}

//Método para llamar al modal para agregar un usuario
function addUser(route){
  $.get(route, function(response) {
        $('#divToAddUser').html(response);
     });
    $('#addUserModal').modal({
    backdrop: 'static',
    }, 'show');
}

//Método para agregar un nuevo usuario en la base de datos
function postUser(){
    var token = $("#token").val();
    var route = "/users";
    var archivos = new FormData();

    archivos.append('name', $("#addUserForm #name").val());
    archivos.append('firstName', $("#addUserForm #firstName").val());
    archivos.append('lastName', $("#addUserForm #lastName").val());
    archivos.append('birthday', $("#addUserForm #birthday").val());
    archivos.append('username', $("#addUserForm #username").val());
    archivos.append('email', $("#addUserForm #email").val());
    archivos.append('phone', $("#addUserForm #phone").val());
    archivos.append('role_id', $("#addUserForm #role_id").val());
	   
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
                $("#addUserModal").modal('hide');
                toastr.clear()
                notifySuccess("Usuario creado exitosamente!");
                $("#usersTable").load(" #usersTable");
            },
            error: function(response) {
              if (response.status == 422) {
                  displayFieldErrors(response);
              } else {}
            }
  });
 }
 
 //Método para llamar al modal para editar a un usuario
 function editUser(id) {
     $.get('users/'+ id +'/edit', function(response) {
        $('#divToEditUser').html(response);
     });
     
    $('#editUserModal').modal({
    backdrop: 'static',
    }, 'show');
 }
 
//Método para guardar cambios a un usuario existente en la base de datos
 function editUserPut() {
    var id = $("#formUpdateUser #id").val();
  var name = $("#formUpdateUser #name").val();
  var firstName = $("#formUpdateUser #firstName").val();
  var lastName = $("#formUpdateUser #lastName").val();
  var username = $("#formUpdateUser #username").val();
  var email = $("#formUpdateUser #email").val();
  var birthday = $("#formUpdateUser #birthday").val();
  var role_id = $("#formUpdateUser #role_id").val();
  var phone = $("#formUpdateUser #phone").val();
  var route = "update-users";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'PUT',
    dataType: 'json',
    data: {
      id, name, firstName, lastName, username, email, birthday, role_id, phone
    },
    success: function(response) {
        $("#editUserModal").modal('hide');
        toastr.clear()
        notifySuccess("Usuario Editado Correctamente");
        $("#usersTable").load(" #usersTable");
    },
    error: function(response) {
      if (response.status == 422) {
        displayFieldErrors(response);
      } else {}
    }
  });
 }
 
 //Método para llamar al modal para confirmar la eliminación de un usuario
 function getDeleteUser(id, name, fisrtName) {
  $.get('users/' +id+ '', function(response) {
        $('#idUserToDelete').val(id);
        $('#nameUserToDelete').text(name);
        $('#firstNameUserToDelete').text(fisrtName);
     });
    $('#deleteUserModal').modal({
    backdrop: 'static',
    }, 'show');
 }
 
 //Método para "desactivar" a un usuario de la base de datos
 function deleteUser() {
    var route = "users/" + $('#idUserToDelete').val() + "";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'DELETE',
    dataType: 'json',
    success: function() {
        $("#deleteUserModal").modal('hide');
      notifySuccess('El usuario fue borrado exitosamente!');
       $("#usersTable").load(" #usersTable");
    },
    error: function(response) {

        notifyError("Lo sentimosa ocurrido un error al intentar eliminar al usuario");
    }
  });
 }
 
 function getActivateUser(id, name, fisrtName) {
     $.get('users/' +id+ '', function(response) {
        $('#idUserToActivate').val(id);
        $('#nameUserToActivate').text(name);
        $('#firstNameUserToActivate').text(fisrtName);
     });
    $('#activateUserModal').modal({
    backdrop: 'static',
    }, 'show');
 }
 
 function activateUser() {
    var route = "activateUser/" + $('#idUserToActivate').val() +"";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'PUT',
    dataType: 'json',
    success: function() {
        $("#activateUserModal").modal('hide');
      notifySuccess('El usuario fue activado exitosamente!');
       $("#usersTable").load(" #usersTable");
    },
    error: function(response) {

        notifyError("Lo sentimos a ocurrido un error al intentar activar al usuario");
    }
  });
 }
 
 // Since confModal is essentially a nested modal it's enforceFocus method
// must be no-op'd or the following error results 
// "Uncaught RangeError: Maximum call stack size exceeded"
// But then when the nested modal is hidden we reset modal.enforceFocus
var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

$.fn.modal.Constructor.prototype.enforceFocus = function() {};

/*$confModal.on('hidden', function() {
    $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
});

$confModal.modal({ backdrop : false });*/