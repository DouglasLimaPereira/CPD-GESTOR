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
                <form action="{{ route('codigo-barras.gerarcod') }}" method="GET">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" required>
                            </div>
                        </div>
                        @if(isset($codigo))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="callout callout-info" style="background-color: #dee1e5">
                                        <div class="codigo">
                                            <img class="text-center" src="{{ $codigo }}" width="250" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <button type="submit">Gerar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
