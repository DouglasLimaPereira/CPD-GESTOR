<aside class="main-sidebar sidebar-dark-primary">

    <!-- Main Sidebar Container -->
        <!-- Brand Logo -->
        <a href="{{route('painel.index')}}" class="brand-link text-center">
          <span class="brand-text font-weight-light text-center">
            <img src="{{asset('image/mix.png')}}" alt="MATEUS Logo" class="elevation-2">
          </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
              <img class="text-center" src="{{url('/')}}/storage/{{auth()->user()->funcionario->imagem}}" style="border-radius: 3%">
            </div>
            <div class="info">
              <a href="{{ route('usuario.perfil', auth()->user()->id) }}" class="d-block">{{auth()->user()->funcionario->nome}}</a>
            </div>
          </div>

          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="Painel" role="menu">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu">
                <a href="{{ route('painel.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt fa-lg"></i>
                  <p>
                    Painel Principal
                  </p>
                </a>
              </li>
            </ul>
          </nav>

          @include('layout._partials.menus.menu-lateral')
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
