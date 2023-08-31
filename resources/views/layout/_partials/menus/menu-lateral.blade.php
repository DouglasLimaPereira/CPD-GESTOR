<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="" class="nav-link">
        <i class="nav-icon fas fa-clipboard-list fa-lg"></i>
        <p>
          Ponto
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('ponto.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-clock fa-lg"></i>
             <p>Pontos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ponto.relatorio') }}" target="_blank" class="nav-link">
            <i class="nav-icon far fa-file-pdf fa-lg"></i>
             <p>Relatório de Pontos Pdf</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="horaextra" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="{{ route('ponto.hora-extra') }}" class="nav-link">
        <i class="nav-icon fas fa-history fa-lg"></i>
        <p>
          Consultar horas
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->