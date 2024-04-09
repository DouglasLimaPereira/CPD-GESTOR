@extends('layout.app')

@section('title', 'Funções - Index')

@section('page-title', 'Cargos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Lista de Funções</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('filial.funcao.create', $filial)}}" class="btn btn-md btn-info"><i class="fas fa-plus-circle"></i> NOVA FUNÇÃO</a>
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
                                <th>Salário</th>
                                <th>Data atualização</th>
                                <th class="text-center" style="width: 10%"><i class="fa-solid fa-gears"></i> Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->nome}}</td>
                                <td>{{($row->salario) ? $row->salario->valor : '...'}}</td>
                                <td>{{date('d/m/Y', strtotime($row->updated_at))}}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            
                                            @if($row->salario)
                                            <a href="{{route('filial.salario.edit', [$row->id, $row->salario->id])}}" class="dropdown-item text-info"><button class="btn btn-info btn-sm"><i class="fa-solid fa-hand-holding-dollar"></i></button>Atualizar Salário</a>
                                            @else
                                            <a href="{{route('filial.salario.create', $row->id)}}" class="dropdown-item text-info"><button class="btn btn-info btn-sm"><i class="fa-solid fa-hand-holding-dollar"></i></button>Incluir Salário</a>
                                            @endif
                                            
                                            <div class="dropdown-divider"></div>
                                            
                                            <a href="{{route('filial.funcao.edit', [$filial, $row->id])}}" class="dropdown-item text-success"><button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button> Editar</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            
                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> Remover</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @dd('Passou')
                            <tr>
                                <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    <!-- -->
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
    // Alterando visualização de senha do acesso Mpos
    var showpass = 0;
    function showPass(id){
        let senha = document.getElementById(id);
        if(showpass == 0) {
            senha.removeAttribute('style');
            $('.senha').removeClass('select-none');
            $('.icon'+senha.id).find('i').removeClass('fa-regular fa-eye');
            $('.showpass'+senha.id).find('a').removeClass('btn-secondary');
            $('.showpass'+senha.id).find('a').addClass('btn-dark');            
            $('.icon'+senha.id).find('i').addClass('fa-regular fa-eye-slash');
            showpass = 1;
        }
        else {
            senha.style.webkitFilter = "blur(4px)";
            $('.senha').addClass('select-none');
            $('.showpass'+senha.id).find('a').removeClass('btn-dark');
            $('.showpass'+senha.id).find('a').addClass('btn-secondary');
            $('.icon'+senha.id).find('i').removeClass('fa-regular fa-eye-slash');
            $('.icon'+senha.id).find('i').addClass('fa-regular fa-eye');
            showpass = 0;
        }
    }

    // Removendo o registro
    function remover(funcao){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/filial/funcao/"+funcao+"/destroy"
        }
    }
</script>
@endsection
