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
                                <input type="text" class="form-control" name="codigo" id="codigo" onchange="gerarCodigo()" required>
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
                let numero = codigo
                console.log(numero);
                $('#codigoinfo').html("")
                if (codigo){
                    $('#codigoinfo').html('<img src="data:image/png;base64,{{DNS1D::getBarcodePNG("+numero+", "EAN13",1,53,array(1,1,1), true)}}" alt="barcode"/>')
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
