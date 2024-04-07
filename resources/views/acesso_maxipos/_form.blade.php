@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($acesso_maxipos))
    <form action="{{route('acesso_maxipos.update', [$acesso_maxipos->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('acesso_maxipos.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nome">Nome completo <span class="text-danger">*</span></label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($acesso_maxipos)) ? $acesso_maxipos->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="login">Mateus ID <span class="text-danger">*</span> <span class="small text-danger">(Somente números)</span></label>
                <input type="text" name="login" class="form-control" id="login" value="{{(isset($acesso_maxipos)) ? $acesso_maxipos->login : old('login')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="senha">Senha <span class="text-danger">*</span></label>
                <input type="text" name="senha" class="form-control" id="senha" value="{{(isset($acesso_maxipos)) ? $acesso_maxipos->senha : old('senha')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cod_gm">Cód GM</label>
                <input type="text" name="cod_gm" class="form-control" id="cod_gm"  value="{{(isset($acesso_maxipos)) ? $acesso_maxipos->cod_gm : old('senha')}}" required
                @if(isset($acesso_maxipos) && session()->get('filial')->id != 1)
                    readonly    
                @endif>
            </div>
        </div>
    </div>

    {{-- @if (isset($acesso_maxipos))
    <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label for="data_admissao">Data atualização *</label>
                <input type="date" class="form-control" value="{{ $acesso_maxipos->updated_at->format('Y-m-d') }}">
            </div>
        </div>
    </div>
    @endif --}}

    <hr>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-outline-success float-right ml-2">{!!(isset($acesso_maxipos)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            <a href="{{route('acesso_maxipos.index')}}" class="btn btn-outline-danger float-right"><i class="fas fa-undo-alt"></i> CANCELAR</a>
        </div>
    </div>
</form>