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
                        <div class="card-avatar text-center">
                            @if (isset($usuario) && ($usuario->imagem))
                                {{--  <a href="{{url('/')}}/storage/{{$usuario->imagem}}" target="_blank">  --}}
                                    <img src="{{url('/')}}/storage/{{$usuario->imagem}}" width="170">
                                {{--  </a>  --}}
                            @else
                                <img src="{{asset('image/user.jpg')}}" style="height: 300;">
                            @endif
                        </div>
                        <div class="card-body">
                            <h3 class="card-category text-gray">{{ $usuario->cargo }} / {{ $usuario->name }}</h3>
                            <h4 class="card-title">Loja: </h4><br>
                            <h4 class="card-title">Endereço: </h4><br>
                            <h4 class="card-title">Situação: </h4>
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
            window.location.href = "{{url('/')}}/construtoras/"+val+"/usuarios/"+val+"/destroy"
        }
    }
</script>

