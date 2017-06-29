{!!Form::open(['id'=>'formUpdateSchedule'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
@foreach($schedules as $schedule)
    @if($schedule->id==1)
        <div class="form-group">
          {{ Form::label('openStart', 'Abrir Local*') }}
          {{ Form::text('openStart', $schedule->start, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
        </div>
        <div class="form-group">
          {{ Form::label('openEnd', 'Cerrar Local*') }}
          {{ Form::text('openEnd', $schedule->end, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
        </div>
        @else
            @if($schedule->id==2)
                <div class="form-group">
                  {{ Form::label('lunchStart', 'Inicia Almuerzo*') }}
                  {{ Form::text('lunchStart', $schedule->start, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
                </div>
                
                <div class="form-group">
                  {{ Form::label('lunchEnd', 'Finaliza Almuerzo*') }}
                  {{ Form::text('lunchEnd', $schedule->end, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
                </div>
            @endif
         <div class="form-group">
                  {{ Form::label('info', 'La hora se selecciona en un formato de 24h con la secuencia de HH:mm') }}
                </div>
    @endif
@endforeach

{!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'updateSubmitSchedule'])!!}
{{ Form::close() }}
