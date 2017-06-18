<div class="div-dark">
    {!!Form::open(['id'=>'addUserForm','class'=>'forms-add','files' => 'true'])!!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        @include('users.forms.users')
        {!!link_to('#', $title='Guardar', $attributes = ['OnClick'=>'postUser()', 'class'=>'btn btn-normal-add btn-block'], $secure = null)!!}
    {!!Form::close()!!}
</div>

{!!Html::script('js/mydatapicker.js')!!}
