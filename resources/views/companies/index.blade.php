@extends('layout.app')

@section('title', 'Construtoras')

@section('page-title', 'Construtoras')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card info">
                <div class="card-header">
                    <h3 class="card-title">Selecione uma construtora</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('construtoras.create')}}" class="btn btn-md btn-info"><i class="fas fa-plus-circle"></i> NOVA CONSTRUTORA</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('partials.datatables.buttons')
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th style="width: 10px">ID</th>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CNPJ</th>
                                <th>UF</th>
                                <th>ESTADO</th>
                                <th style="width: 10%"><i class="fa-solid fa-gears"></i> Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rows as $row)
                                <tr>
                                    {{-- <td>
                                        @if($row->deleted_at)
                                            <span class="text-danger" title="Removido"><i class="fas fa-minus-circle"></i></span>
                                        @else
                                            <span class="text-info"><i class="fas fa-minus-circle"></i></span>
                                        @endif
                                    </td> --}}
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->razao_social}}</td>
                                    <td>{{$row->nome_fantasia}}</td>
                                    <td>{{$row->cnpj}}</td>
                                    <td style="width:40px">{{$row->uf}}</td>
                                    <td>
                                        {{($row->estado) ? 'Ativo': 'Inativo'}}
                                    </td>
                                    <td class="td-10p">
                                        <a href="{{route('construtoras.gerenciar', $row->id)}}" class="btn btn-warning"><i class="fas fa-cogs"></i> Configurar</a>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{route('construtoras.edit', $row->id)}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('construtoras.funcoes.index', $row->id)}}" class="dropdown-item"><i class="far fa-list-alt"></i> Funções</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('construtoras.funcionarios.index', $row->id)}}" class="dropdown-item"><i class="far fa-address-card"></i> Funcionários</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('construtoras.canteiros.index', $row->id)}}" class="dropdown-item"><i class="nav-icon far fa-building"></i> Canteiros</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('construtoras.gerenciar', $row->id)}}" class="dropdown-item"><i class="fas fa-check-double"></i> Gerenciar</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
                                            </div>
                                        </div> --}}
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
                        {!! $rows->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(val){
        $confirmacao = confirm('Tem certeza que deseja remover este registro?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+val+"/destroy"
        }
    }
</script>

