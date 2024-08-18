@extends('layout.app')

@section('title', 'Equipamentos')

@section('page-title', 'Equipamentos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Lista de Equipamentos</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="javascript:void(0)" id="novo-item" class="btn btn-md btn-info"><i class="fas fa-plus-circle"></i> NOVO EQUIPAMENTO</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                {{--  @include('partials.datatables.buttons')  --}}
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Preço</th>
                            <th class="text-center">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($itens as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->nome}}</td>
                                <td>{{$row->marca}}</td>
                                <td>{{ number_format($row->preco, 2, ',', '.')}}</td>
                                {{--  <td>{!!($row->active) ? '<span class="badge bg-primary">SIM</span>' : '<span class="badge bg-secondary">NÃO</span>' !!}</td>  --}}
                                <td class="text-center" width="10%">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            
                                            <a href="{{route('filial.item.edit', $row->id)}}" class="dropdown-item text-success"><button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button> Editar</a>
                                            
                                            <div class="dropdown-divider"></div>
                                            
                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> Remover</a>
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
                    {{-- {!! $company-->links() !!} --}}
                </div>
                {{--  <div class="col-md-12">
                    <a href="{{url()->previous()}}" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>
                </div>  --}}
            </div>
        </div>
    </div>
    @include('itens._partials.novo-item')
</div>
@endsection

@section('scripts')

<script>

    $('#novo-item').click(function(){
        $('.novo-item').modal()
    })
    // Removendo o registro
    function remover(val){
        confirmacao = confirm('Tem certeza que deseja remover este registro?');
        if(confirmacao){
            window.location.href = "{{url('/')}}/filial/item/"+val+'/destroy'
        }
    }
</script>

@endsection