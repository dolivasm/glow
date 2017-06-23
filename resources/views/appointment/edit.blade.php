{!!Form::model($appointment,['id'=>'formEditAppointment','method'=>'PUT'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" value="{{ $appointment->id }}" id="id">
{{ Form::label('title', 'Servicio') }}
{{ Form::select('serviceId', $serviceId, null, array('required'=>'required','onchange'=>'changeServiceEditing(this);','id'=>'serviceId','class'=>'form-control','style'=>'' )) }}
</div>
<div class="form-group">
  {{ Form::label('date_start', 'Fecha') }}
  {{ Form::text('date_start', old('date_start'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
<div class="form-group">
  {{ Form::label('time_start', 'Hora') }}
  {{ Form::select('start', $time_start, null, array('required'=>'required','id'=>'start','class'=>'form-control','style'=>'' )) }}
</div>
@if (!Auth::guest())
         @if((Auth::user()->role_id)==1 ||(Auth::user()->id) ==$appointment->userId)
             {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'editSubmit'])!!}
            <a OnClick="cancelAppointment(this);" id="delete" data-href="{{ url('appointment') }}" data="" class="btn btn-normal-warning btn-block text-uppercase">Eliminar</a>
        @endif
    @endif

{!!Form::close()!!}