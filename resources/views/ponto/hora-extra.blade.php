@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4>
                            <i class="fa-solid fa-stopwatch fa-lg mt-2"></i>
                            <b style="float: right">
                                <h2>
                                    <span class="badge badge-danger">Horas negativas {{$hora_negativas}}</span>
                                </h2>
                            </b>
                            <b style="float: right" class="mr-3">
                                <h2>
                                    <span class="badge badge-success">Horas positivas {{$hora_extra}}</span>
                                </h2>
                            </b>
                        </h4>
                    </div>
                </div>
                
                <div class="card-body">
                    <div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Horas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pontos as $ponto)
                                            <tr>
                                                <td> {{date('d-m-Y', strtotime($ponto->data))}} </td>
                                                <td>
                                                    @if ($ponto->horas_extras != '00:00:00')
                                                        <h4><span class="badge badge-success">{{'+ '.date('H:i:s', strtotime($ponto->horas_extras))}}</span></h4>
                                                    @elseif ($ponto->horas_negativas != '00:00:00')
                                                        <h4><span class="badge badge-danger">{{'- '.date('H:i:s', strtotime($ponto->horas_negativas))}}</span></h4>
                                                    @else
                                                        <h4><span class="badge badge-secondary">00:00:00</span></h4>
                                                    @endif 
                                                </td>
                                            </tr>
                                        @endforeach
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
