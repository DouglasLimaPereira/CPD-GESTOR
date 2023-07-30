@if(request()->is('spa/*'))
    <form action="{{route('spa.funcionarios.index')}}" method="GET">
@elseif(request()->is('clientes/*'))
    <form action="{{route('clientes.funcionarios.index')}}" method="GET">
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary font-weight-bold">
                    Filtro
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                @if(request()->is('spa/*'))
                                    <a href="{{route('spa.funcionarios.index')}}" class="btn btn-default">Limpar Busca</a>
                                @elseif(request()->is('clientes/*'))
                                    <a href="{{route('clientes.funcionarios.index')}}" class="btn btn-default">Limpar Busca</a>
                                @endif
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="funcao">Função</label>
                                <select name="funcao_id" id="funcao_id" class="form-control funcao_id" data-live-search="true" data-style="border-secondary">
                                    <option value="">Selecione...</option>
                                    <option value="todos" class="text-primary" {{(isset($_GET['funcao_id']) && $_GET['funcao_id'] == 'todos') ? 'selected' : ''}}>Todos</option>
                                    @foreach($funcoes as $funcao)
                                        <option value="{{$funcao->id}}" {{(isset($_GET['funcao_id']) && $_GET['funcao_id'] == $funcao->id) ? 'selected' : ''}}>{{$funcao->id}} / {{$funcao->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="todos" class="text-primary" {{(isset($_GET['estado']) && $_GET['estado'] == 'todos') ? 'selected' : ''}}>Todos</option>
                                    <option value="ativo" {{(isset($_GET['estado']) && $_GET['estado'] == 'ativo') ? 'selected' : ''}}>Ativo</option>
                                    <option value="demitido" {{(isset($_GET['estado']) && $_GET['estado'] == 'demitido') ? 'selected' : ''}}>Demitido</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</form>