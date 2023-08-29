@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div  class="card-header"><h4><i class="fa-solid fa-eye"></i> Visualizar <b> {{ ($ponto->data) ? date('d/m/Y', strtotime($ponto->data)) : date('d/m/Y', strtotime($ponto->created_at)) }}</b> </h4></div>
                
                <div class="card-body">
                    <div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Entrada</th>
                                            <th>Entrada Almoço</th>
                                            <th>Saída Almoço</th>
                                            <th>Saída</th>
                                            <th> {{$ponto->horas_extras != '' ? 'Hora Extra' : 'Hora Negaiva' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> {{date('H:i:s', strtotime( $ponto->entrada) )}}</td>
                                            <td> {{ date('H:i:s', strtotime($ponto->entrada_almoco))}} </td>
                                            <td> {{ date('H:i:s', strtotime($ponto->saida_almoco))}} </td>
                                            <td> {{date('H:i:s', strtotime($ponto->saida))}} </td>
                                            <td> {{ $ponto->horas_extras != '' ? date('H:i:s', strtotime($ponto->horas_extras)) : date('H:i:s', strtotime($ponto->horas_negativas))}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if ($ponto->comprovante1 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante1}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante1}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante2 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante2}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante2}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante3 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante3}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante3}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante4 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante4}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante4}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
