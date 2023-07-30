<aside class="main-sidebar sidebar-dark-primary">

<!-- Main Sidebar Container -->
    <!-- Brand Logo -->
    <a href="{{route('painel.index')}}" class="brand-link">
      <span class="brand-text font-weight-light">
        <center><img src="{{asset('assets/images/MATEUS_.png')}}" alt="AdminLTE Logo" class=" elevation-3" width="150">&nbsp;</center>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if(session()->get('user-name'))
              {{session()->get('user-name')}}
            @endif
          </a>
        </div>
      </div>

      {{-- @if(!Request::route("company")) --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('painel.index')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Painel de Controle</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('construtoras.index')}}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Construtoras @if(Request::route("company"))<i class="right fas fa-angle-left"></i>@endif</p>
            </a>
            @if(Request::route("company"))
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('construtoras.gerenciar', $company->id)}}" class="nav-link"><i class="far fa-circle nav-icon"></i> <i class="nav-icon fas fa-building"></i>
                  <p> {{$company->nome_fantasia}} </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('construtoras.canteiros.index', $company->id)}}" class="nav-link"><i class="far fa-circle nav-icon"></i> <i class="nav-icon far fa-building"></i>
                  <p> Empreendimentos </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('construtoras.usuarios.index', $company->id)}}" class="nav-link"><i class="far fa-circle nav-icon"></i> <i class="nav-icon fas fa-user-friends"></i>
                  <p> Administradores </p>
                </a>
              </li>
            </ul>
            @endif
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('usuarios.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users "></i>
              <p>SuperAdministradores</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('modulos.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Módulos e Ações</p>
            </a>
            {{--<ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Módulos</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{route('itens.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Itens</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subitens.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subitens</p>
                </a>
              </li> -- }}
            </ul>
          </li> --}}
        </ul>
        
      </nav>


      {{-- @else
        @include('layout._partials.menus.menu-lateral')
      @endif --}}


      <!-- Sidebar Menu -->
      {{-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{route('painel.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Painel
                </p>
              </a>
          </li>
          <li class="nav-item menu">
            <a href="{{route('construtoras.index')}}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Construtoras
              </p>
            </a>
          </li>
          
          <li class="nav-item menu">
            <a href="{{route('usuarios.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users "></i>
              <p>
                Usuários
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          {{-- <li class="nav-item">
            <a href="{{route('canteiros.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Canteiros
              </p>
            </a>
          </li> --}}
        {{-- </ul>
      </nav> --}}
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>