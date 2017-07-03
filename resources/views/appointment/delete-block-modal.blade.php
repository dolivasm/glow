<!-- Modal -->
  <div class="modal fade" id="deleteBlockHourModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¿Segura(o) que desea eliminar la la restricción seleccionada?</h4>
        </div>
        <div class="modal-body">
             <div class="divForDeleteBlock">
                      {!! Form::open(['url' => '#','id'=>'deleteRestriction']) !!}
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden"  id="Id">
                            
                    {!! Form::close() !!}
                     <button type="button" class="btn btn-normal-add btn-block" data-dismiss="modal"><i    class="ion-thumbsdown"> NO</i></button>
                   
                    <button  class='btn btn-danger-delete btn-block'  OnClick="acceptDeleteBlockHour();"><i class="ion-thumbsup"> </i> SI</button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>