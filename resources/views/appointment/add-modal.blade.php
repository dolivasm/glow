<!-- Modal to add appointments-->
<div id="addAppointmentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reservar una nueva cita</h4>
      </div>
      <div class="modal-body">
          <div id="divForAddAppointment">
               {{ Form::open(['route' => 'appointment.store', 'method' => 'post', 'role' => 'form']) }}
               
               <div class="form-group">
                                {{ Form::label('title', 'Servicio') }}
                                {{ Form::select('serviceId', $serviceId, null, array('class'=>'form-control','style'=>'' )) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_start', 'Fecha') }}
                                {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('time_start', 'Hora') }}
                                {{ Form::select('time_start', array('09:00' => '9:00', '10:00' => '10:00','11:00' => '11:00', '14:00' => '14:00'), null, array('class'=>'form-control','style'=>'' )) }}
                            </div>

                             {!! Form::submit('GUARDAR', ['class' => 'btn btn-normal-add btn-block']) !!}
                             
            {{ Form::close() }}
          </div>
        <button type="button" class="btn btn-danger-delete btn-block text-uppercase" data-dismiss="modal">Cancelar</button>
      </div>

    </div>

  </div>
</div>