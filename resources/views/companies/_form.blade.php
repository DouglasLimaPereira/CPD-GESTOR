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
    <form action="{{route('construtoras.update', $row->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('construtoras.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">   
                <label for="razao_social">Razão Social *</label>
                <input type="text" name="razao_social" class="form-control" id="razao_social" value="{{(isset($row)) ? $row->razao_social : old('razao_social')}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">   
                <label for="estado">Estado *</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="1" {{((isset($row) && $row->estado == 1) ? 'selected' : '')}}>Ativo</option>
                    <option value="0" {{((isset($row) && $row->estado == 0) ? 'selected' : '')}}>Inativo</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">   
                <label for="nome_fantasia">Nome Fantasia *</label>
                <input type="text" name="nome_fantasia" class="form-control" id="nome_fantasia" value="{{(isset($row)) ? $row->nome_fantasia : old('nome_fantasia')}}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">   
                <label for="cnpj">CNPJ *</label>
                <input type="text" name="cnpj" class="form-control" id="cnpj" value="{{(isset($row)) ? $row->cnpj : old('cnpj')}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">   
                <label for="logotipo">Logotipo</label>
                <input type="file" accept=".jpeg, .png, .jpg, .gif, .svg" name="logotipo" class="form-control" id="logotipo">
                <small class="text-info">Formatos permitidos: .jpeg, .png, .jpg, .gif, .svg.</small>
                @if (isset($company) && ($company->logotipo))
                    <br>
                    @if($company->logo_origem == 'c')
                        <img src="{{env('APP_URL_CLIENTE')}}/storage/{{$company->logotipo}}" width="150">
                    @elseif($company->logo_origem == 'g')
                        <img src="{{url('/')}}/storage/{{$company->logotipo}}" width="150">
                    @endif
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
                <input type="text" name="cep" class="form-control" id="cep" value="{{(isset($row)) ? $row->cep : old('cep')}}" required>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="logradouro">Logradouro *</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro" value="{{(isset($row)) ? $row->logradouro : old('logradouro')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numero">Número *</label>
                <input type="text" name="numero" class="form-control" id="numero" value="{{(isset($row)) ? $row->numero : old('numero')}}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" class="form-control" value="{{(isset($row)) ? $row->complemento : old('complemento')}}" id="complemento">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="bairro">Bairro *</label>
                <input type="text" name="bairro" class="form-control" id="bairro" value="{{(isset($row)) ? $row->bairro : old('bairro')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cidade">Cidade *</label>
                <input type="text" name="cidade" class="form-control" id="cidade" value="{{(isset($row)) ? $row->cidade : old('cidade')}}" required>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="uf">UF *</label>
                <select name="uf" id="uf" class="form-control" value="{{old('uf')}}" required>
                    <option value="">Selecione...</option>
                    @foreach ($estados as $item)
                        <option value="{{$item->uf}}" {{(isset($row) && $row->uf == $item->uf) ? 'selected' : ''}}>{{$item->uf}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-tools"></i> CONFIGURAÇÕES</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="limite_anexo">Limite do anexo *</label>
                <input type="text" name="limite_anexo" class="form-control" id="limite_anexo" value="{{(isset($row)) ? $row->limite_anexo : old('limite_anexo')}}" required>
            </div>
        </div>
    </div>

    <h5 class="mt-3"><em><i class="fas fa-address-book"></i> DADOS DE CONTATO</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{(isset($row)) ? $row->telefone : old('telefone')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="website">Website *</label>
                <input type="text" name="website" class="form-control" id="website" value="{{(isset($row)) ? $row->website : old('website')}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="whatsapp">Whatsapp *</label>
                <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="{{(isset($row)) ? $row->whatsapp : old('whatsapp')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="facebook" value="{{(isset($row)) ? $row->facebook : old('facebook')}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-mail SAC *</label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($row)) ? $row->email : old('email')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" id="instagram" value="{{(isset($row)) ? $row->instagram : old('instagram')}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email_financeiro">E-mail financeiro *</label>
                <input type="email" name="email_financeiro" class="form-control" id="email_financeiro" value="{{(isset($row)) ? $row->email_financeiro : old('email_financeiro')}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email_comercial">E-mail comercial *</label>
                <input type="email" name="email_comercial" class="form-control" id="email_comercial" value="{{(isset($row)) ? $row->email_comercial : old('email_comercial')}}" required>
            </div>
        </div>
    </div>

    <hr>
    <a href="{{route('construtoras.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
    <button type="submit" class="btn btn-sm btn-success">{!!(isset($row)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
  </form>