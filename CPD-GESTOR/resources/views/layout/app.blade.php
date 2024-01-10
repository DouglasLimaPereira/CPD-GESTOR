
@include('layout._partials.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    @include('layout._partials.preloader')

    <!-- Navbar -->
    @include('layout._partials.navbar-top')

    {{-- Sidebar main --}}
    @include('layout._partials.sidebar-main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">@yield('page-title', '')</h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
                        {{-- @include('layout._partials.breadcrumb') --} }
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{-- Footer --}}
    <footer class="main-footer">
        @include('layout._partials.footer')
    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
@include('layout._partials.assets-js')

</body>
</html>
