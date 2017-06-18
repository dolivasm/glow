   {!!Form::open(['id'=>'addNewsForm','class'=>'forms-add','files' => 'true'])!!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
     @include('news.forms.news')
     {!! Form::token() !!}
      {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
    {!!Form::close()!!}
