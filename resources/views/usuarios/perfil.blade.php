@extends('layout.app')

@section('title', 'Usuário - Perfil')

@section('page-title', 'Perfil Usuário')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-info">
                <div class="card-header">
                </div>
                <div class="card-body">
                    @include('usuarios._form')
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card card-info" style="height: 764px;">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="card-avatar text-center mt-3">
                        @if (isset($usuario) && ($usuario->funcionario->imagem))
                            {{--  <a href="{{url('/')}}/storage/{{$usuario->imagem}}" target="_blank">  --}}
                                <img src="{{url('/')}}/storage/{{$usuario->funcionario->imagem}}" width="270" style="border-radius: 3%">
                            {{--  </a>  --}}
                        @else
                            <img src="{{asset('assets/image/user.jpg')}}" style="height: 300;">
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="card-category text-gray text-center">{{ $usuario->funcionario->nome }}</h3>
                        <hr>
                        {{--  @dd($usuario->filiais()->where('filial_id', session()->get('filial'))->get('codigo'))  --}}
                        <b>Cargo:</b> {{ $usuario->funcionario->funcao->nome }}<br>
                        <b>Loja:</b> SM{{$filial->codigo}} {{$filial->bairro}}<br>
                        <b>Endereço:</b> {{$filial->logradouro}},
                        Nº {{$filial->numero}}, {{($filial->complemento) ? '{$filial->logradouro} ,' : ''}}
                        {{$filial->bairro}}, <span class="cep-view">{{$filial->cep}}</span>, {{$filial->cidade}} - {{$filial->uf}} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



