@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($filial))
    <form action="{{route('filial.update', $filial->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('filial.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-info">
                <b>Código: </b> SM{{$filial->codigo}}<br>
                <b>Nome Fantasia:</b> {{$filial->nome_fantasia}}<br>
                <b>Razão Social: </b> {{$filial->razao_social}}<br>
                <b>CNPJ: </b> <span class="cnpj-view" id="cnpj-view">{{$filial->cnpj}}</span><br>
                {{-- <b>Estado: </b> {!!($filial->estado) ? '<span class="badge badge-pill badge-primary">Ativo</span>' : '<span class="badge badge-pill badge-secondary">Inativo</span>'!!} --}}
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">   
                <label for="logotipo">Logo</label>
                <input type="file" accept=".jpeg, .png, .jpg, .gif, .svg" name="logo" class="form-control" id="logo">
                <small class="text-info">Formatos permitidos: .jpeg, .png, .jpg, .gif, .svg.</small>
                @if (isset($filial) && ($filial->logo))
                    <br>
                    <img src="{{url('/')}}/storage/{{$filial->logo}}" width="150">
                @endif
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-map-marked-alt"></i> ENDEREÇO</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="cep">CEP *</label>
                <input type="text" name="cep" class="form-control" id="cep" value="{{(isset($filial)) ? $filial->cep : old('cep')}}" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="logradouro">Logradouro *</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro" value="{{(isset($filial)) ? $filial->logradouro : old('logradouro')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numero">Número *</label>
                <input type="text" name="numero" class="form-control" id="numero" value="{{(isset($filial)) ? $filial->numero : old('numero')}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" class="form-control" value="{{(isset($filial)) ? $filial->complemento : old('complemento')}}" id="complemento">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="bairro">Bairro *</label>
                <input type="text" name="bairro" class="form-control" id="bairro" value="{{(isset($filial)) ? $filial->bairro : old('bairro')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cidade">Cidade *</label>
                <input type="text" name="cidade" class="form-control" id="cidade" value="{{(isset($filial)) ? $filial->cidade : old('cidade')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="uf">UF *</label>
                <select name="uf" id="uf" class="form-control" value="{{old('uf')}}" required>
                    <option value="">Selecione...</option>
                    @foreach ($estados as $item)
                        <option value="{{$item->uf}}" {{(isset($filial) && $filial->uf == $item->uf) ? 'selected' : ''}}>{{$item->uf}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-address-book"></i> DADOS DE CONTATO</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{(isset($filial)) ? $filial->telefone : old('telefone')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="website">Website *</label>
                <input type="text" name="site" class="form-control" id="site" value="{{(isset($filial)) ? $filial->site : old('site')}}" required>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="whatsapp">Whatsapp *</label>
                <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="{{(isset($filial)) ? $filial->whatsapp : old('whatsapp')}}" required>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-mail SAC *</label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($filial)) ? $filial->email : old('email')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" id="instagram" value="{{(isset($filial)) ? $filial->instagram : old('instagram')}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email_comercial">E-mail comercial *</label>
                <input type="email" name="email_comercial" class="form-control" id="email_comercial" value="{{(isset($filial)) ? $filial->email_comercial : old('email_comercial')}}" required>
            </div>
        </div>
    </div>

    <hr>
    <div class="text-right">
        <a href="{{route('filial.index', $filial->id)}}" class="btn btn-outline-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>    
        
        <button type="submit" class="btn btn-outline-success">{!!(isset($filial)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
    </div>
  </form>