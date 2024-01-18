<div class="callout callout-info">
    {{-- <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Status Quinzenal de Balanças Frente de Loja</em></h5>
    <hr> --}}

    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title text-center" > <em> Quantidade de Desktop {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="consultor">Desktop's<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" min="1" oninput="desktopLoja()" value="{{isset($_GET['desktop']) ? $_GET['desktop'] : ''}}" name="desktop" id="desktop">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callout callout-info display_desktop" style="display: none;">
    <h5> <em> Limpeza dos desktop's / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
    <hr>
    <div class="row" id="desktop_loja">
       
    </div>            
</div> 

<script>
    function desktopLoja() {
        var desktop = document.getElementById('desktop');
        var desktop = desktop.value;
        $('#desktop_loja').html(``);
        $('.display_desktop').hide();

        for (let qdesktop = 1; qdesktop <= desktop; qdesktop++) {
            $('.display_desktop').show();
            $('#desktop_loja').append(`
                <div class="col-md-3">
                    <div class="callout callout-info" style=" padding: 0;">
                        <table class="table">
                            <thead>
                                <tr> 
                                    <th width="30%"><img src="{{asset('image/desktop.png')}}" height="60px"></th>
                                    <th width="43%"><b> Desktop `+qdesktop+` </b></th>
                                    <th width="43%">
                                        <input class="status form-control text-success" type="checkbox" name="status[]" style="height: 30px; width: 30px;">
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