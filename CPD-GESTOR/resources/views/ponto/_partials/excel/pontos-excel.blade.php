
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
        <link rel="icon" type="image/x-icon" href="{{asset('image/coracao.png')}}">

    </head>
    <body>
        <img src="{{public_path('image/logo.png')}}" height="90" style="margin-left: 30%; margin-top: -7%;">
        <table class="table table-bordered table-sm table-striped mb-0">
          <thead class="">
            <tr style="border: solid 1px black;">
              <th colspan="2" style="border: solid 0.1px black;">Nome</th>
              <th colspan="3" style="border: solid 0.1px black;">{{auth()->user()->name}}</th>
            </tr>
          </thead>
          <thead class="">
            <tr style="border: solid 1px black;">
              <th colspan="2" style="border: solid 0.1px black;">Cargo</th>
              <th colspan="3" style="border: solid 0.1px black;">{{auth()->user()->cargo}}</th>
            </tr>
          </thead>
          <thead class="">
            <tr style="border: solid 1px black;">
              <th colspan="2" style="border: solid 0.1px black;">Mês</th>
              <th colspan="3" style="border: solid 0.1px black;">{{ date("F", mktime(0, 0, 0, date('m'), 10)) }}</th>
            </tr>
          </thead>
        </table>
        <table class="table table-bordered table-sm table-striped">
          <thead class="table-secondary">
            <tr style="border: solid 1px black;">
              <th style="border: solid 0.1px black;">Data</th>
              <th style="border: solid 0.1px black;">Entrada</th>
              <th style="border: solid 0.1px black;">Saida P/Almoço</th>
              <th style="border: solid 0.1px black;">Volta P/Almoço</th>
              <th style="border: solid 0.1px black;">Saída</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pontos['data'] as $key => $ponto)
                <tr 
                  @if ($pontos['horas_negativas'][$key] != '00:00:00')
                    class="table-danger"
                  @elseif ($pontos['horas_extras'][$key] != '00:00:00')
                    class="table-success"
                  @else
                    class="table-secondary"
                  @endif style="border: solid 1px black;">
                      <td style="border: solid 0.1px black;"> {{ date('d/m/Y', strtotime($ponto)) }}</td>
                      <td style="border: solid 0.1px black;"> {{$pontos['entrada'][$key]}} </td>
                      <td style="border: solid 0.1px black;"> {{$pontos['entrada_almoco'][$key]}} </td>
                      <td style="border: solid 0.1px black;"> {{$pontos['saida_almoco'][$key]}} </td>
                      <td style="border: solid 0.1px black;"> {{$pontos['saida'][$key]}} </td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </body>
</html>