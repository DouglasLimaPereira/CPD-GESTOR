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
                                <div class="dropdown">
                                    <a class="btn btn-primary btn-md dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        Gerar Relatório
                                    </a>
                                    
                                    <div class="dropdown-menu">
                                        <form id="pdf" action="{{ route('ponto.pdf') }}" method="GET">
                                            @foreach ($pontos as $ponto)
                                                <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                                <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                                <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                                <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                                <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                                <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                                <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                            @endforeach
                                            <a href="#" class="dropdown-item" onclick='document.forms["pdf"].submit()'><span class="text-danger"> <i class="fas fa-file-pdf fa-lg text-danger"></i> PDF </span></a>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <form id="xls" action="{{ route('ponto.xls') }}" method="GET">
                                            @foreach ($pontos as $ponto)
                                                <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                                <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                                <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                                <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                                <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                                <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                                <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                            @endforeach
                                            <a href="#" class="dropdown-item" onclick='document.forms["pdf"].submit()'><span class="text-success"> <i class="fas fa-file-excel fa-lg text-success"></i> XLS </span></a>
                                        </form>

                                        <div class="dropdown-divider"></div>
                                        <form id="csv" action="{{ route('ponto.csv') }}" method="GET">
                                            @foreach ($pontos as $ponto)
                                                <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                                <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                                <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                                <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                                <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                                <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                                <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                            @endforeach
                                            <a href="#" class="dropdown-item" onclick='document.forms["csv"].submit()'><span class="text-primary"> <i class="far fa-file-excel fa-lg text-primary"></i> CSV </span></a>
                                            
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('partials.datatables.buttons') --}}
                    <table class="table table-bordered table-striped" id="table-datatable" style="border: solid 1px black;">
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