<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    <li class="nav-item erros">
      <a href="{{ route('erro-sitef.index')}}" class="nav-link">
        <i class="nav-icon fas fa-exclamation-triangle fa-lg"></i>
        <p>
          Consultar Erro Sitef
        </p>
      </a>
    </li>
  
    <li class="nav-item">
      <a href="#" class="nav-link">
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
    
    <li class="nav-item">
      <a href="{{ route('usuario.index') }}" class="nav-link">
        {{--  <i class=" fas fa-user-clock"></i>  --}}
        <i class="nav-icon fa-solid fa-users fa-lg"></i>
        <p>
          Funcionários
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('acesso_maxipos.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-globe"></i>
        <p>
          Acessos Maxipos
        </p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('ponto.hora-extra') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-user-clock"></i>
        <p>
          Consultar horas
        </p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('escala.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-calendar-days fa-lg"></i>
        <p>
          Escala
        </p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('filial.index') }}" class="nav-link">
        <i class="nav-icon fas fa-store fa-lg"></i>
        <p>
          Filial
        </p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa-solid fa-list-check"></i>
        <p>
          Check-List Loja {{session()->get('filial')->codigo}}
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('check-list.index') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-table-list"></i>
             <p>Check-Lists</p>
          </a>
        </li>
        {{--  <li class="nav-item">
          <a href="{{ route('check-list.fechamento.index') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-door-closed"></i>
             <p>Fechamento</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ponto.relatorio') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-server"></i>
             <p>Log</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ponto.relatorio') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-scale-unbalanced-flip"></i>
             <p>Calibragem de balança</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-pump-soap"></i>
            <p>
              Limpeza
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ponto.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-clipboard-list fa-lg"></i>
                 <p>PDV</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ponto.relatorio') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-file-pdf fa-lg"></i>
                 <p>Rack</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ponto.relatorio') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-file-pdf fa-lg"></i>
                 <p>Consultores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ponto.relatorio') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-file-pdf fa-lg"></i>
                 <p>Sala CPD</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ponto.relatorio') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-computer"></i>
                 <p>Desktop</p>
              </a>
            </li>  --}}
          {{--  </ul>  --}}
        </li>
      </ul>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('codigo_barra.index') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-barcode"></i>
        <p>
          Gerar Cód Barra
        </p>
      </a>
    </li>
  </ul>
<!-- /.sidebar-menu -->