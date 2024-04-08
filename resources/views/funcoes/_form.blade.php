@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($funcao))
    <form action="{{route('filial.funcao.update', [$filial, $funcao->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('filial.funcao.store', session('filial')->id)}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row col-md-12">
        @if(!isset($funcao))
            {{-- <div class="row"> --}}
                {{-- <div class="col-md-12">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="record-from-database" name="record_from_database">
                            <label for="record-from-database">Cadastrar usuário a partir do banco de dados de funcionários
                        </label>
                    </div>
                </div>
                <hr> --}}
            {{-- </div> --}}
        @endif
        <div class="col-md-4">
            <div class="form-group">
                <label for="nome">Nome da Função <span class="text-danger">*</span></label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($funcao)) ? $funcao->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="descricao">Descrição <span class="text-danger">*</span></label>
                <input type="text" name="descricao" class="form-control" id="descricao" value="{{(isset($funcao)) ? $funcao->descricao : old('descricao')}}" required>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label for="salario">Salário <span class="text-danger">*</span></label>
                <input type="text" name="salario" class="form-control" id="salario" value="{{(isset($funcao)) ? $funcao->salario : old('salario')}}" required>
            </div>
        </div> --}}
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label for="cod_gm">Cód GM</label>
                <input type="text" name="cod_gm" class="form-control" id="cod_gm"  value="{{(isset($funcao)) ? $funcao->cod_gm : old('senha')}}" required
                @if(isset($funcao) && session()->get('filial')->id != 1)
                    readonly    
                @endif>
            </div>
        </div> --}}
    </div>

    {{-- @if (isset($funcao))
    <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label for="data_admissao">Data atualização *</label>
                <input type="date" class="form-control" value="{{ $funcao->updated_at->format('Y-m-d') }}">
            </div>
        </div>
    </div>
    @endif --}}

    <hr>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-outline-success float-right ml-2">{!!(isset($funcao)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            <a href="{{route('filial.funcao.index')}}" class="btn btn-outline-danger float-right"><i class="fas fa-undo-alt"></i> CANCELAR</a>
        </div>
    </div>
</form>