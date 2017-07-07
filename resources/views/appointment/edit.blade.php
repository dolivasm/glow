{!!Form::model($appointment,['id'=>'formEditAppointment','method'=>'PUT'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" value="{{ $appointment->id }}" id="id">
<input type="hidden" value="{{ $appointment->start }}" id="tempStart">
  @if (!Auth::guest())
         @if((Auth::user()->role_id)==1)
         <div class="form-group">
        {{ Form::label('title', 'Cliente')}}
          @if (!$passDay)
        		{!!Form::select('userId', $userId, null, array('id'=>'userId','name'=>'userId','required'=>'required','class' => 'selectpicker form-control','data-live-search'=>'true'))!!}
        	  @else
        	    {!!Form::select('userId', $userId, null, array('id'=>'userId','name'=>'userId','required'=>'required','disabled','class' => 'selectpicker form-control'))!!}
        	@endif
      	</div>
        	@else
      	    <input type="hidden" name="userId" value="{{Auth::user()->id }}" id="userId">
          @endif
    @endif

<div class="form-group">
{{ Form::label('title', 'Servicio') }}
@if (!$passDay)
  {{ Form::select('serviceId', $serviceId, null, array('required'=>'required','onchange'=>'changeServiceEditing(this);','id'=>'serviceId','class'=>'selectpicker form-control' )) }}
  @else
    {{ Form::select('serviceId', $serviceId, null, array('required'=>'required','onchange'=>'changeServiceEditing(this);','id'=>'serviceId','disabled','class'=>'selectpicker form-control' )) }}
@endif
</div>

<div class="form-group">
  {{ Form::label('date_start', 'Fecha') }}
  {{ Form::text('date_start', old('date_start'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
<div class="form-group">
  {{ Form::label('time_start', 'Hora') }}
  @if (!$passDay)
    {{ Form::select('start', $time_start, null, array('required'=>'required','id'=>'start','class'=>'selectpicker form-control','data-size'=>'4' )) }}
    @else
      {{ Form::select('start', $time_start, null, array('required'=>'required','id'=>'start','disabled','class'=>'selectpicker form-control','data-size'=>'4')) }}
  @endif
</div>
@if (!Auth::guest())
         @if(((Auth::user()->role_id)==1 ||(Auth::user()->id) ==$appointment->userId) && $passDay!=true)
             {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'editAppointmentSubmit'])!!}
            <a OnClick="cancelAppointment(this);" id="delete" data-href="{{ url('appointment') }}" data="" class="btn btn-normal-warning btn-block text-uppercase">Eliminar</a>
        @endif
    @endif

{!!Form::close()!!}