<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  {{-- INCLUINDO ITENS DE MENU  --}}
    @include('layout._partials.menus.menu-top')
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="javascript:void(0)" class="nav-link" onclick="sair()" title="SAIR">
        <i class="fas fa-sign-out-alt"></i>
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