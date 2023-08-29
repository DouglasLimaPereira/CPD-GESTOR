@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Ponto') }}</div>

                <div class="card-body">
                    @include('ponto.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
