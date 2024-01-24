@extends('layout.app')

@section('title', 'Filial - Cadastro')

@section('page-title', 'Filial - Cadastro')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Cadastro</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            {{-- <li class="nav-item">
                                <a href="{{route('construtoras.index')}}" class="nav-link btn btn-secondary text-light">CANCELAR</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('filial._form')
                </div>
            </div>
        </div>
    </div>

@endsection