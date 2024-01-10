<form action="{{route('modulos.itens.update', [$modulo->id, $item->id])}}" method="POST">
    @csrf
    @method('PUT')
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
    <hr>
    <a href="{{route('modulos.itens.index', $modulo->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($item)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>