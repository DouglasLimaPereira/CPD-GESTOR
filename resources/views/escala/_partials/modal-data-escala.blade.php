<div class="modal fade" id="data_escala" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-gruop">
                        <label for="">Evento <span class="text-danger">*</span></label>
                        <input type="text" min="3" name="evento" class="form-control" class="evento" id="evento" value="{{old('evento')}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-gruop">
                        <label for="">Data Inicio <span class="text-danger">*</span></label>
                        <input type="datetime" min="3" name="data_inicio" class="form-control" class="data_inicio" id="data_inicio" value="{{old('data_inicio')}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-gruop">
                        <label for="">Data Final <span class="text-danger">*</span></label>
                        <input type="datetime-local" min="3" name="data_fim" class="form-control" class="data_fim" id="data_fim" value="{{old('data_fim')}}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
</div>