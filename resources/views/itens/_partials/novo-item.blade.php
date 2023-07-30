<div class="modal fade novo-item" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Novo Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{route('modulos.itens.store', $modulo->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" name="nome" value="{{isset($item) ? $item->nome : old('nome')}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="active">Ativo *</label>
                        <select name="active" id="active" class="form-control" required>
                            <option value="">Selecione...</option>
                            <option value="1" {{(isset($item) && $item->active == true) ? 'selected' : old('active')}}>SIM</option>
                            <option value="0" {{(isset($item) && $item->active == false) ? 'selected' : old('active')}}>NÃO</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    </form>
    </div>
    </div>
</div>
</div>
  