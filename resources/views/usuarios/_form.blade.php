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
    <form action="{{route('usuario.store', $usuario->id)}}" method="POST" enctype="multipart/form-data">    
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
                <label for="nome">Nome *</label>
                <input type="text" name="name" class="form-control" id="name" value="{{(isset($usuario)) ? $usuario->funcionario->nome : old('name')}}">
                {{-- @if(!isset($usuario))
                    <span class="user-from-database" style="display: none">
                        <select name="pessoa_id" id="pessoa_id" class="form-control pessoa_id" data-live-search="true" data-style="border-secondary" onchange="getMail(this.value)">
                            <option value="">Selecione...</option>
                            @isset($pessoas)
                                @forelse ($pessoas as $pessoa)
                                    <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
                                @empty
                                    <option value="">Nenhum registro encontrado...</option>
                                @endforelse
                            @endisset
                        </select>
                    </span>
                @endif --}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">   
                <label for="telefone">Telefone *</label>
                <input type="telefone" name="telefone" class="form-control" id="telefone" value="{{(isset($usuario)) ? $usuario->funcionario->telefone : old('telefone')}}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">   
                <label for="cargo">Cargo *</label>
                <input type="text" name="cargo" class="form-control" id="cargo" value="{{(isset($usuario)) ? $usuario->funcionario->funcao->nome :  old('cargo')}}" required>
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
        <div class="col-md-4">
            <div class="form-group">   
                <label for="email">Email *</label>
                <input type="email" name="email" class="form-control" id="email" value="{{(isset($usuario)) ? $usuario->email : old('email')}}" required>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">   
                <label for="senha">Senha *</label>
                <input type="text" name="password" class="form-control" id="senha" minlength="8" value="{{old('password')}}" onload="gerarSenha()" readonly required>
                    @if (!isset($usuario))                    
                        <a href="javascript:void(0)" id="gerar-senha" class="text-info">[Gerar senha]</a>
                        <a href="javascript:void(0)" id="limpa-senha" class="text-danger">[Limpar senha]</a>
                        <a href="javascript:void(0)" id="preencher-senha" class="text-secondary">[Preencher Manualmente]</a>
                    @else
                        <a href="javascript:void(0)" id="preencher-senha" class="text-primary">[ Alterar Senha ? ]</a>
                        <a href="javascript:void(0)" id="cancelar-senha" class="text-danger">[ Cancelar ]</a>
                    @endif
            </div>
        </div>
        
        @if(isset($usuario))
            <div class="col-md-4">
                <div class="form-group">
                    <label for="active">Ativo *</label>
                    <select name="active" id="active" class="form-control" required>
                        <option value="1" @if($usuario->funcionario->situacao_admissional == true) selected @endif>SIM</option>
                        <option value="0" @if($usuario->funcionario->situacao_admissional == false) selected @endif>NÃO</option>
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
        {{--  <a href="{{route('painel.index')}}" class="btn btn-sm btn-secondary mr-3"><i class="fas fa-undo-alt"></i> Voltar</a>  --}}
        <button type="submit" class="btn btn-sm btn-success mr-3">{!!(isset($usuario)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
    </div>
  </form>

  @section('scripts')
    <script>
        function gerarSenha()
        {
            $('#senha').val('...')
                $.ajax({
                    url: "{{url('/')}}/api/gera-senha",
                    method: 'GET',
                    success: function(senha){
                        $('#senha').val(senha)
                    },
                    error: function(){
                        console.log('Sem resultados')
                    }
                })
                $('#senha').attr('readonly', 'readonly')
        }
        @if(!isset($usuario))
            gerarSenha();
        @endif

         $(document).ready(function(){
        //     //Atribuindo a busca no select
             $('.user_id').selectpicker();

             {{--  $('#gerar-senha').click(function(){
                 gerarSenha();
             })  --}}

             $('#limpa-senha').click(function(){
                 $('#senha').val(``)
                 $('#senha').attr('readonly', 'readonly')
             })

             $('#preencher-senha').click(function(){
                 $('#senha').val(``)
                 $('#senha').removeAttr('readonly')
             })
             $('#cancelar-senha').click(function(){
                 $('#senha').val(``)
                 $('#senha').attr('readonly', true)
             })
        }
        //     //Trazendo as users a partir do banco de dados
            
        //     $("#record-from-database").click(function(){
        //         if($('#record-from-database').is(':checked')){
        //             $('.nome-texto').hide()
        //             $('.nome-texto').val('')
        //             $('.user-from-database').show()
        //             $('#email').attr('readonly', 'readonly')
        //             $('#email').val('')

        //         }else{
        //             $('.nome-texto').show()
        //             $('.user_id').val(null).trigger("change")
        //             $('.user-from-database').hide()
        //             $('#email').val('')
        //             $('#email').removeAttr('readonly')                    
        //         }
        //     })
        // })

        function getMail(val){
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
        }
    </script>
  @endsection