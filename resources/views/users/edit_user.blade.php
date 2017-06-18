<div class="div-dark">
    {!!Form::model($user,['id'=>'formUpdateUser','route'=>['users.update',$user->id],'method'=>'PUT'])!!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" value="{{ $user->id }}" id="id">
    	@include('users.forms.users')
        {!!link_to('#', $title='Actualizar', $attributes = ['OnClick'=>'editUserPut()', 'class'=>'btn btn-normal-add btn-block'], $secure = null)!!}
    {!!Form::close()!!}
</div>

{!!Html::script('js/mydatapicker.js')!!}