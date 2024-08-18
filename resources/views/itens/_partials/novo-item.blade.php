<div class="modal fade novo-item" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Novo Equipamento</h5>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{route('filial.item.store')}}" method="POST">
            @csrf
            <div class="row">
                {{--  <div class="col-md-12">  --}}
                <div class="col-12">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text bg-info">Nome *</span>
                        <input type="text" class="form-control" name="nome" value="{{isset($item) ? $item->nome : old('nome')}}" required>
                      </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text bg-info">Marca *</span>
                        <input type="text" class="form-control" name="marca" value="{{isset($item) ? $item->marca : old('marca')}}" required>
                      </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text bg-info">Serial *</span>
                        <input type="text" class="form-control" name="serial" value="{{isset($item) ? $item->serial : old('serial')}}" required>
                      </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text bg-info">Preço *</span>
                            <input type="text" class="form-control" name="preco" value="{{isset($item) ? $item->preco : old('preco')}}" required>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        {{--  <label for="active">Ativo *</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="1" {{(isset($item) && $item->active == true) ? 'selected' : old('active')}}>SIM</option>
                            <option value="0" {{(isset($item) && $item->active == false) ? 'selected' : old('active')}}>NÃO</option>
                        </select>  --}}
                        <label for="descricao">Descrição *</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="5">{{isset($item) ? $item->descricao : old('descricao')}}</textarea>
                    </div>
                </div>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Cancelar</button>
        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Salvar</button>
    </form>
    </div>
    </div>
</div>
</div>
  