<ul class="navbar-nav">
    <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>  
    </li>
    <li class="nav-item">
        <span class="nav-link" style="color: black">Sistema de Gestão CPD / <a href="{{ route('filial.index', session()->get('filial')->id) }}" style="text-decoration:none; color: black; cursor: pointer;">SM{{session()->get('filial')->codigo}} - {{session()->get('filial')->bairro}}</a></span>
    </li>

</ul>

