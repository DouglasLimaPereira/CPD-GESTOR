@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4> <b> Data {{ date('d / m / Y', strtotime($ponto->created_at)) }}</b> </h4></div>

                <div class="card-body">
                    @include('ponto.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
