<!-- Modal -->
  <div class="modal fade" id="optionsAppoitmentModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¿Qué acción desea realizar?</h4>
        </div>
        <div class="modal-body">
             <div class="divForOptionsAppoitment">
                      {!! Form::open(['url' => '#','id'=>'adminOptions']) !!}
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden"  id="start">
                            <input type="hidden"  id="end">
                            
                    {!! Form::close() !!}
                     <button  class='btn btn-normal-add btn-block text-uppercase'  OnClick="doReservation();">
                       <i class="ion-thumbsup"> </i> Agregar Reservación</button>
                    <button  class='btn btn-normal-add btn-block text-uppercase'  OnClick="blockHours();">
                      <i class="ion-thumbsup"> </i> Bloquear Horas</button>
                    <!--<button  class='btn btn-normal-add btn-block text-uppercase'  OnClick="blockDay();">-->
                    <!--  <i class="ion-thumbsup"> </i> Bloquear día completo</button>-->
            </div>
        </div>

      </div>
    </div>
  </div>
</div>