<aside class="main-sidebar sidebar-dark-primary">

    <!-- Main Sidebar Container -->
        <!-- Brand Logo -->
        <a href="{{route('painel.index')}}" class="brand-link">
          <span class="brand-text font-weight-light">
            <img src="{{asset('assets/images/MATEUS_.png')}}" alt="MATEUS Logo" class=" elevation-3" width="150" style="margin-left: 40px;">
          </span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
            <div class="row text-center">
              <div class="image text-center">
              </div>

              <div class="info text-center">
                <a href="{{ route('usuarios.index') }}" class="d-block text-center">
                  @if(auth()->user())
                    <img src="{{url('/')}}/storage/{{$usuario->imagem}}" class="img-fluid img-circle elevation-2" style="border-radius: 50%; width: 80; height: 80; top:3;">
                    <br>
                    {{auth()->user()->name}}
                  @endif
                </a>
              </div>
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