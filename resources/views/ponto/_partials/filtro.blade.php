<form action="{{route('ponto.relatorio')}}" method="GET">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark font-weight-bold">
                    <div class="row">
                        <div class="col-md-10">
                            FILTRO
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="form-control btn btn-light">Filtrar</button>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="mes">DATA INICIAL</label>
                                <input type="date" class="form-control" name="data_inicio" id="" value="{{ (isset($_GET['data_inicio'])) ? $_GET['data_inicio'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes">DATA FINAL</label>
                                <input type="date" class="form-control" name="data_fim" id="" value="{{ (isset($_GET['data_fim'])) ? $_GET['data_fim'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes">HORA ENTRADA</label>
                              <input type="time" class="form-control" name="entrada" id="entrada" value="{{ (isset($_GET['entrada'])) ? $_GET['entrada'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes">HORA ENTRADA K3</label>
                              <input type="time" class="form-control" name="entrada_almoco" id="entrada" value="{{ (isset($_GET['entrada_almoco'])) ? $_GET['entrada_almoco'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes">HORA VOLTA K3</label>
                              <input type="time" class="form-control" name="saida_almoco" id="entrada" value="{{ (isset($_GET['saida_almoco'])) ? $_GET['saida_almoco'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes">SAÍDA</label>
                              <input type="time" class="form-control" name="saida" id="entrada" value="{{ (isset($_GET['saida'])) ? $_GET['saida'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>