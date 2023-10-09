@extends('layout.app')

@section('title', 'Gerar Codigo de Barras')

@section('page-title', 'Gerar Codigo de Barras')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                {{-- <form action="{{ route('codigo-barras.index') }}" method="GET"> --}}
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" maxlength="6" name="codigo" id="codigo" onkeyup="gerarCodigo()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            </div>
                        </div>
                        {{-- @if(isset($codigo)) --}}
                            <div class="col-md-12">
                                <div class="form-group" id="resultcod" style="display: none;">
                                    <div class="callout callout-info" style="background-color: #dee1e5;">
                                        <div id="codigoinfo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endisset --}}
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
@endsection

<script>

    function gerarCodigo()
    {
        let cod_erro = $('#codigo').val()
        $.ajax({
            url: "{{url('/')}}/api/codigo_barra/codigo/"+cod_erro+"/gerar",
            method: 'GET',
            success: function(codigo){
                console.log(codigo);
                $('#codigoinfo').html("")
                if (codigo){
                    $('#codigoinfo').html(`
                    <table class="table table-xs table-borderless">
                        <thead>
                          <tr>
                            <td class="tet-center">`+codigo+`</td>
                          </tr>
                          <tr>
                            <td class='col-md-3'>
                                <label for="numero">Quantidade por Página <span class="text-danger">*</span></label> <small class="text-info">Minimo 1 | Maximo 10</small>
                                <input type="number" min="1" class="form-control" max="10" name="numero" id="numero" required>
                            </td>
                          </tr>
                          <tr> <td> <button class="btn btn-primary ml-3" onclick="exortar()"><i class="fa-regular fa-file-pdf"></i> Exportar PDF</button> </td> </tr>
                        </thead>
                    </table>`)
                    $('#resultcod').show()
                }else{
                    $('#codigoinfo').html('<b class="text-danger">Não foi possível gerar codigo de barra </b>');
                }
            },
            error: function(){
                console.log('Sem resultados')
            }
        })
    }

</script>
