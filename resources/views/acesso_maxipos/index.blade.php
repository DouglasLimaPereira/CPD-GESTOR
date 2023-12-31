@extends('layout.app')

@section('title', 'Acessos Mpos - Index')

@section('page-title', 'Acessos Mpos - Index')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selecione um funcionário</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('acesso_maxipos.create', $filial)}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO ACESSO</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>ID usuário</th>
                                <th>Senha</th>
                                <th>Data atualização</th>
                                <th style="width: 10px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nome}}</td>
                                    <td>{{$row->login}}</td>
                                    <td>
                                        <span class="showpass">
                                            {{$row->senha}}
                                        </span>
                                        <a href="#" onclick="showPass" class="btn btn-sm btn-secondary float-right">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </a>
                                    </td>
                                    <td>{{date('d/m/Y', strtotime($row->updated_at))}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="https://rhsso.grupomateus.com.br/auth/realms/grupomateus/protocol/openid-connect/auth?client_id=maxipos&redirect_uri=http%3A%2F%2Fpdv.mateus%2Fmaxipos_backoffice%2Fkeycloack.html&state=8ec1d098-26bc-43c2-8dfb-e6eeb35cfea1&response_mode=fragment&response_type=code&scope=openid&nonce=4f46b804-97b3-4314-8e93-412cf3aa15c1&username={{$row->login}}&password={{$row->senha}}" target="_blank" class="dropdown-item text-info"><button class="btn btn-info btn-sm"><i class="fa-solid fa-up-right-from-square"></i></button> Acessar Mpos</a>
                                                
                                                <div class="dropdown-divider"></div>
                                                
                                                <a href="{{route('acesso_maxipos.edit', [$row->id])}}" class="dropdown-item text-success"><button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button> Editar</a>
                                                
                                                <div class="dropdown-divider"></div>

                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$filial}}, {{$row->id}})"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> Remover</a>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex">
                        {{--  {{$rows->links()}}  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    function showPass(){
        alert('senha');
    }
</script>

{{-- Removendo o registro --}}
<script>

        $('#showPass').click(function() {
            $('.showpass').setAttribute("style","filter: blur(3px)"); 
        }) 
    
    {{--  (function ($) {
        /*[ Show pass ]*/
        var showPass = 0;
        $('.showpass').on('click', function(){
            if(showPass == 0) {
                $(this).next('input').attr('type','text');
                $(this).find('i').removeClass('fa-regular fa-eye');
                $(this).find('i').addClass('fa-regular fa-eye-slash');
                showPass = 1;
            }
            else {
                $(this).next('input').attr('type','password');
                $(this).find('i').removeClass('fa-regular fa-eye-slash');
                $(this).find('i').addClass('fa-regular fa-eye');
                showPass = 0;
            }
        });
    })(jQuery);  --}}

    function remover(acesso){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/acesso_maxipos/"+acesso+"/destroy"
        }
    }
</script>
@endsection
