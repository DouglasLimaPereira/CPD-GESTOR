<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="" class="nav-link">
        <i class="nav-icon fas fa-clipboard-list fa-lg"></i>
        <p>
          PONTO
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
          <a href="{{ route('ponto.relatorio') }}" class="nav-link">
            <i class="nav-icon far fa-file-pdf fa-lg"></i>
             <p>Relatório</p>
          </a>
        </li>
      </ul>
    </li>
    {{-- <li class="nav-item">
      <a href="" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Simple Link
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li> --}}
  </ul>
</nav>
<!-- /.sidebar-menu -->