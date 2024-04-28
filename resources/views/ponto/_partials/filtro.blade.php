<form action="{{route('ponto.relatorio')}}" method="GET">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header font-weight-bold">
                    <div class="row">
                        <div class="col-md-10">
                            <i class="fa-solid fa-filter"></i> FILTRO
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        {{--  <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-solid fa-calendar"></i> DATA INICIAL</label>
                                <input type="date" class="form-control" name="data_inicio" id="" value="{{ (isset($_GET['data_inicio'])) ? $_GET['data_inicio'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-solid fa-calendar"></i> DATA FINAL</label>
                                <input type="date" class="form-control" name="data_fim" id="" value="{{ (isset($_GET['data_fim'])) ? $_GET['data_fim'] : '' }}">
                            </div>
                        </div>  --}}
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-regular fa-calendar"></i> MÊS</label>
                                <select class="form-control" name="mes" id="mes">
                                    <option value="">Selecione...</option>
                                    @foreach ($meses as $key => $value)
                                        <option value="{{$key}}" {{ (isset($mes) && $mes == $key) ? "selected" : '' }}> {{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="funcionario"><i class="fa-regular fa-user"></i> FUNCIONÁRIO</label>
                                <select class="form-control" name="funcionario" id="funcionario">
                                    <option value="">Selecione...</option>
                                    @foreach ($funcionarios as $func)
                                        <option value="{{$func->id}}" {{ ($func->id == $user_id) ? "selected" : '' }}> {{$func->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-regular fa-clock"></i> HORA ENTRADA K3</label>
                              <input type="time" class="form-control" name="entrada_almoco" id="entrada" value="{{ (isset($_GET['entrada_almoco'])) ? $_GET['entrada_almoco'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-regular fa-clock"></i> HORA VOLTA K3</label>
                              <input type="time" class="form-control" name="saida_almoco" id="entrada" value="{{ (isset($_GET['saida_almoco'])) ? $_GET['saida_almoco'] : '' }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="mes"><i class="fa-regular fa-clock"></i> HORA SAÍDA</label>
                              <input type="time" class="form-control" name="saida" id="entrada" value="{{ (isset($_GET['saida'])) ? $_GET['saida'] : '' }}">
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-2 float-right">
                        <button type="submit" class="form-control btn btn-outline-info">Filtrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
