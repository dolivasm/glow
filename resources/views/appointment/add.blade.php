{!!Form::open(['id'=>'addAppointmentForm','class'=>'forms-add'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

  @if (!Auth::guest())
         @if((Auth::user()->role_id)==1)
         <div class="form-group">
        {{ Form::label('title', 'Usuario') }}
      		{!!Form::select('userId', $userId, null, array('id'=>'userId','name'=>'userId','required'=>'required','class' => 'selectpicker form-control','data-live-search'=>'true'))!!}
      	</div>
      	@else
      	  <input type="hidden" name="userId" value="{{Auth::user()->id }}" id="userId">
        @endif
    @endif

<div class="form-group">
  {{ Form::label('title', 'Servicio') }}
  {{ Form::select('serviceId', $serviceId, null, array('required'=>'required','onchange'=>'changeService($("#addAppointmentForm #serviceId"));','id'=>'serviceId','class'=>'selectpicker form-control','style'=>'' )) }}
</div>
<div class="form-group">
  {{ Form::label('date_start', 'Fecha') }}
  {{ Form::text('date_start', old('date_start'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
<div class="form-group">
  {{ Form::label('time_start', 'Hora') }}
  {{ Form::select('time_start', $time_start, null, array('required'=>'required','id'=>'time_start','class'=>'selectpicker form-control','data-size'=>'4' )) }}
</div>
{!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addAppointmentSubmit'])!!}
{{ Form::close() }}
