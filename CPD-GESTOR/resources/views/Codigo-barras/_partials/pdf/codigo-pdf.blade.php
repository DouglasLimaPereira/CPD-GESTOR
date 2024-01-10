
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="{{asset('image/coracao.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="{{asset('image/mateus_cora.png')}}">
        <title>Código Barra PDF</title>
    </head>
    <body>
        <table class="table table-borderless table-sm">
          <tbody>
              @for ($Qcod = 1; $Qcod <= $quantidade_cod; $Qcod++)
                <tr>
                  <td> <img style="margin-bottom: 26px" src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, "EAN13",1,65,array(1,1,1), true)}}" alt="barcode"/> </td>
                </tr>
              @endfor
          </tbody>
        </table>
    </body>
</html>