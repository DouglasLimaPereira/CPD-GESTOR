<div class="modal fade" id="edit_escala" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              {{-- 
              <dl class="row">
                <dt class="col-sm-3">Description lists</dt>
                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
              </dl>
              --}}

                <div class="col-md-12">
                  <div class="form-gruop">
                      <label for="">ID</label>
                      <input type="text" name="id" class="form-control" class="evento" id="id" value="{{old('evento')}}" required>
                  </div>
                </div>

                <div class="col-md-12">
                    <div class="form-gruop">
                        <label for="">Evento <span class="text-danger">*</span></label>
                        <input type="text" min="3" name="evento" class="form-control" class="evento" id="title" value="{{old('evento')}}" required>
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
                        <input type="datetime" min="3" name="data_fim" class="form-control" class="data_fim" id="data_fim" value="{{old('data_fim')}}" required>
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


<div class="modal fade" id="cad_escala" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"> Cadastrar escala do dia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('escala.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
              <div class="form-gruop col">
                  <label for="">Evento <span class="text-danger">*</span></label>
                  <select name="evento" class="form-control" id="evento" required>
                    <option value="">Selecione</option>
                    <option value="Folga">Folga</option>
                    <option value="Folga Feriado">Folga Feriado</option>
                    <option value="Folga de Aniversário">Folga de Aniversário</option>
                    <option value="DSR">DSR</option>
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="form-gruop col">
                  <label for="data_inicio">Data de Inicio <span class="text-danger">*</span></label>
                  <input class="form-control" type="date" min="" max="" id="data_inicio" name="data_inicio" required readonly>
              </div>
              <div class="form-gruop col">
                <label for="">Hora <span class="text-danger">*</span></label>
                <input class="form-control" type="time" min="6:40" max="23:25" id="hora_inicio" name="hora_inicio" required>
              </div>
          </div>
          <div class="row">
            <div class="form-gruop col">
                <label for="data_fim">Data Final <span class="text-danger">*</span></label>
                <input class="form-control" type="date" min="" id="data_fim" name="data_fim" required>
            </div>
          
            <div class="form-gruop col">
              <label for="">Hora <span class="text-danger">*</span></label>
              <input class="form-control" type="time" min="6:40" max="23:25" id="hora_fim" name="hora_fim" required>
            </div>
          </div>
          <hr>
          <span class="modal-footer text-danger">( * ) Campos Obrigatórios</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
    </div>
  </div>
</div>