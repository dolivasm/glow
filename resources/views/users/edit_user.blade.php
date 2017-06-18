    {!!Form::model($user,['id'=>'formUpdateUser','route'=>['users.update',$user->id],'method'=>'PUT'])!!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" value="{{ $user->id }}" id="id">
    	@include('users.forms.users')
        {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
    {!!Form::close()!!}

{!!Html::script('js/mydatapicker.js')!!}