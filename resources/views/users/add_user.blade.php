   {!!Form::open(['id'=>'addUserForm','class'=>'forms-add','files' => 'false'])!!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        @include('users.forms.users')
         {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
    {!!Form::close()!!}

{!!Html::script('js/mydatapicker.js')!!}