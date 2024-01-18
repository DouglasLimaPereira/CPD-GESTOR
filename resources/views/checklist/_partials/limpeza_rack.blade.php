<div class="callout callout-info">
    <h5> <em> Limpeza dos Hacks / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
    <hr>
    <div class="row">
        <div class="col-3">
            <label for="rack">Quantidade de Rack<span class="text-danger">*</span></label>
            <input type="number" class="form-control" value="{{isset($_GET['rack']) ? $_GET['rack'] : ''}}" name="rack" id="rack">
        </div>
    </div>
    <hr>
    <div class="row">
        @for ($pdv = 1; $pdv <= 4; $pdv++)
            <div class="col-md-3">
                <div class="callout callout-info" style=" padding: 0;">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th width="30%"><img src="{{asset('image/hack.png')}}" height="60px"></th>
                                <th width="43%"><b> Balança {{$pdv}} </b></th>
                                <th width="43%">
                                    <input class="status form-control" type="checkbox" name="status[{{$pdv}}]" style="height: 30px; width: 30px;">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endfor
    </div>            
</div>