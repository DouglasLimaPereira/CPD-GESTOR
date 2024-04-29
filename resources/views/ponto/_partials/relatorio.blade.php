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
                                
                                @if (isset($funcionario_id))
                                    <form id="formpdf" target="_blank" action="{{ route('ponto.pdf', isset($funcionario_id)) }}" method="GET">
                                        <input type="hidden" name="data_inicio" value="{{$data_inicio}}">
                                        <input type="hidden" name="data_fim" value="{{$data_fim}}">
                                        <input type="hidden" name="user_name" value="{{$user_name}}">
                                        <input type="hidden" name="cargo" value="{{$cargo}}">
                                        <input type="hidden" name="user_id" value="{{$funcionario_id}}">
                                        <input type="hidden" name="mes" value="{{$mes}}">
                                        <input type="hidden" name="next_mes" value="{{$next_mes}}">
                                        
                                        {{-- @foreach ($pontos as $ponto)
                                        <input type="hidden" name="data[]" value="{{$ponto->data}}">
                                        <input type="hidden" name="entrada[]" value="{{$ponto->entrada}}">
                                        <input type="hidden" name="entrada_almoco[]" value="{{$ponto->entrada_almoco}}">
                                        <input type="hidden" name="saida_almoco[]" value="{{$ponto->saida_almoco}}">
                                        <input type="hidden" name="saida[]" value="{{$ponto->saida}}">
                                        <input type="hidden" name="horas_extras[]" value="{{$ponto->horas_extras}}">
                                        <input type="hidden" name="horas_negativas[]" value="{{$ponto->horas_negativas}}">
                                        @endforeach --}}
                                        @if (isset($_GET['mes']))
                                        <a href="#" class="btn btn-light" onclick='document.forms["formpdf"].submit()'><span class="text-danger"> <i class="fas fa-file-pdf fa-lg "></i> PDF </span></a>
                                        @endif
                                    </form>
                                @endif
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
                    <table id="table_datatable" style="width:100%" class="table table-bordered table-striped table-hover table-responsve-xl">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Entrada</th>
                                <th>Saida P/Almoço</th>
                                <th>Volta P/Almoço</th>
                                <th>Saída</th>
                                <th>Hora Extra / Negativa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pontos as $row)
                                <tr>
                                    <td>{{date('d/m/Y', strtotime($row->data))}}</td>
                                    @if ($row->tipo === 2)
                                        <td colspan="4" class="text-center">
                                            {!!'<span class="badge badge-warning" style="width:100%;">DSR</span>'!!}
                                        </td>
                                    @elseif ($row->tipo === 3)
                                        <td colspan="4" class="text-center">
                                            {!!'<span class="badge badge-success" style="width:100%;">FOLGA FERIADO</span>'!!}
                                        </td>
                                    @elseif ($row->tipo === 4)
                                        <td colspan="4" class="text-center">
                                            {!!'<span class="badge badge-danger" style="width:100%;">DOMINGO</span>'!!}
                                        </td>
                                    @elseif ($row->tipo === 5)
                                        <td colspan="4" class="text-center">
                                            {!!'<span class="badge badge-info" style="width:100%;">ATESTADO MÉDICO</span>'!!}
                                        </td>
                                    @else
                                        <td>{{$row->entrada}}</td>
                                        <td>{{$row->entrada_almoco}}</td>
                                        <td>{{$row->saida_almoco}}</td>
                                        <td>{{$row->saida}}</td>
                                    @endif
                                    <td class="text-center">
                                        @if($row->horas_extras != '00:00:00')
                                            <h4><span class="badge badge-success" style="width:100%;">+ {{$row->horas_extras}}</span></h4>
                                        @elseif($row->horas_negativas != '00:00:00')
                                            <h4><span class="badge badge-danger" style="width:100%;">- {{$row->horas_negativas}}</span></h4>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
