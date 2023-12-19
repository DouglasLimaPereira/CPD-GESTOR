<ul class="navbar-nav">
    <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>  
    </li>
    <li class="nav-item">
        <span class="nav-link" style="color: black">Sistema de Gestão & Controle / <a href="{{ route('filial.index', session()->get('filial')->id) }}" style="text-decoration:none; color: black; cursor: pointer;">SM{{session()->get('filial')->codigo}} - {{session()->get('filial')->bairro}}</a></span>
    </li>
    <li>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                <img class="text-center" src="{{url('/')}}/storage/{{auth()->user()->funcionario->imagem}}" style="border-radius: 3%">
            </div>
            <div class="info">
                <a href="{{ route('usuario.perfil', auth()->user()->id) }}" class="d-block">{{auth()->user()->funcionario->nome}}</a>
            </div>
        </div>
    </li>
</ul>

