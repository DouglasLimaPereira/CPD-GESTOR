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
                                <a href="{{route('erro-sitef.create')}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO ERRO</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{--  <form action="{{route('erro-sitef.index')}}" method="GET" enctype="multipart/form-data">   --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" value="{{isset($erro_sitef) ? $erro_sitef->codigo : old('codigo')}}" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <hr>
                            <button class="btn btn-sm btn-success" onclick="getErro()"> <i class="fas fa-search"></i> Consultar </button>
                        </div>
                    </div>
                {{--  </form>  --}}
                <div class="row" style="display: none;">
                    <div class="col-md-6">
                        <div class="callout callout-info">
                            <b>Código: </b>  <b id="codigo"></b><br>
                            <b>Titulo: </b>  <b id="titulo"></b><br>
                            <b>Descrição: </b>  <b id="descricao"></b><br>
                            <b>Permite Retentativa? : </b> <b id="retentativa"></b><br>
                        </div>
                    </div>
                </div>
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
            url: "{{url('/')}}/errositef/codigo/"+cod_erro+"/consultar",
            method: 'GET',
            success: function(dados){
                console.log(dados)
                
            },
            error: function(){
                console.log('Sem resultados')
            }
        })
    }

</script>