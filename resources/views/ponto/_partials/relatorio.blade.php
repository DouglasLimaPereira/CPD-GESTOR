@extends('layout.app')

@section('title', 'Relatório Pontos')

@section('page-title', 'Relatório de Pontos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('ponto._partials.filtro')
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa-regular fa-rectangle-list"></i> Listagem de Pontos</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <form id="formpdf" target="_blank" action="{{ route('ponto.pdf') }}" method="GET">
                                    @foreach ($pontos as $ponto)
                                        <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                        <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                        <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                        <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                        <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                        <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                        <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                    @endforeach
                                    @if (isset($_GET['data_inicio']))
                                        <a href="#" class="btn btn-light" onclick='document.forms["formpdf"].submit()'><span class="text-danger"> <i class="fas fa-file-pdf fa-lg "></i> PDF </span></a>
                                    @endif
                                </form>
                                {{-- <div class="dropdown">
                                    <a class="btn btn-info btn-md dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-file-export"></i> Gerar Relatório
                                    </a>

                                    
                                    <div class="dropdown-menu">
                                        <form id="formpdf" target="_blank" action="{{ route('ponto.pdf') }}" method="GET">
                                            @foreach ($pontos as $ponto)
                                                <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                                <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                                <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                                <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                                <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                                <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                                <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                            @endforeach
                                            <a href="#" class="dropdown-item" onclick='document.forms["formpdf"].submit()'><span class="text-danger"> <button class="btn btn-danger btn-sm"> <i class="fas fa-file-pdf fa-lg "></i> </button> PDF </span></a>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <form id="xls" target="_blank" action="{{ route('ponto.xlsx') }}" method="GET">
                                            @foreach ($pontos as $ponto)
                                                <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                                <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                                <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                                <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                                <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                                <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                                <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                            @endforeach
                                            <a href="#" class="dropdown-item" onclick='document.forms["xls"].submit()'><span class="text-success"> <i class="fas fa-file-excel fa-lg text-success"></i> XLS </span></a>
                                        </form>

                                        <div class="dropdown-divider"></div>
                                        <form id="csv" target="_blank" action="{{ route('ponto.csv') }}" method="GET">
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
                                </div> --}}
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
                            @forelse ($pontos as $ponto )
                            <tr 
                            @if ($ponto->horas_negativas != '00:00:00')
                              class="table-danger"
                            @elseif ($ponto->horas_extras != '00:00:00')
                              class="table-success"
                            @else
                              class="table-secondary"
                            @endif style="border: solid 0.1px black;">
                                <td style="border: solid 0.1px black;"> {{ date('d/m/Y', strtotime($ponto->data)) }}</td>
                                <td style="border: solid 0.1px black;"> {{$ponto->entrada}} </td>
                                <td style="border: solid 0.1px black;"> {{$ponto->entrada_almoco}} </td>
                                <td style="border: solid 0.1px black;"> {{$ponto->saida_almoco}} </td>
                                <td style="border: solid 0.1px black;"> {{$ponto->saida}} </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">
                                        <span class="text-danger">Nenhum registro encontrado</span>
                                    </td>
                                </tr>
                            @endforelse

                            {{--  @foreach ($pontos as $ponto)
                                <tr 
                                @if ($ponto->horas_negativas != '00:00:00')
                                  class="table-danger"
                                @elseif ($ponto->horas_extras != '00:00:00')
                                  class="table-success"
                                @else
                                  class="table-secondary"
                                @endif style="border: solid 0.1px black;">
                                    <td style="border: solid 0.1px black;"> {{ date('d/m/Y', strtotime($ponto->data)) }}</td>
                                    <td style="border: solid 0.1px black;"> {{$ponto->entrada}} </td>
                                    <td style="border: solid 0.1px black;"> {{$ponto->entrada_almoco}} </td>
                                    <td style="border: solid 0.1px black;"> {{$ponto->saida_almoco}} </td>
                                    <td style="border: solid 0.1px black;"> {{$ponto->saida}} </td>
                                </tr>
                            @endforeach  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
