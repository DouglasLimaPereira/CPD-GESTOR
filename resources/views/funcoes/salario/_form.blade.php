@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($salario))
    <form action="{{route('filial.salario.update', [$funcao, $salario->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('filial.salario.store', $funcao)}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row col-md-12">
        <div class="col-md-4">
            <label for="valor">Valor Salário <span class="text-danger">*</span></label>
            <div class="input-group mb-4">
                <span class="input-group-text">R$</span>
                <input type="text" name="valor" class="form-control" id="valor" value="{{(isset($salario)) ? $salario->valor : old('valor')}}" required>
            </div>
        </div>

        @if (isset($salario))
        <div class="col-md-4">
            <div class="form-group">
                <label for="data_admissao">Data atualização *</label>
                <input type="date" class="form-control" value="{{ $salario->data_atualizacao }}" readonly>
            </div>
        </div>
        @endif
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-outline-success float-right ml-2">{!!(isset($salario)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            <a href="{{route('filial.funcao.index')}}" class="btn btn-outline-danger float-right"><i class="fas fa-undo-alt"></i> CANCELAR</a>
        </div>
    </div>
</form>