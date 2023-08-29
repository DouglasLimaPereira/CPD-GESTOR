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
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              {{-- <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
              <a href="" class="d-block">
                @if(session()->get('user-name'))
                  {{session()->get('user-name')}}
                @endif
              </a>
            </div>
          </div>
    
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="Painel" role="menu">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu">
                <a href="" class="nav-link">
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