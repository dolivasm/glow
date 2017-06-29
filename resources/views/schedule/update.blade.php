{!!Form::open(['id'=>'formUpdateSchedule'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


<div class="form-group">
  {{ Form::label('openStart', 'Fecha') }}
  {{ Form::text('openStart', old('openStart'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>
<div class="form-group">
  {{ Form::label('openEnd', 'Fecha') }}
  {{ Form::text('openEnd', old('openEnd'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>

<div class="form-group">
  {{ Form::label('lunchStart', 'Fecha') }}
  {{ Form::text('lunchStart', old('lunchStart'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>

<div class="form-group">
  {{ Form::label('lunchEnd', 'Fecha') }}
  {{ Form::text('lunchEnd', old('lunchEnd'), ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
</div>




{!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
{{ Form::close() }}
