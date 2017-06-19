<!-- Modal to add news-->
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
              <p>Cargando contenido.</p>
               {{ Form::open(['route' => 'appointment.store', 'method' => 'post', 'role' => 'form']) }}
               
               <div class="form-group">
                                {{ Form::label('title', 'Servicio') }}
                                {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_start', 'Fecha') }}
                                {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('time_start', 'HORA INICIO') }}
                                {{ Form::text('time_start', old('time_start'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_end', 'FECHA HORA FIN') }}
                                {{ Form::text('date_end', old('date_end'), ['class' => 'form-control']) }}
                            </div>
                             {!! Form::submit('GUARDAR', ['class' => 'btn btn-normal-add btn-block']) !!}
                             
            {{ Form::close() }}
          </div>
        <button type="button" class="btn btn-danger-delete btn-block text-uppercase" data-dismiss="modal">Cancelar</button>
      </div>

    </div>

  </div>
</div>