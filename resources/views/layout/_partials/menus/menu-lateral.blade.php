<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{route('construtoras.canteiros.index', $company->id)}}" class="nav-link">
        <i class="nav-icon far fa-building"></i>
        <p>Canteiros</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('construtoras.usuarios.index', $company->id)}}" class="nav-link">      
        <i class="nav-icon fas fa-user-friends"></i>
        <p>Usuários</p>
      </a>
    </li>
    {{-- <li class="nav-item">   
      <a href="{{route('construtoras.funcionarios.index', $company->id)}}" class="nav-link">      
        <i class="nav-icon far fa-address-card"></i>
        <p>Funcionários</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('construtoras.funcoes.index', $company->id)}}" class="nav-link">      
        <i class="nav-icon fas fa-hand-paper"></i>
        <p>Funções</p>
      </a>
    </li> --}}
  </ul>
  
</nav>
{{-- <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-hands-helping"></i>
      <p>
        Clientes
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="pages/layout/top-nav.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Chamados</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Unidades Habitacionais</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/boxed.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Financeiro</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/fixed-sidebar.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Avisos</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Galeria de Imagens</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Inconformidades-RNC</p>
        </a>
      </li>
    </ul>
</li> --}}


