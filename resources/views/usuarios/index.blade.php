@extends('layout.app')

@section('title', 'Perfil')

@section('page-title', 'Editar Perfil')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-dark">
                <div class="card-header">
                </div>
                <div class="card-body">
                    @include('usuarios._form')
                </div>
            </div>
        </div>  

        <div class="col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="card card-profile">
                        <div class="card-avatar text-center mt-3">
                            @if (isset($usuario) && ($usuario->imagem))
                                {{--  <a href="{{url('/')}}/storage/{{$usuario->imagem}}" target="_blank">  --}}
                                    <img src="{{url('/')}}/storage/{{$usuario->imagem}}" width="170" style="border-radius: 50%">
                                {{--  </a>  --}}
                            @else
                                <img src="{{asset('image/user.jpg')}}" style="height: 300;">
                            @endif
                        </div>
                        <div class="card-body">
                            <h3 class="card-category text-gray">{{ $usuario->cargo }} / {{ $usuario->name }}</h3>
                            {{--  @dd($usuario->filiais()->where('filial_id', session()->get('filial'))->get('codigo'))  --}}
                            <b class="">Loja:</b> SM{{$filial->codigo}}<br>
                            <b class="">Endereço:</b> {{$filial->logradouro}},
                            Nº {{$filial->numero}}, {{($filial->complemento) ? '{$filial->logradouro} ,' : ''}}
                            {{$filial->bairro}}, <span class="cep-view">{{$filial->cep}}</span>, {{$filial->cidade}} - {{$filial->uf}} <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
@endsection

{{-- Removendo o registro --}}
<script>
    function remover(val){
        $confirmacao = confirm('Tem certeza que deseja remover este Usuário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/filial/"+val+"/usuarios/"+val+"/destroy"
        }
    }
</script>

