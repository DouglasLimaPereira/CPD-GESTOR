@extends('layout.app')

@section('title', 'Funcionários')

@section('page-title', 'Construtoras - Funcionários')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selecione um funcionário</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('construtoras.funcionarios.create', $company->id)}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO FUNCIONÁRIO</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.datatables.buttons')
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Situação Admissional</th>
                                <th>data Admissão</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pessoas as $row)
                                <tr>
                                    <td>{{$row->funcionario->id}}</td>
                                    <td>{{$row->nome}}</td>
                                    <td>{{$row->funcionario->matricula}}</td>
                                    <td>
                                        @if($row->funcionario->situacao_admissional)
                                            <span class="badge badge-success">ATIVO</span>
                                        @else
                                            <span class="badge badge-secondary">DEMITIDO</span>
                                        @endif
                                    </td>
                                    <td>{{date('d/m/Y', strtotime($row->funcionario->data_admissao))}}</td>
                                    <td class="td-1p">
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{route('construtoras.funcionarios.edit', [$company->id, $row->funcionario->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$company->id}}, {{$row->funcionario->id}})"><i class="fas fa-trash"></i> Remover</a>
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
                        {{$pessoas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(company, funcionario){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+company+"/funcionarios/"+funcionario+"/destroy"
        }
    }
</script>