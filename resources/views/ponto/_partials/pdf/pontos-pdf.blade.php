
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <img src="{{public_path('image/logo.png')}}" height="90" style="margin-left: 30%; margin-top: -7%;">
          <table class="table table-bordered table-sm table-striped mb-0">
            <thead class="table-secondary">
              <tr style="border: solid 1px black;">
                <th colspan="2">Nome</th>
                <th colspan="3">{{auth()->user()->name}}</th>
              </tr>
            </thead>
            <thead class="table-secondary">
              <tr style="border: solid 1px black;">
                <th colspan="2">Cargo</th>
                <th colspan="3">Entrada</th>
              </tr>
            </thead>
            <thead class="table-secondary">
              <tr style="border: solid 1px black;">
                <th colspan="2">Mês</th>
                <th colspan="3">{{ date("F", mktime(0, 0, 0, date('m'), 10)) }}</th>
              </tr>
            </thead>
          </table>
          <table class="table table-bordered table-sm table-striped" style="border: solid 1px black;">
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
        
    </body>
</html>