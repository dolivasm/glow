   {!!Form::open(['id'=>'addServicesForm','class'=>'forms-add','files' => 'true'])!!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
     @include('services.forms.services')
     {!! Form::token() !!}
      {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block','id' => 'addSubmit'])!!}
    {!!Form::close()!!}
