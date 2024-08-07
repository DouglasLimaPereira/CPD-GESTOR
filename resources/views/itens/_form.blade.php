<form action="{{ route('filial.item.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-12">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" name="nome" value="{{isset($item) ? $item->nome : old('nome')}}" required>
            </div>
        </div>
        
        <div class="col-6">
            <div class="form-group">
                <label for="nome">Marca *</label>
                <input type="text" class="form-control" name="marca" value="{{isset($item) ? $item->marca : old('marca')}}" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="nome">Serial *</label>
                <input type="text" class="form-control" name="serial" value="{{isset($item) ? $item->serial : old('serial')}}" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="nome">Preço *</label>
                <input type="text" class="form-control" name="preco" value="{{isset($item) ? $item->preco : old('preco')}}" required>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                {{--  <label for="active"> Ativo *</label>
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
    </div>
    <hr>
    <a href="{{route('filial.item.index', $item->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($item)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
</form>