@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($usuario))
    <form action="{{route('usuario.update', $usuario->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('usuario.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <h5 class="mt-3"><em>DADOS PESSOAIS</em></h5>
    <hr>
    {{-- @if(!isset($usuario))
        <div class="row">
            <div class="col-md-12">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="record-from-database" name="record_from_database">
                        <label for="record-from-database">Cadastrar usuário a partir do banco de dados de funcionários
                    </label>
                </div>
            </div>
        </div>
    @endif --}}
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome">Nome <span class="text-danger">*</span></label>
                <input type="text" name="nome" class="form-control" id="nome" value="{{(isset($usuario)) ? $usuario->funcionario->nome : old('nome')}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="telefone">Telefone <span class="text-danger">*</span></label>
                <input type="telefone" name="telefone" class="form-control" id="telefone" value="{{(isset($usuario)) ? $usuario->funcionario->telefone : old('telefone')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cargo">Cargo <span class="text-danger">*</span></label>
                <select name="cargo" id="cargo" class="form-control">
                    <option value="">--- Selecione ---</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}" {{ (isset($usuario) && $usuario->funcionario->funcao_id == $cargo->id)  ? 'selected' : '' }}> {{ $cargo->nome }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="data_admissao">Matricula <span class="text-danger">*</span></label>
                <input type="matricula" name="matricula" class="form-control" id="matricula" value="{{(isset($usuario)) ? $usuario->funcionario->matricula : old('matricula')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="data_admissao">Admissão <span class="text-danger">*</span></label>
                <input type="date" name="data_admissao" class="form-control" id="data_admissao" value="{{(isset($usuario)) ? $usuario->funcionario->data_admissao : old('data_admissao')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="logotipo">Foto</label>
                {{-- @if(!$canteiro->logotipo)  --}}

                    <input type="file" name="imagem" class="form-control" id="imagem" value="{{old('imagem')}}" accept="image/png, image/jpeg, image/jpg">
                    <small class="text-info">Formatos permitidos: .jpeg, .png, .jpg, .svg.</small>
                {{-- @endif --}}


                {{-- @if (isset($usuario))

                        <br>
                        <div class="img-hidden-after-remove">
                            @if($usuario->imagem_origem == 'g')
                                <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="250" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                            @elseif($usuario->imagem_origem == 'c')
                                <img class="img-fluid" src="{{env('APP_URL')}}/storage/{{str_replace('public', '',$usuario->imagem)}}" width="250" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                            @endif

                            {{-- <img src="{{Storage::url($canteiro->logotipo)}}" width="250"> --}}
                            {{-- <br><br>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger" type="checkbox" id="remover_logotipo" name="remover_logotipo">
                                <label for="remover_logotipo" id="remover_logotipo" class="custom-control-label text-danger">Remova esta imagem para cadastrar uma nova.</label>
                            </div> --} }
                        </div>
                @endif --}}
            </div>
        </div>

    </div>
    <h5 class="mt-3"><em>DADOS DE ACESSO</em></h5>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($usuario)) ? $usuario->email : old('email')}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="senha">Senha <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="senha" minlength="8" value="{{old('password')}}" onload="gerarSenha()" readonly required>
                    <div class="input-group-append">
                        <span class="btn btn-outline-secondary" id="btn-show-pass"> <i class="fa-regular fa-eye"></i> </span>
                    </div>
                </div>
                <div id="butao-senha">
                    @if (!isset($usuario))
                        <a href="javascript:void(0)" id="gerar-senha" class="text-info">Gerar senha</a>
                        <a href="javascript:void(0)" id="limpa-senha" class="text-danger">Limpar senha</a>
                        <a href="javascript:void(0)" id="preencher-senha" class="text-secondary">Preencher Manualmente</a>
                    @else
                        <a href="javascript:void(0)" id="preencher-senha" class="text-primary"> 
                            <span class="btn btn-sm btn-outline-success"> Alterar senha </span>
                        </a>
                        <a href="javascript:void(0)" id="cancelar-senha" class="text-danger" style="display: none;">
                            <span class="btn btn-sm btn-outline-danger"> Cancelar alteração de senha </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="filial">Filial <span class="text-danger">*</span></label>
                <select name="filial" id="filial" class="form-control selectpicker" required data-live-search="true">
                    <option value="">--- Selecione ---</option>
                    @foreach ($filiais as $filial_M)
                    <option value="{{ $filial_M->id }}" @if(isset($usuario) && session()->get('filial')->id == $filial_M->id) selected @endif>SM{{ $filial_M->codigo }} - {{ $filial_M->bairro }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if(isset($usuario))
            <div class="col-md-3">
                <div class="form-group">
                    <label for="active">Ativo <span class="text-danger">*</span></label>
                    <select name="situacao_admissional" id="active" class="form-control" required>
                        <option value="">--- Selecione ---</option>
                        <option value="1" @if(isset($usuario) && $usuario->funcionario->situacao_admissional == true) selected @endif>SIM</option>
                        <option value="0" @if(isset($usuario) && $usuario->funcionario->situacao_admissional == false) selected @endif>NÃO</option>
                    </select>
                </div>
            </div>
        @endif

        @if( auth()->user()->funcionario->superadmin)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="superadmin">Superadmin <span class="text-danger">*</span></label>
                    <select name="superadmin" id="superadmin" class="form-control" required>
                        <option value="">--- Selecione ---</option>
                        <option value="1" @if(isset($usuario) && $usuario->funcionario->superadmin == true) selected @endif>SIM</option>
                        <option value="0" @if(isset($usuario) && $usuario->funcionario->superadmin == false) selected @endif>NÃO</option>
                    </select>
                </div>
            </div>
        @endif
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input custom-control-input-info" type="checkbox" id="enviar_email" name="enviar_email">
                <label for="enviar_email" class="custom-control-label text-info">Deseja enviar o email com a senha?</label>
            </div>
        </div>
    </div> --}}

    <hr>
    <div class="row float-right">
         <a href="{{route('usuario.index')}}" class="btn btn-outline-danger mr-3"><i class="fas fa-undo-alt"></i> Cancelar</a> 
        <button type="submit" class="btn btn-outline-success mr-3">{!!(isset($usuario)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
    </div>
  </form>

  @section('scripts')
    <script>
        $(document).ready(function(){

            $('#limpa-senha').click(function(){
                $('#senha').val(``)
                $('#senha').attr('readonly', 'readonly')
            });

            $('#preencher-senha').click(function(){
                $('#senha').val(``)
                $('#senha').removeAttr('readonly')
                $('#preencher-senha').hide()
                $('#cancelar-senha').show()
            });

            $('#cancelar-senha').click(function(){
                $('#senha').val(``)
                $('#senha').attr('readonly', true)
                $('#cancelar-senha').hide()
                $('#preencher-senha').show()
            });
       });

        {{--  function getMail(val){
            if(val != ""){
                $.ajax({
                    url: "{{url('/')}}/api/companies/{{session()->get('company_id')}}/pessoas/"+val+"/get-email",
                    method: 'GET',
                    success: function(val){
                        $('#email').val(val)
                    },
                    error: function(e){
                        console.log(e)
                    }
                })
            }
        }  --}}

        (function ($) {
            /*[ Show pass ]*/
            var showPass = 0;
            $('#btn-show-pass').on('click', function(){
                if(showPass == 0) {
                    $('#senha').attr('type','text');
                    $(this).find('i').removeClass('fa-regular fa-eye');
                    $(this).find('i').addClass('fa-regular fa-eye-slash');
                    showPass = 1;
                }
                else {
                    $('#senha').attr('type','password');
                    $(this).find('i').removeClass('fa-regular fa-eye-slash');
                    $(this).find('i').addClass('fa-regular fa-eye');
                    showPass = 0;
                }
            });
        })(jQuery);

    </script>
  @endsection
