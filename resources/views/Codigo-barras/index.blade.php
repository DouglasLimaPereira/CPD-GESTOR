@extends('layout.app')

@section('title', 'Gerar Codigo de Barra')

@section('page-title', 'Gerar Codigo de Barra')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="codigo">Código <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" maxlength="6" name="codigo" id="codigo" onkeyup="gerarCodigo()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        </div>
                    </div>
                    
                    <div class="col-md-12">                                
                        <div class="form-group" id="resultcod" style="display: none;">
                            <div class="callout callout-info" style="background-color: #dee1e5;">
                                <div id="codigoinfo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <form target="_blank" action="{{ route('codigo_barra.gerarPdf') }}" method="GET">
                        <input type="hidden" name="codigo" value="`+cod_erro+`">
                        <div class="row">
                            <div class="col-md-2 ml-3 mt-3">
                                <div class="input-group">
                                    `+codigo+`
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="numero">Quantidade por Página <span class="text-danger">*</span></label> <span class="badge badge-info right">Minimo 1 | Maximo 13</span> <br>
                                <div class="input-group">  
                                    <input type="number" name="quantidade_cod" class="form-control" min="1" max="13" value="1" placeholder="Quantidade de Cód na página" aria-label="Quantidade de Cód na página" aria-describedby="export pdf">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" target="_blank"><i class="fa-regular fa-file-pdf"></i> Gerar PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>`)
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
