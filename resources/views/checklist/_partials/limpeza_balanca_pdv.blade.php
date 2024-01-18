<div class="callout callout-info">
    <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Limpeza Balanças Frente de Loja</em></h5>
    <hr>

    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title text-center" ><i class="fa-solid fa-scale-balanced"></i> <em> Quantidade de Balanças Frente de Loja {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="balanca_floja">Balanças Pdv's Loja<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="balancaPdvLoja()" value="{{isset($_GET['balanca_pdv_floja']) ? $_GET['balanca_pdv_floja'] : ''}}" name="balanca_pdv_floja" id="balanca_pdv_floja">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-info display_floja" style="display: none;">
    <div class="row" id="pdv_floja">
        
    </div>
</div>

<script>
    function balancaPdvLoja() {
            var frente_loja = document.getElementById('balanca_pdv_floja');
            var frente_loja = frente_loja.value;
            $('#pdv_floja').html(``);
            $('.display_floja').hide();
           
            for (let bfl = 1; bfl <= frente_loja; bfl++) {
                $('.display_floja').show();
                $('#pdv_floja').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
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
</script>