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
                    {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
                {!!Form::close()!!}