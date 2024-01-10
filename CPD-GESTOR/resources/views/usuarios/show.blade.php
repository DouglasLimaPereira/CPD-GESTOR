@extends('layout.app')

@section('title', 'Usuário - Visualização')

@section('page-title', 'Usuário - Visualização')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informações do Usuário</h3>
                <div class="card-tools">
                    {{-- <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{route('spa.canteiros.create')}}" class="nav-link active">NOVO FUNCIONÁRIO</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="callout callout-info">
                            <b>Código: </b> {{$usuario->id}}<br>
                            <b>Nome: </b> {{$usuario->funcionario->nome}}<br>
                            <b>Telefone: </b> {!!($usuario->funcionario->telefone) ? '<span class="text-primary">' . $usuario->funcionario->telefone . '</span>' : '<span class="text-danger">Não informado</span>'!!}<br>
                            <b>Cargo: </b> {{ $usuario->funcionario->funcao->nome }}<br>
                            <b>E-mail: </b> {{$usuario->email}}<br>
                        </div>

                        <div class="callout callout-info">
                            <b>Estado </b>
                            {!!($usuario->funcionario->situacao_admissional) ? '<span class="badge badge-pill badge-success">ATIVO</span>' : '<span class="badge badge-pill badge-danger">INATIVO</span>'!!}
                            <br>
                            <b>Filial </b> SM{{ session()->get('filial')->codigo }} - {{ session()->get('filial')->bairro }}
                            <br>
                        </div>
                    </div>

                    <div class="callout callout-info col-md-6 border p-2 text-center">
                        <img class="img-fluid" src="{{url('/')}}/storage/{{$usuario->funcionario->imagem}}" width="130" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row col-md-12">
                    <div class="mr-2">
                        <a href="{{route('usuario.index')}}" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>

                        @if (($usuario->funcionario->situacao_admissional == auth()->user()->id ) || ( auth()->user()->funcionario->firstWhere('superadmin', 1)))
                            <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
