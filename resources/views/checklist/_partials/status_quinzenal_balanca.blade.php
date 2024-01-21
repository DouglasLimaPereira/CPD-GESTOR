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
                    <input type="number" class="form-control" min="1" oninput="balancaFrenteLoja()" value="{{isset($_GET['balanca_floja']) ? $_GET['balanca_floja'] : ''}}" name="balanca_floja" id="balanca_floja">
                </div>
                <div class="col">
                    <label for="balanca_acougue">Açougue<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaAcougue()" value="{{isset($_GET['balanca_acougue']) ? $_GET['balanca_acougue'] : ''}}" name="balanca_acougue" id="balanca_acougue">
                </div>
                <div class="col">
                    <label for="balanca_frios">Frios<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaFrios()" value="{{isset($_GET['balanca_frios']) ? $_GET['balanca_frios'] : ''}}" name="balanca_frios" id="balanca_frios">
                </div>
                <div class="col">
                    <label for="balanca_peixaria">Peixaria<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaPeixaria()" value="{{isset($_GET['balanca_peixaria']) ? $_GET['balanca_peixaria'] : ''}}" name="balanca_peixaria" id="balanca_peixaria">
                </div>
                <div class="col">
                    <label for="balanca_padaria">Padaria<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaPadaria()" value="{{isset($_GET['balanca_padaria']) ? $_GET['balanca_padaria'] : ''}}" name="balanca_padaria" id="balanca_padaria">
                </div>
                <div class="col">
                    <label for="balanca_hortifrute">Hortifrute<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaHortifrute()" value="{{isset($_GET['balanca_hortifrute']) ? $_GET['balanca_hortifrute'] : ''}}" name="balanca_hortifrute" id="balanca_hortifrute">
                </div>
                <div class="col">
                    <label for="balanca_doca">Doca<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaDoca()" value="{{isset($_GET['balanca_doca']) ? $_GET['balanca_doca'] : ''}}" name="balanca_doca" id="balanca_doca">
                </div>
                <div class="col">
                    <label for="balanca_pescoco">Pescoço<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaPescoco()" value="{{isset($_GET['balanca_pescoco']) ? $_GET['balanca_pescoco'] : ''}}" name="balanca_pescoco" id="balanca_pescoco">
                </div>
                <div class="col">
                    <label for="balanca_aerea">Aérea<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaAerea()" value="{{isset($_GET['balanca_aerea']) ? $_GET['balanca_aerea'] : ''}}" name="balanca_aerea" id="balanca_aerea">
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

<script>
    function balancaFrenteLoja() {
            var frente_loja = document.getElementById('balanca_floja');
            var frente_loja = frente_loja.value;
            $('#b_floja').html(``);
            $('.display_floja').hide();
           
            for (let bfl = 1; bfl <= frente_loja; bfl++) {
                $('.display_floja').show();
                $('#b_floja').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="43%">
                                            <b> Balança `+bfl+` </b>
                                            <b><input class="form-control" type="number" name="" id=""> </b>
                                        </th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaAcougue() {
            var acougue = document.getElementById('balanca_acougue');
            var acougue = acougue.value;
            $('#b_acougue').html(``);
            $('.display_acougue').hide();
           
            for (let bfl = 1; bfl <= acougue; bfl++) {
                $('.display_acougue').show();
                $('#b_acougue').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaFrios() {
            var frios = document.getElementById('balanca_frios');
            var frios = frios.value;
            $('#b_frios').html(``);
            $('.display_frios').hide();
           
            for (let bfl = 1; bfl <= frios; bfl++) {
                $('.display_frios').show();
                $('#b_frios').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaPeixaria() {
            var peixaria = document.getElementById('balanca_peixaria');
            var peixaria = peixaria.value;
            $('#b_peixaria').html(``);
            $('.display_peixaria').hide();
           
            for (let bfl = 1; bfl <= peixaria; bfl++) {
                $('.display_peixaria').show();
                $('#b_peixaria').append(`   
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaPadaria() {
            var padaria = document.getElementById('balanca_padaria');
            var padaria = padaria.value;
            $('#b_padaria').html(``);
            $('.display_padaria').hide();
           
            for (let bfl = 1; bfl <= padaria; bfl++) {
                $('.display_padaria').show();
                $('#b_padaria').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaHortifrute() {
            var hortifrute = document.getElementById('balanca_hortifrute');
            var hortifrute = hortifrute.value;
            $('#b_hortifrute').html(``);
            $('.display_hortifrute').hide();
           
            for (let bfl = 1; bfl <= hortifrute; bfl++) {
                $('.display_hortifrute').show();
                $('#b_hortifrute').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaDoca() {
            var doca = document.getElementById('balanca_doca');
            var doca = doca.value;
            $('#b_doca').html(``);
            $('.display_doca').hide();
           
            for (let bfl = 1; bfl <= doca; bfl++) {
                $('.display_doca').show();
                $('#b_doca').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaPescoco() {
            var pescoco = document.getElementById('balanca_pescoco');
            var pescoco = pescoco.value;
            $('#b_pescoco').html(``);
            $('.display_pescoco').hide();
           
            for (let bfl = 1; bfl <= pescoco; bfl++) {
                $('.display_pescoco').show();
                $('#b_pescoco').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };

        function balancaAerea() {
            var aerea = document.getElementById('balanca_aerea');
            var aerea = aerea.value;
            $('#b_aerea').html(``);
            $('.display_aerea').hide();
            
            for (let bfl = 1; bfl <= aerea; bfl++) {
                $('.display_aerea').show();
                $('#b_aerea').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('assets/image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança `+bfl+` </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status`+bfl+`">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        };
</script>