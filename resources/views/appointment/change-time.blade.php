<!-- Modal -->
  <div class="modal fade" id="changeTimeAppoitmentModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¿Segura(o) que desea realizar el cambio? La hora de inicio será cambiada para </h4><h4 class="modal-title" id="tag_time"></h4>
        </div>
        <div class="modal-body">
             <div class="divForChangeAppoitment">
                     <button type="button" class="btn btn-normal-add btn-block" data-dismiss="modal"><i    class="ion-thumbsdown"> NO</i></button>
                   
                    <button  class='btn btn-danger-delete btn-block'  OnClick="updateAppointment();"><i class="ion-thumbsup"> </i> SI</button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>