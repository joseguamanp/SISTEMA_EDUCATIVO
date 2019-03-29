    <div class="modal fade" id="prerequisitos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Pre- Requisitos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" id="id">
            <div class="form-group">
              <p class="text-primary">Elegir Nivel</p>
              <select class="form-control" id="nivel"></select>
            </div>
            <div class="form-group">
              <p class="text-primary">Elegir Materia</p>
              <div id="chebox">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            {!!link_to('#',$title='Guardar',$attributes=['id'=>'guardar','class'=>'btn btn-success'], $secure=null)!!}
          </div>
        </div>
      </div>
    </div>