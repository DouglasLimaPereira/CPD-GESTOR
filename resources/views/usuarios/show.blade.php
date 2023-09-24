@extends('layout.app')

@section('title', '')

@section('page-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Empreendimento</h3>
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
                            <b>Nome: </b> {{$usuario->name}}<br>
                            <b>Telefone: </b> {!!($usuario->telefone) ? '<span class="text-primary">' . $usuario->telefone . '</span>' : '<span class="text-danger">Não informado</span>'!!}<br>
                            <b>Cargo: </b> {{ $usuario->cargo }}<br>
                            <b>E-mail: </b> {{$usuario->email}}<br>
                        </div>
                        
                        <div class="callout callout-info">
                            <b>Estado </b> 
                            {!!($usuario->active) ? '<span class="badge badge-pill badge-success">ATIVO</span>' : '<span class="badge badge-pill badge-danger">INATIVO</span>'!!}
                                
                            {{--<br>
                            <b>Perfil </b> {!!($perfil) ? $perfil->nome : '<span class="badge badge-pill badge-danger">NÃO INFORMADO</span>' !!} --}}
                            
                            <br>
                        </div>
                    </div>
                    
                    <div class="callout callout-info col-md-6 border p-2 text-center">
                        <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/{{str_replace('public', 'storage', $usuario->imagem)}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                        @if($usuario->where('imagem_origem', 'c'))
                            <img class="img-fluid" src="{{url('/')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                        @else
                            <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                        @endif
                        
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row col-md-12">
                    <div class="mr-2">
                        <a href="{{route('construtoras.usuarios.index', $company->id)}}" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>
                        
                        @if (($usuario->id == auth()->user()->id ) || ( auth()->user()->filiais->firstWhere('superadmin', 1)))
                            <a href="{{ route('construtoras.usuarios.edit', [$company->id, $usuario->id]) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
