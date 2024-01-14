@extends('layout.app')

@section('title', 'Usuário')

@section('page-title', 'Usuário')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-regular fa-rectangle-list"></i> Listagem de Usuários</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('usuario.creat') }}" class="btn btn-md btn-info"><i class="fas fa-plus-circle"></i> NOVO USUÁRIO</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table id="table_datatable" class="table table-bordered table-striped table-hover table-responsve-sm">
                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-fingerprint"></i></i> ID</th>
                            <th><i class="fa-solid fa-signature"></i> Nome</th>
                            <th><i class="fa-solid fa-envelope"></i> E-mail</th>
                            <th><i class="fa-solid fa-briefcase"></i> Cargo</th>
                            <th><i class="fa-solid fa-id-card-clip"></i> Matricula</th>
                            <th><i class="fa-solid fa-file-signature"></i> Admissão</th>
                            <th width="8%"><i class="fa-solid fa-gears"></i> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->funcionario->nome}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->funcionario->funcao->nome}}</td>
                                <td>{{$row->funcionario->matricula}}</td>
                                <td>{{date('d/m/Y', strtotime($row->funcionario->data_admissao))}}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('usuario.show', $row->id ) }}" class="dropdown-item"><i class="far fa-eye"></i> Visualizar </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{ route('usuario.edit', $row->id) }}" class="dropdown-item"><i class="far fa-edit"></i> Editar </a>
                                            {{--  <div class="dropdown-divider"></div>  --}}
                                            {{--  <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}}, {{$row->user->id}})"><i class="fas fa-trash"></i> Remover </a>  --}}
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
                <div class="d-flex float-right">
                    {{$usuarios->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

{{-- Removendo o registro --}}
<script>
    function remover(val){
        $confirmacao = confirm('Tem certeza que deseja remover este Usuário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/filial/"+val+"/usuarios/"+val+"/destroy"
        }
    }
</script>
@endsection

