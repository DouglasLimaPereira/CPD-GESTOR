@extends('layout.app')

@section('title', 'Erros Sitef')

@section('page-title', 'Erros sitef')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consultar Codigo</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{route('erro-sitef.create')}}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO CODIGO</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('erro-sitef.index')}}" method="GET" enctype="multipart/form-data"> 
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" name="codigo" value="{{isset($erro_sitef) ? $erro_sitef->codigo : old('codigo')}}" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <hr>
                            <button type="submit" class="btn btn-sm btn-success"> <i class="fas fa-search"></i> Consultar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Removendo o registro --}}
<script>
    function remover(val){
        $confirmacao = confirm('Tem certeza que deseja remover este registro?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/erro-sitef/"+val+'/destroy'
        }
    }
</script>