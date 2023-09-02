@extends('layout.app')

@section('title', 'Consultar Horas')

@section('page-title', 'Horas Extras')

@section('content')
    <div class="row">
        {{--  @dd($hora_extra, $hora_negativas)  --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="far fa-clock fa-lg"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Horas Extras</span>
                                  <span class="info-box-number">{{ $hora_extra }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-history fa-lg"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Horas Negativas</span>
                                  <span class="info-box-number">{{ $hora_negativas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pontos as $ponto)
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
                            @empty
                            <tr>
                                <td colspan="2"><span class="text-danger">Nenhum registro encontrado</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
