<div class="callout callout-info">
    <h5><em>Log Mfe</em></h5>
    <hr>
    <div class="row">
        @for ($i = 1; $i <= 5; $i++)
            <div class="col-md-4">
                <div class="callout callout-info" style=" padding: 0;">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th><img src="{{asset('image/mfe.png')}}" height="60px"></th>
                                {{--  <th width="23%"><b style="margin-top: -5px"> IP </b></th>  --}}
                                <th width="53%"><b> IP: <input class="form-control" type="text" name="mfe[{{$i}}]" id=""> </b></th>
                                {{--  <th width="33%"><b> Status </b></th>  --}}
                                <th width="">
                                    <input class="status" type="checkbox" name="status{{$i}}">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endfor
    </div>
</div>