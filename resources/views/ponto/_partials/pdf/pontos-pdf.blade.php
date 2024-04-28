
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
        <style>
          body {
            font-size :10px;
          }
        </style>
    </head>
    <body>
        <img src="{{public_path('assets/image/logo.png')}}" height="90" style="margin-left: 30%; margin-top: -7%;">
        <table class="table table-bordered table-sm table-striped mb-0">
          <thead class="">
            <tr>
              <th colspan="2">Nome</th>
              <th colspan="3">{{$user_name}}</th>
            </tr>
          </thead>
          <thead class="">
            <tr>
              <th colspan="2">Cargo</th>
              <th colspan="3">{{$cargo}}</th>
            </tr>
          </thead>
          <thead class="">
            <tr>
              <th colspan="2">Mês</th>
              <th colspan="3">{{ date("F", mktime(0, 0, 0, date('m'), 10)) }}</th>
            </tr>
          </thead>
        </table>
        <table class="table table-striped table-hover table-sm">
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
              @forelse($pontos as $key => $row)
                  <tr>
                      <td>{{date('d/m/Y', strtotime($row->data))}}</td>
                      @if ($row['tipo'] === 2)
                          <td colspan="4" class="text-center">
                              {!!'<span class="badge badge-warning" style="width:100%;">DSR</span>'!!}
                          </td>
                      @elseif ($row['tipo'] === 3)
                          <td colspan="4" class="text-center">
                              {!!'<span class="badge badge-success" style="width:100%;">FOLGA FERIADO</span>'!!}
                          </td>
                      @elseif ($row['tipo'] === 4)
                          <td colspan="4" class="text-center">
                              {!!'<span class="badge badge-danger" style="width:100%;">DOMINGO</span>'!!}
                          </td>
                      @elseif ($row['tipo'] === 5)
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
                              <span class="badge badge-success" style="width:100%;">+ {{$row->horas_extras}}</span>
                          @elseif($row->horas_negativas != '00:00:00')
                              <span class="badge badge-danger" style="width:100%;">- {{$row->horas_negativas}}</span>
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
      <br>
    </body>
</html>