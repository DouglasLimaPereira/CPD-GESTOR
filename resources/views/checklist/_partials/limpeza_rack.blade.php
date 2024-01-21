
<div class="callout callout-info">
    {{-- <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Status Quinzenal de Balanças Frente de Loja</em></h5> --}}
    {{-- <hr> --}}

    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title text-center" > <em> Quantidade de Rack's {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="consultor">Rack's<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="racksLoja()" value="{{isset($_GET['rack']) ? $_GET['rack'] : ''}}" name="rack" id="rack">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-info display_rack" style="display: none">
    <h5> <em> Limpeza dos Hacks / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
    <hr>
    <div class="row" id="rack_loja">
        
    </div>            
</div>

<script>
    function racksLoja() {
        var consultor = document.getElementById('rack');
        var consultor = consultor.value;
        $('#rack_loja').html(``);
        $('.display_rack').hide();

        for (let qconsultor = 1; qconsultor <= consultor; qconsultor++) {
            $('.display_rack').show();
            $('#rack_loja').append(`
                <div class="col-md-3">
                <div class="callout callout-info" style=" padding: 0;">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th width="30%"><img src="{{asset('assets/image/hack.png')}}" height="60px"></th>
                                <th width="43%"><b> Rack `+qconsultor+` </b></th>
                                <th width="43%">
                                    <input class="status form-control" type="checkbox" name="status[]" style="height: 30px; width: 30px;">
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