<!-- Modal -->
  <div class="modal fade" id="deleteUserModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar Usuario</h4> <!-- poner el nombre del usuario -->
        </div>
        <div class="modal-body">
             <div id="divToDeleteUser">
                      {!! Form::open(['url' => '#','id'=>'deleteUserForm']) !!}
                      
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden"  id="idUserToDelete" >
                            
                    <p>¿Desea eliminar a <span id="nameUserToDelete"></span> <span id="firstNameUserToDelete"></span>?</p>
                            
                    {!! Form::close() !!}
                     <button class="btn btn-normal-add btn-block" data-dismiss="modal"><i    class="ion-thumbsdown"> NO</i></button>
                   
                    <button  class='btn btn-danger-delete btn-block'  OnClick="deleteUser()"><i class="ion-thumbsup">SI</i></button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>