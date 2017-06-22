   {!!Form::open(['id'=>'addAppointmentForm','class'=>'forms-add'])!!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
               <div class="form-group">
                        {{ Form::label('title', 'Servicio') }}
                        {{ Form::select('serviceId', $serviceId, null, array('onchange'=>'changeService(this);','id'=>'serviceId','class'=>'form-control','style'=>'' )) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_start', 'Fecha') }}
                                {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('time_start', 'Hora') }}
                                {{ Form::select('time_start', $time_start, null, array('id'=>'time_start','class'=>'form-control','style'=>'' )) }}
                            </div>
                        {!!  Form::submit('Guardar',['class' => 'btn btn-normal-add btn-block text-uppercase','id' => 'addSubmit'])!!}
                             
            {{ Form::close() }}