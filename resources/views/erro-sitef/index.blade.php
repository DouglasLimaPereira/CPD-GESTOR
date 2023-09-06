@extends('layout.app')

@section('title', 'Erros Sitef')

@section('page-title', 'Erros sitef')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if (auth()->user()->superadmin == 1)
                <h3 class="card-title">Consultar Codigo</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('erro-sitef.create')}}" class="nav-link active btn-info"><i class="fas fa-plus-circle"></i> NOVO ERRO</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{--  <form action="{{route('erro-sitef.index')}}" method="GET" enctype="multipart/form-data">   --}}
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" onchange="getErro()" value="{{isset($erro_sitef) ? $erro_sitef->codigo : old('codigo')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" id="resulterro" style="display: none;">
                                <div class="callout callout-info" style="background-color: #dee1e5">
                                    <b> <h4 id="codigoinfo"> </h4></b>
                                    <b> <h4 id="titulo"> </h4></b>
                                    <b> <h4 id="descricao"> </h4></b>
                                    <b> <h4 id="retentativa"> </h4></b>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="col-md-12">
                            <hr>
                            <button class="btn btn-sm btn-success float-right" onclick="getErro()"> <i class="fas fa-search"></i> Consultar </button>
                        </div>  --}}
                    </div>
                {{--  </form>  --}}
            </div>
        </div>
    </div>
</div>
@endsection

<script>

    function getErro()
    {
        let cod_erro = $('#codigo').val()
        $.ajax({
            url: "{{url('/')}}/api/errositef/codigo/"+cod_erro+"/consultar",
            method: 'GET',
            success: function(dados){
                $('#codigoinfo').html("")
                if (dados){
                    $('#codigoinfo').html('<b>Código: 🔍</b>'+dados.codigo)
                    $('#titulo').html('<b>Descrição: ⚠️💻</b>'+dados.titulo)
                    $('#descricao').html('<b>Ação: 🗣</b>'+dados.descricao)
                    if (dados.retentativa == 1) {
                        $('#retentativa').html('<b>Permite Retentativa?: 👍</b>')
                    }else if(dados.retentativa == 0){
                        $('#retentativa').html('<b>Permite Retentativa?:</b> 👎</b>')
                    }else{
                        $('#codigoinfo').html("")
                        $('#titulo').html('<b class="text-danger">Nenhum Registro Encontrado </b>')
                        $('#descricao').html('')
                        $('#retentativa').html('')
                    }
                    $('#resulterro').show()
                }else{
                    {{--  $('#resulterro').show()  --}}
                }
            },
            error: function(){
                console.log('Sem resultados')
            }
        })
    }

</script>