<div class="callout callout-info">
    <h5><em>Limpeza dos consulta preços</em></h5>
    <hr>
    <div class="row">
        @for ($i = 1; $i <= 14; $i++)
        <div class="col-md-4">
            <div class="callout callout-info" style=" padding: 0;">
                <table class="table">
                    <thead>
                        <tr> 
                            <th><img src="{{asset('image/consultor.png')}}" height="60px"></th>
                            <th width="20%"><b> Rua: <input class="form-control" type="number" name="consultor[{{$i}}]" id=""> </b></th>
                            <th>
                                <input class="form-control" type="file" name="foto[{{$i}}]">
                            </th>
                            <th>
                                <input class="form-control" height="30" width="30" type="checkbox" name="status[{{$i}}]" style="height: 30px; width: 30px;">
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @endfor
    </div>
</div>