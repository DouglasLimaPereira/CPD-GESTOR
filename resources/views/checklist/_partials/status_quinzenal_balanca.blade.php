<div class="callout callout-info">
    <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Status Quinzenal de Balanças Frente de Loja</em></h5>
    <hr>

    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title text-center" ><i class="fa-solid fa-scale-balanced"></i> <em> Quantidade de Balanças {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="balanca_floja">Frente Loja<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaFrenteLoja()" value="{{isset($_GET['balanca_floja']) ? $_GET['balanca_floja'] : ''}}" name="balanca_floja" id="balanca_floja">
                </div>
                <div class="col">
                    <label for="balanca_acougue">Açougue<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaAcougue()" value="{{isset($_GET['balanca_acougue']) ? $_GET['balanca_acougue'] : ''}}" name="balanca_acougue" id="balanca_acougue">
                </div>
                <div class="col">
                    <label for="balanca_frios">Frios<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaFrios()" value="{{isset($_GET['balanca_frios']) ? $_GET['balanca_frios'] : ''}}" name="balanca_frios" id="balanca_frios">
                </div>
                <div class="col">
                    <label for="balanca_peixaria">Peixaria<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaPeixaria()" value="{{isset($_GET['balanca_peixaria']) ? $_GET['balanca_peixaria'] : ''}}" name="balanca_peixaria" id="balanca_peixaria">
                </div>
                <div class="col">
                    <label for="balanca_padaria">Padaria<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaPadaria()" value="{{isset($_GET['balanca_padaria']) ? $_GET['balanca_padaria'] : ''}}" name="balanca_padaria" id="balanca_padaria">
                </div>
                <div class="col">
                    <label for="balanca_hortifrute">Hortifrute<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaHortifrute()" value="{{isset($_GET['balanca_hortifrute']) ? $_GET['balanca_hortifrute'] : ''}}" name="balanca_hortifrute" id="balanca_hortifrute">
                </div>
                <div class="col">
                    <label for="balanca_doca">Doca<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaDoca()" value="{{isset($_GET['balanca_doca']) ? $_GET['balanca_doca'] : ''}}" name="balanca_doca" id="balanca_doca">
                </div>
                <div class="col">
                    <label for="balanca_pescoco">Pescoço<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaPescoco()" value="{{isset($_GET['balanca_pescoco']) ? $_GET['balanca_pescoco'] : ''}}" name="balanca_pescoco" id="balanca_pescoco">
                </div>
                <div class="col">
                    <label for="balanca_aerea">Aérea<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" onkeyup="balancaAerea()" value="{{isset($_GET['balanca_aerea']) ? $_GET['balanca_aerea'] : ''}}" name="balanca_aerea" id="balanca_aerea">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-info display_floja" style="display: none;">
    <h5> <i class="fa-solid fa-scale-balanced"></i> <em>Frente de Loja</em></h5>
    <hr>
    <div class="row" id="b_floja">
        
    </div>
</div>

<div class="callout callout-info display_acougue" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Açougue</em></h5>
    <hr>
    <div class="row" id="b_acougue">
        
    </div>
</div>

<div class="callout callout-info display_frios" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Frios</em></h5>
    <hr>
    <div class="row" id="b_frios">
        
    </div>
</div>

<div class="callout callout-info display_peixaria" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Peixaria</em></h5>
    <hr>
    <div class="row" id="b_peixaria">
        
    </div>
</div>

<div class="callout callout-info display_padaria" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Padaria</em></h5>
    <hr>
    <div class="row" id="b_padaria">
        
    </div>
</div>

<div class="callout callout-info display_hortifrute" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Hortifrute</em></h5>
    <hr>
    <div class="row" id="b_hortifrute">
        
    </div>
</div>

<div class="callout callout-info display_doca" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Doca</em></h5>
    <hr>
    <div class="row" id="b_doca">
        
    </div>
</div>

<div class="callout callout-info display_pescoco" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balança de Pescoço</em></h5>
    <hr>
    <div class="row" id="b_pescoco">
        
    </div>
</div>

<div class="callout callout-info display_aerea" style="display: none;">
    <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balança Aérea</em></h5>
    <hr>
    <div class="row" id="b_aerea">
       
    </div>
</div>