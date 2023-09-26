<ul class="navbar-nav">
    <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg"></i></a>  
    </li>
    <li class="nav-item">
        <span class="mt-1" style="font-size: 20px; font-weight: bold;">Sistema de Gestão CPD /</span>
    </li>
    <br>
    <li class="nav-item">
        <span class="ml-1" style="font-size: 20px; font-weight: bold;"> <a href="{{ route('filial.index', session()->get('filial')->id) }}" style="text-decoration:none; color:#1f2d3d;">SM{{session()->get('filial')->codigo}} - {{session()->get('filial')->razao_social}} {{session()->get('filial')->bairro}}</a> </span>  
    </li>

</ul>

