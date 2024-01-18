<div class="callout callout-info">
    <h5> <em> Limpeza dos desktop / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
    <hr>
    <div class="row">
        @for ($pdv = 1; $pdv <= 10; $pdv++)
            <div class="col-md-3">
                <div class="callout callout-info" style=" padding: 0;">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th width="30%"><img src="{{asset('image/desktop.png')}}" height="60px"></th>
                                <th width="43%"><b> Balança {{$pdv}} </b></th>
                                <th width="43%">
                                    <input class="status form-control text-success" type="checkbox" name="status[{{$pdv}}]" style="height: 30px; width: 30px;">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endfor
    </div>            
</div> 