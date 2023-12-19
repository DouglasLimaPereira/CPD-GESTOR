<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  {{-- INCLUINDO ITENS DE MENU  --}}
    @include('layout._partials.menus.menu-top')
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="dropdown">
        <img class="text-center dropdown-toggle" height="50" data-toggle="dropdown" src="{{url('/')}}/storage/{{auth()->user()->funcionario->imagem}}" style="border-radius: 50px">
        
        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('usuario.perfil', auth()->user()->id) }}" class="d-block dropdown-item">{{auth()->user()->funcionario->nome}}</a>
          </li>
          {{--  <li><a class="dropdown-item" href="#">Something else here</a></li>  --}}
          <div class="dropdown-divider"></div>
          <li>
            <a href="javascript:void(0)" class="dropdown-item" onclick="sair()" title="SAIR">
              Sair <i class="fas fa-sign-out-alt fa-md"></i>
            </a>
          </li>
        </ul>
      </div>
      </a>
    </li>
  </ul>
</nav>

<script>
  function sair()
  {
    var confirma = confirm('Tem certeza que deseja encerrar sua sessão?')

    if(confirma)
    {
      window.location.href = "{{route('logout')}}"
    }
  }
</script>