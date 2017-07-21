<!-- Modal -->
  <div class="modal fade" id="activateServiceModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Activar Servicio</h4>
        </div>
        <div class="modal-body">
             <div id="divToActivateService">
                      {!! Form::open(['url' => '#','id'=>'activateUserForm']) !!}
                      
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden"  id="idServiceToActivate" >
                            
                    <p>¿Desea activar el servicio <span id="nameServiceToActivate"></span>?</p>
                            
                    {!! Form::close() !!}
                     <button class="btn btn-danger-delete btn-block" data-dismiss="modal"><i    class="ion-thumbsdown"> NO</i></button>
                   
                    <button  id="activateServices" class='btn btn-normal-add btn-block'  OnClick="activateService()"><i class="ion-thumbsup">SI</i></button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>