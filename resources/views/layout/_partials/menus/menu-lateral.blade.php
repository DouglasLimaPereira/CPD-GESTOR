<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="erro" role="menu">
    <li class="nav-item menu">
      <a href="{{ route('erro-sitef.index')}}" class="nav-link">
        <i class="nav-icon fas fa-exclamation-triangle fa-lg"></i>
        <p>
          Consultar Erro Sitef
        </p>
      </a>
    </li>
  </ul>
</nav>

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
            <i class="nav-icon fa-solid fa-clipboard-list fa-lg"></i>
             <p>Pontos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ponto.relatorio') }}" class="nav-link">
            <i class="nav-icon fa-regular fa-file-pdf fa-lg"></i>
             <p>Relatório de Pontos</p>
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
      <a href="{{ route('usuario.index') }}" class="nav-link">
        {{--  <i class=" fas fa-user-clock"></i>  --}}
        <i class="nav-icon fa-solid fa-users fa-lg"></i>
        <p>
          Funcionários
        </p>
      </a>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="horaextra" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="{{ route('ponto.hora-extra') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-address-book fa-lg"></i>
        <p>
          Consultar horas
        </p>
      </a>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="horaextra" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="{{ route('escala.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-calendar-days fa-lg"></i>
        <p>
          Escala
        </p>
      </a>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="horaextra" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="{{ route('filial.index') }}" class="nav-link">
        <i class="nav-icon fas fa-store fa-lg"></i>
        <p>
          Filial
        </p>
      </a>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="horaextra" role="menu">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu">
      <a href="{{ route('check-list.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-list-check"></i>
        <p>
          Check-List Loja {{session()->get('filial')->codigo}}
        </p>
      </a>
    </li>
  </ul>
</nav>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="cod-barras" role="menu">
    <li class="nav-item menu">
      <a href="{{ route('codigo_barra.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-barcode"></i>
        <p>
          Gerar Cód Barra
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
