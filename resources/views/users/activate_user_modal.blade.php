<!-- Modal -->
  <div class="modal fade" id="activateUserModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Activar Usuario</h4>
        </div>
        <div class="modal-body">
             <div id="divToActivateUser">
                      {!! Form::open(['url' => '#','id'=>'activateUserForm']) !!}
                      
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden"  id="idUserToActivate" >
                            
                    <p>¿Desea activar a <span id="nameUserToActivate"></span> <span id="firstNameUserToActivate"></span>?</p>
                            
                    {!! Form::close() !!}
                     <button class="btn btn-danger-delete btn-block" data-dismiss="modal"><i    class="ion-thumbsdown"> NO</i></button>
                   
                    <button  id="activateUserS" class='btn btn-normal-add btn-block'  OnClick="activateUser()"><i class="ion-thumbsup">SI</i></button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>