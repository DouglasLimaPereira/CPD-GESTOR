@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($row))
    <form action="{{route('acesso_maxipos.update', [$row->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('acesso_maxipos.store', $row->id)}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($row)) ? $row->nome : old('nome')}}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nome">Email *</label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($row)) ? $row->email : old('email')}}" required>
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em>DADOS ADIMISSIONAIS</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="matricula">Matrícula *</label>
                <input type="text" name="matricula" placeholder="Insira a Matricula" class="form-control" id="matricula" value="{{(isset($row)) ? $row->matricula : old('matricula')}}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="situacao_admissional">Função *</label>
                <select name="funcao_id" id="funcao_id" class="form-control" required>
                    <option value="">Selecione a Função</option>
                    @foreach ($funcoes as $item)
                        <option value="{{ $item->id }}" {{(( isset( $row ) && ( $item->id == $row->funcoes()->firstWhere('active', 1)->funcao_id)) ? 'selected': '')}}>{{$item->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="situacao_admissional">Situação *</label>
                <select name="situacao_admissional" id="situacao_admissional" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{((isset($row) && $row->situacao_admissional == 1) ? 'selected' : '')}}>Ativo</option>
                    <option value="0" {{((isset($row) && $row->situacao_admissional == 0) ? 'selected' : '')}}>Demitido</option>
                </select>
            </div>
        </div>
        <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label for="data_admissao">Data admissão *</label>
                <input type="date" name="data_admissao" class="form-control" id="data_admissao" value="{{(isset($row)) ? $row->data_admissao : old('data_admissao')}}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="data_demissao">Data demissão</label>
                <input type="date" name="data_demissao" class="form-control" id="data_demissao" value="{{(isset($row)) ? $row->data_demissao : old('data_demissao')}}">
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        @if(isset($acesso_sistema) && $acesso_sistema)
            <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input custom-control-input-danger" type="checkbox" id="bloquear_acesso" name="bloquear_acesso">
                    <label for="bloquear_acesso" class="custom-control-label text-danger">Bloquear acesso ao sistema?</label>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input custom-control-input-info" type="checkbox" id="cadastrar_como_usuario" name="cadastrar_como_usuario">
                    <label for="cadastrar_como_usuario" class="custom-control-label text-info">Tornar este Funcionário usuario do Sistema?</label>
                </div>
            </div>
        @endif
    </div>

    <hr>
    @if(isset($row))
        @if ($company->canteiros()->where('funcionario_id', $row->id)->count() > 0)
            <div class="card">
                <div class="card-header bg-primary">
                    Funcionário vinculado a um ou mais canteiros como GERENTE:
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($company->canteiros()->where('funcionario_id', $row->id)->get() as $item)
                            <li class="list-group-item">{{$item->nome}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endif

    <hr>
    <a href="{{route('acesso_maxipos.index', $company->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($row)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>