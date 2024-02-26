@extends('layout.app')

@section('title', 'Consultar Horas')

@section('page-title', 'Horas Extras')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if ($hora_extra != '00:00:00')
                    <div class="col-md-3">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="far fa-clock fa-lg"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Horas Extras</span>
                            <span class="info-box-number">{{ $hora_extra }}</span>
                            </div>
                        </div>
                    </div>
                @elseif ($hora_negativas != '00:00:00')
                    <div class="col-md-3">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-history fa-lg"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Horas Negativas</span>
                            <span class="info-box-number">{{ $hora_negativas }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card card-info">
                <div class="card-header">
                    Horas Extras / Negativas
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
                                            <h4><span class="badge badge-success">{{'+ '.date('H:i', strtotime($ponto->horas_extras))}}</span></h4>
                                        @elseif ($ponto->horas_negativas != '00:00:00')
                                            <h4><span class="badge badge-danger">{{'- '.date('H:i', strtotime($ponto->horas_negativas))}}</span></h4>
                                        @else
                                            <h4><span class="badge badge-secondary">00:00</span></h4>
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
                    <div id="curve_chart" style="width: 900px; height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var result = <?php $result; ?>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          result
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
@endsection
