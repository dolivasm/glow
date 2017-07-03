{!!Form::open(['id'=>'blockHoursForm','class'=>'forms-add'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

<div class="form-group">
  {{ Form::label('title', 'Razón') }}
  {{ Form::text('title', old('title'), ['required'=>'required','class' => 'form-control','placeholder' => 'Ejem: Cerrado']) }}
</div>
<div class="form-group">
  {{ Form::label('date_start', 'Bloquear Desde') }}
  {{ Form::text('date_start', old('date_start'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
<div class="form-group">
  {{ Form::label('date_end', 'Bloquear Hasta') }}
  {{ Form::text('date_end', old('date_end'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
{!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmitBlockHuor'])!!}
{{ Form::close() }}
