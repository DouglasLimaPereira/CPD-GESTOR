@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (isset($ponto))
    <form method="POST" action="{{ route('ponto.update', $ponto->id) }}" enctype="multipart/form-data">
    @method('PUT')
@else
    <form method="POST" action="{{ route('ponto.store') }}" enctype="multipart/form-data">
@endif
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="data">Data <span class="text-danger">*</span></label>
                <input type="date" name="data" class="form-control" id="data" value="{{(isset($ponto)) ? $ponto->data : date('d/m/Y')}}" required>
                @error('data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <label for="dsr">DSR ? <span class="text-danger">*</span></label>
                <select class="form-control" name="dsr" id="dsr" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{ (isset($ponto) && $ponto->dsr == 1) ? 'selected' : '' }} >SIM</option>
                    <option value="0" {{ (isset($ponto) && $ponto->dsr == 0) ? 'selected' : '' }} >NÃO</option>
                </select>

                @error('dsr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="entrada">Entrada</label>
                <input type="time" name="entrada" class="form-control" value="{{isset($ponto) ? $ponto->entrada : old('entrada')}}">
                @error('entrada')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="entrada_almoco">Entrada Almoço</label>
                <input class="form-control" id="entrada_almoco" type="time" name="entrada_almoco" value="{{isset($ponto) ? $ponto->entrada_almoco : old('entrada_almoco')}}">

                @error('entrada_almoco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="comprovante1">Comprovante N° 1</label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="form-control" type="file" name="comprovante1" accept="image/png, image/jpeg, image/jpg">
                @error('comprovante1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante1))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante1}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante1}}" width="150">
                    </a>
                @endif
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="comprovante2">Comprovante N° 2</label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="form-control" type="file" name="comprovante2" accept="image/png, image/jpeg, image/jpg">
                @error('comprovante2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante2))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante2}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante2}}" width="150">
                    </a>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="row">    
        <div class="col-md-5">
            <div class="form-group">
                <label for="saida_almoco">Saída Almoço</label>
                <input class="form-control" id="saida_almoco" type="time" name="saida_almoco" value="{{isset($ponto) ? $ponto->saida_almoco : old('saida_almoco')}}">

                @error('saida_almoco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante3))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante3}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante3}}" width="150">
                    </a>
                @endif
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="saida">Saída</label>
                <input class="form-control" id="saida" type="time" name="saida" value="{{isset($ponto) ? $ponto->saida : old('saida')}}">

                @error('saida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante4))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante4}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante4}}" width="150">
                    </a>
                @endif
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="comprovante3">Comprovante N° 3</label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="form-control" type="file" name="comprovante3" accept="image/png, image/jpeg, image/jpg">
                @error('comprovante3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante3))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante3}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante3}}" width="150">
                    </a>
                @endif
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="comprovante4">Comprovante N° 4</label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="form-control" type="file" name="comprovante4" accept="image/png, image/jpeg, image/jpg">
                @error('comprovante4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (isset($ponto) && ($ponto->comprovante4))
                    <br>
                    <a href="{{url('/')}}/storage/{{$ponto->comprovante4}}" target="_blank">
                        <img src="{{url('/')}}/storage/{{$ponto->comprovante4}}" width="150">
                    </a>
                @endif
            </div>
        </div>
    </div>
{{-- 
    <h5 class="mt-3"><em>DADOS ADIMISSIONAIS</em></h5>
    <hr> --}}

    {{-- <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="matricula">Matrícula *</label>
                <input type="text" name="matricula" placeholder="Insira a Matricula" class="form-control" id="matricula" value="{{(isset($funcionario)) ? $funcionario->matricula : old('matricula')}}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="situacao_admissional">Função *</label>
                <select name="funcao_id" id="funcao_id" class="form-control" required>
                    <option value="">Selecione a Função</option>
                    @foreach ($funcoes as $item)
                        <option value="{{ $item->id }}" {{(( isset( $funcionario ) && ( $item->id == $funcionario->funcoes()->firstWhere('active', 1)->funcao_id)) ? 'selected': '')}}>{{$item->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="situacao_admissional">Situação *</label>
                <select name="situacao_admissional" id="situacao_admissional" class="form-control" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{((isset($funcionario) && $funcionario->situacao_admissional == 1) ? 'selected' : '')}}>Ativo</option>
                    <option value="0" {{((isset($funcionario) && $funcionario->situacao_admissional == 0) ? 'selected' : '')}}>Demitido</option>
                </select>
            </div>
        </div>
        <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label for="data_admissao">Data admissão *</label>
                <input type="date" name="data_admissao" class="form-control" id="data_admissao" value="{{(isset($funcionario)) ? $funcionario->data_admissao : old('data_admissao')}}" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="data_demissao">Data demissão</label>
                <input type="date" name="data_demissao" class="form-control" id="data_demissao" value="{{(isset($funcionario)) ? $funcionario->data_demissao : old('data_demissao')}}">
            </div>
        </div>
        </div>
    </div> --}}

    {{-- <div class="row">
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
    </div> --}}

    <hr>
    <span class="text-danger">( * ) Campos Obrigatórios</span>
    {{-- @if(isset($funcionario))
        @if ($company->canteiros()->where('funcionario_id', $funcionario->id)->count() > 0)
            <div class="card">
                <div class="card-header bg-primary">
                    Funcionário vinculado a um ou mais canteiros como GERENTE:
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($company->canteiros()->where('funcionario_id', $funcionario->id)->get() as $item)
                            <li class="list-group-item">{{$item->nome}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endif --}}

    <hr>
    <a href="{{route('ponto.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($ponto)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>