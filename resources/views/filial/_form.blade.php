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
    @if (isset($filial))    
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
    @else
    <h5 class="mt-3"><em><i class="nav-icon fas fa-store fa-lg"></i> INFORMAÇÕES FILIAL</em></h5>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="codigo">Código <span class="text-danger">*</span></label>
                <input type="text" name="codigo" class="form-control" id="codigo" value="{{(isset($filial)) ? $filial->codigo : old('codigo')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="nome_fantasia">Nome Fantasia <span class="text-danger">*</span></label>
                <input type="text" name="nome_fantasia" class="form-control" id="nome_fantasia" value="{{(isset($filial)) ? $filial->nome_fantasia : old('nome_fantasia')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="razao_social">Razão social <span class="text-danger">*</span></label>
                <input type="text" name="razao_social" class="form-control" id="razao_social" value="{{(isset($filial)) ? $filial->razao_social : old('razao_social')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cnpj">Cnpj <span class="text-danger">*</span></label>
                <input type="text" name="cnpj" class="form-control" id="cnpj" value="{{(isset($filial)) ? $filial->cnpj : old('cnpj')}}" required>
            </div>
        </div>
    </div>
    @endif
    
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
                <label for="cep">CEP <span class="text-danger">*</span></label>
                <input type="text" name="cep" class="form-control" id="cep" value="{{(isset($filial)) ? $filial->cep : old('cep')}}" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="logradouro">Logradouro <span class="text-danger">*</span></label>
                <input type="text" name="logradouro" class="form-control" id="logradouro" value="{{(isset($filial)) ? $filial->logradouro : old('logradouro')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numero">Número <span class="text-danger">*</span></label>
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
                <label for="bairro">Bairro <span class="text-danger">*</span></label>
                <input type="text" name="bairro" class="form-control" id="bairro" value="{{(isset($filial)) ? $filial->bairro : old('bairro')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cidade">Cidade <span class="text-danger">*</span></label>
                <input type="text" name="cidade" class="form-control" id="cidade" value="{{(isset($filial)) ? $filial->cidade : old('cidade')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="uf">UF <span class="text-danger">*</span></label>
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
                <label for="telefone">Telefone <span class="text-danger">*</span></label>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{(isset($filial)) ? $filial->telefone : old('telefone')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="website">Website <span class="text-danger">*</span></label>
                <input type="text" name="site" class="form-control" id="site" value="{{(isset($filial)) ? $filial->site : old('site')}}" required>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="whatsapp">Whatsapp <span class="text-danger">*</span></label>
                <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="{{(isset($filial)) ? $filial->whatsapp : old('whatsapp')}}" required>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-mail SAC <span class="text-danger">*</span></label>
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
                <label for="email_comercial">E-mail comercial <span class="text-danger">*</span></label>
                <input type="email" name="email_comercial" class="form-control" id="email_comercial" value="{{(isset($filial)) ? $filial->email_comercial : old('email_comercial')}}" required>
            </div>
        </div>
    </div>
        
    <h5 class="mt-3" {{isset($filial) ? 'hidden' : ''}}><em><i class="fa-solid fa-gears"></i> CONFIGURAÇÕES ADICIONAIS</em></h5>
    
    <hr {{isset($filial) ? 'hidden' : ''}}>
    <div class="row" {{isset($filial) ? 'hidden' : ''}}>
        <div class="col-md-3">
            <div class="form-group">
                <label for="quantidade_pdv">Quantidade PDV <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_pdv" class="form-control" id="quantidade_pdv" value="{{(isset($filial)) ? $filial->quantidade_pdv : old('quantidade_pdv')}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="quantidade_rack">Quantidade de Rack <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_rack" class="form-control" id="quantidade_rack" value="{{(isset($filial)) ? $filial->quantidade_rack : old('quantidade_rack')}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="quantidade_desktop">Quantidade de Desktop <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_desktop" class="form-control" id="quantidade_desktop" value="{{(isset($filial)) ? $filial->quantidade_desktop : old('quantidade_desktop')}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Consultores <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
    </div>
    
    <h5 class="mt-3" {{isset($filial) ? 'hidden' : ''}}><em><i class="fa-solid fa-scale-balanced"></i> BALANÇAS</em></h5>
    
    <hr {{isset($filial) ? 'hidden' : ''}}>
    <div class="row" {{isset($filial) ? 'hidden' : ''}}>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Frente de Loja <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_pdv">Quantidade de Balanças Padaria <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_pdv" class="form-control" id="quantidade_pdv" value="{{(isset($filial)) ? $filial->quantidade_pdv : old('quantidade_pdv')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_rack">Quantidade de Balanças Açougue <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_rack" class="form-control" id="quantidade_rack" value="{{(isset($filial)) ? $filial->quantidade_rack : old('quantidade_rack')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_desktop">Quantidade de Balanças Peixaria <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_desktop" class="form-control" id="quantidade_desktop" value="{{(isset($filial)) ? $filial->quantidade_desktop : old('quantidade_desktop')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Frios <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Horti <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Pescoço <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Aerea <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_consultor">Quantidade de Balanças Doca <span class="text-danger">*</span></label>
                <input type="text" name="quantidade_consultor" class="form-control" id="quantidade_consultor" value="{{(isset($filial)) ? $filial->quantidade_consultor : old('quantidade_consultor')}}">
            </div>
        </div>
    </div>
    
    <hr>
    <div class="text-right">
        <a href="{{route('filial.index', session()->get('filial')->id)}}" class="btn btn-outline-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>    
        
        <button type="submit" class="btn btn-outline-success">{!!(isset($filial)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
    </div>
  </form>