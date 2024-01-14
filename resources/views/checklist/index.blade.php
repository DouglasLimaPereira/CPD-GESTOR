@extends('layout.app')

@section('title', 'Check-list')

@section('page-title', 'Check-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-regular fa-rectangle-list"></i> Listagem de Check-list</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('check-list.create') }}" class="btn btn-md btn-info"><i class="fas fa-plus-circle"></i> NOVO CHECK-LIST</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table id="table_datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Tipo Check-list</th>
                            <th style="width: 10%"><i class="fa-solid fa-gears"></i> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($check_lists as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{date('d/m/Y', strtotime($row->data))}}</td>
                                <td>{{$row->tipo}}</td>
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
                    @if ($check_lists)
                        {{$check_lists->links()}}
                    @endif
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

