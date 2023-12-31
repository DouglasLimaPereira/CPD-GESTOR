@extends('layout.app')

@section('title', 'Pontos')

@section('page-title', 'Pontos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa-regular fa-rectangle-list"></i> Listagem de Pontos</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('ponto.create') }}" class="nav-link active btn btn-info"><i class="fas fa-plus-circle"></i> NOVO PONTO</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table_datatable" class="table table-bordered table-striped table-hover table-responsve-sm">
                        <thead>
                            <tr>
                                <th><i class="fa-solid fa-calendar"></i> Data</th>
                                <th><i class="fa-solid fa-clock"></i> Entrada</th>
                                <th><i class="fa-solid fa-clock"></i> Saida P/Almoço</th>
                                <th><i class="fa-solid fa-clock"></i> Volta P/Almoço</th>
                                <th><i class="fa-solid fa-clock"></i> Saída</th>
                                <th width="8%"><i class="fa-solid fa-gears"></i> Ações</th>
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
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{ route('ponto.show', $row->id ) }}" class="dropdown-item"><i class="far fa-eye"></i> Visualizar </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('ponto.edite', $row->id) }}" class="dropdown-item"><i class="far fa-edit"></i> Editar </a>
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
                    <div class="d-flex float-right">
                        {{$pontos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

{{-- Removendo o registro --}}
<script>
    function remover(ponto, funcionario){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/ponto/"+ponto+"/destroy"
        }
    }
</script>

<script>
    UTILIZADO NOS DATATABLE 
    $(function () {
          $("#table_datatable").DataTable({
              "responsive": true,
              "lengthChange": false, 
              "autoWidth": true,
              "initComplete": function () {
                  $('div.fg-toolbar:first').append('<span>Titulo</span>');
              },
              language: {
                  lengthMenu: "Exibir _MENU_ records por página",
                  zeroRecords: "Nenhum registro encontrado.",
                  info: "Exibindo página _PAGE_ de _PAGES_",
                  infoEmpty: "Não há registros disponíveis.",
                  infoFiltered: "(Filtrado from _MAX_ total registros)",
                  search: "Buscar",
                  paginate: {
                      previous: "Anterior",
                      next: "Próximo"
                  }
              }
          });
      });
  </script>
@endsection
