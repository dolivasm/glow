<!-- Modal -->
<div id="changePasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cambiar Contraseña</h4>
        </div>
        <div class="modal-body">
            <div id="divToChangePassword">
                {!!Form::open(['id'=>'formChangePassword'])!!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="form-group">
                        {!!Form::label('currentPassword', 'Contraseña Actula', array('class' => 'color-text'));!!}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="currentPassword" required="">
                    </div>
                    <div class="form-group">
                        {!!Form::label('newPassword', 'Contraseña Nueva', array('class' => 'color-text'));!!}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="newPassword" required="">
                    </div>
                    <div class="form-group">
                        {!!Form::label('confirmPassword', 'Confirme la Nueva Contraseña', array('class' => 'color-text'));!!}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirmPassword" required="">
                    </div>
                    {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmitPass'])!!}
                {!!Form::close()!!}
                
                
            </div>
          <button type="button" class="btn btn-danger-delete btn-block text-uppercase" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
</div>
