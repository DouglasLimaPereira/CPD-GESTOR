{{-- @extends('layout.app')

@section('content')
<div>
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body" style="height: 750px;">
                    <div class="card">
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Data</th>
                                        <th scope="col">Entrada</th>
                                        <th scope="col">Entrada Almoço</th>
                                        <th scope="col">Saída Almoço</th>
                                        <th scope="col">Saída</th>
                                        <th><i class="fa fa-cogs fa-lg"></i> Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pontos as $ponto)
                                        <tr> 
                                            <td>{{ ($ponto->data) ? date('d/m/Y', strtotime($ponto->data)) : date('d/m/Y', strtotime($ponto->created_at)) }}</td>
                                            <td>{{ $ponto->entrada }}</td>
                                            <td>{{ $ponto->entrada_almoco }}</td>
                                            <td>{{ $ponto->saida_almoco }}</td>
                                            <td>{{ $ponto->saida }}</td>
                                            <td>
                                            <div class="dropdown text-center">
                                                <button class="btn btn-secondary text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                                                </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('ponto.show', $ponto->id)}}"> <i class="fa-solid fa-eye"></i> Viualizar</a></li>
                                                        <li><a class="dropdown-item" href="{{route('ponto.edite', $ponto->id)}}"> <i class="fas fa-edit"></i> Editar</a></li>
                                                        <li><a class="dropdown-item text-danger" href="{{route('ponto.destroy', $ponto->id)}}"> <i class="fas fa-trash"></i> Deletar</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav class="mb-0">
                            <ul class="pagination justify-content-end ">
                              <li class="page-item"><a class="page-link text-secondary" href="{{$pontos->previousPageUrl()}}">Voltar</a></li>
                              @for ($i = 1; $i <= $pontos->lastPage() ; $i++)
                                <li class="page-item link-secondary {{($pontos->currentPage() == $i) ? 'active' : ''}}">
                                    <a class="page-link" href="{{$pontos->Url($i)}}">{{$i}}</a>
                                </li>
                              @endfor
                              <li class="page-item"><a class="page-link text-secondary" href="{{$pontos->nextPageUrl()}}">Avançar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layout.app')

@section('title', 'Pontos')

@section('page-title', 'Pontos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listagem de Pontos</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href=" " class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO PONTO</a>
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
                            @forelse($pontos as $row)
                                <tr>
                                    <td>{{date('d/m/Y', strtotime($row->data))}}</td>
                                    <td>{{$row->entrada}}</td>
                                    <td>{{$row->entrada_almoco}}</td>
                                    <td>{{$row->saida_almoco}}</td>
                                    <td>{{$row->saida}}</td>
                                    <td>
                                        @if($row->user->active)
                                            <span class="badge badge-success">ATIVO</span>
                                        @else
                                            <span class="badge badge-secondary">DEMITIDO</span>
                                        @endif
                                    </td>
                                    <td class="td-1p">
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{route('ponto.show', [$row->id])}}" class="dropdown-item"><i class="far fa-eye"></i> Visualizar </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('ponto.edite', [$row->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}}, {{$row->user->id}})"><i class="fas fa-trash"></i> Remover </a>
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
                        {{$pontos->links()}}
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