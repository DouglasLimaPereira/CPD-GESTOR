@extends('layout.app')

@section('title', 'Relatório Pontos')

@section('page-title', 'Relatório Pontos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('ponto._partials.filtro')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listagem de Pontos</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <form action="{{ route('ponto.relatorio') }}" method="GET">
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-md dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                          Gerar Relatório
                                        </a>
                                      
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="route"><span class="text-danger"> <i class="fas fa-file-pdf fa-lg" style="color: #ff0000;"></i> PDF </span></a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#"><span class="text-success"> <i class="fas fa-file-excel fa-lg" style="color: #06b300;"></i> XLS </span></a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#"><span class="text-primary"> <i class="far fa-file-excel fa-lg" style="color: #003cff;"></i> CSV </span></a>
                                        </div>
                                    </div>
                                </form>
                                {{--  <a href="{{ route('ponto.create') }}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO PONTO</a>  --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.datatables.buttons')
                    <table class="table table-bordered table-striped" style="border: solid 1px black;">
                        <thead class="thead-dark">
                          <tr>
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Saida P/Almoço</th>
                            <th>Volta P/Almoço</th>
                            <th>Saída</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pontos as $ponto)
                                <tr 
                                @if ($ponto->horas_negativas != '00:00:00')
                                  class="table-danger"
                                @elseif ($ponto->horas_extras != '00:00:00')
                                  class="table-success"
                                @else
                                  class="table-secondary"
                                @endif style="border: solid 1px black;">
                                    <td> {{ date('d/m/Y', strtotime($ponto->data)) }}</td>
                                    <td> {{$ponto->entrada}} </td>
                                    <td> {{$ponto->entrada_almoco}} </td>
                                    <td> {{$ponto->saida_almoco}} </td>
                                    <td> {{$ponto->saida}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(ponto, funcionario){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/ponto/"+ponto+"/destroy"
        }
    }
</script>