
<div class="callout callout-info">
    <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Status Quinzenal de Balanças Frente de Loja</em></h5>
    <hr>

    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title text-center" > <em> Quantidade de Consultores {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="consultor">Consultores<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="consultoresLoja()" value="{{isset($_GET['consultor']) ? $_GET['consultor'] : ''}}" name="consultor" id="consultor">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-info display_consultor" style="display: none;">
    <h5><em>Limpeza dos consulta preços</em></h5>
    <hr>
    <div class="row" id="consultor_loja">
        
    </div>
</div>

<script>
    function consultoresLoja() {
            var consultor = document.getElementById('consultor');
            var consultor = consultor.value;
            $('#consultor_loja').html(``);
            $('.display_consultor').hide();

            for (let qconsultor = 1; qconsultor <= consultor; qconsultor++) {
                $('.display_consultor').show();
                $('#consultor_loja').append(`
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th><img src="{{asset('assets/image/consultor.png')}}" height="60px"></th>
                                        <th width="25%"><b> Rua: <input class="form-control" min="1" type="number" name="consultor[]" id=""> </b></th>
                                        <th>
                                            <input class="form-control" type="file" name="foto[]">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                `);
            }
        }
</script>