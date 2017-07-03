         {!!Form::model($restriction,['id'=>'editblockHoursForm','method'=>'PUT'])!!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
              <input type="hidden" name="id" value="" id="Id">
              <div class="form-group">
              {{ Form::label('title', 'Razón') }}
              @if (!Auth::guest())
                     @if((Auth::user()->role_id)==1 && $passDay==false)
                          {{ Form::text('title', null, ['required'=>'required','class' => 'form-control','placeholder' => 'Ejem: Cerrado']) }}
                          @else
                          {{ Form::text('title', null, ['required'=>'required', 'readonly' => 'true','class' => 'form-control','placeholder' => 'Ejem: Cerrado']) }}
                     @endif
              @endif
              
            </div>
            <div class="form-group">
              {{ Form::label('start', 'Bloquear Desde') }}
              {{ Form::text('start',null, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
            </div>
            <div class="form-group">
              {{ Form::label('end', 'Bloquear Hasta') }}
              {{ Form::text('end',null, ['required'=>'required','class' => 'form-control', 'readonly' => 'true']) }}
            </div>
            @if (!Auth::guest())
                     @if((Auth::user()->role_id)==1 && $passDay==false)
                      {!!  Form::submit('Actualizar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'editBlockHourSubmit'])!!}
                        <a OnClick="deleteBlockHour(this);" id="delete" data-href="{{ url('deleteRestriction') }}" data="" class="btn btn-normal-warning btn-block text-uppercase">Eliminar</a>
                    @endif
                @endif

  {!!Form::close()!!}