@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (isset($ponto))
    <form method="POST" action="{{ route('ponto.update', $ponto->id) }}" enctype="multipart/form-data">
    @method('PUT')
@else
    <form method="POST" action="{{ route('ponto.store') }}" enctype="multipart/form-data">
@endif
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="data">Data <span class="text-danger">*</span></label>
                <input type="date" name="data" class="form-control" id="data" value="{{(isset($ponto)) ? $ponto->data : date('d/m/Y')}}" required>
                @error('data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <label for="tipo">Tipo de Ponto <span class="text-danger">*</span></label>
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="">Selecione...</option>
                    <option value="1" {{ (isset($ponto) && $ponto->tipo == 1) ? 'selected' : '' }} >DIA TRABALHADO</option>
                    <option value="2" {{ (isset($ponto) && $ponto->tipo == 2) ? 'selected' : '' }} >DSR</option>
                    <option value="3" {{ (isset($ponto) && $ponto->tipo == 3) ? 'selected' : '' }} >FOLGA</option>
                </select>

                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="hora" {{(isset($ponto) && $ponto->tipo === 1) ? '': 'style="display: none"'}} >
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="entrada">Entrada</label>
                    <input type="time" name="entrada" class="form-control" value="{{isset($ponto) ? $ponto->entrada : old('entrada')}}">
                    @error('entrada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="entrada_almoco">Entrada Almoço</label>
                    <input class="form-control" id="entrada_almoco" type="time" name="entrada_almoco" value="{{isset($ponto) ? $ponto->entrada_almoco : old('entrada_almoco')}}">

                    @error('entrada_almoco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="comprovante1">Comprovante N° 1</label>
                    <span class="badge badge-info">.JPG .PNG .JPEG</span>
                    <input class="form-control" type="file" name="comprovante1" accept="image/png, image/jpeg, image/jpg">
                    @error('comprovante1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (isset($ponto) && ($ponto->comprovante1))
                        <br>
                        <a href="{{url('/')}}/storage/{{$ponto->comprovante1}}" target="_blank">
                            <img src="{{url('/')}}/storage/{{$ponto->comprovante1}}" width="150">
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="comprovante2">Comprovante N° 2</label>
                    <span class="badge badge-info">.JPG .PNG .JPEG</span>
                    <input class="form-control" type="file" name="comprovante2" accept="image/png, image/jpeg, image/jpg">
                    @error('comprovante2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (isset($ponto) && ($ponto->comprovante2))
                        <br>
                        <a href="{{url('/')}}/storage/{{$ponto->comprovante2}}" target="_blank">
                            <img src="{{url('/')}}/storage/{{$ponto->comprovante2}}" width="150">
                        </a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">    
            <div class="col-md-5">
                <div class="form-group">
                    <label for="saida_almoco">Saída Almoço</label>
                    <input class="form-control" id="saida_almoco" type="time" name="saida_almoco" value="{{isset($ponto) ? $ponto->saida_almoco : old('saida_almoco')}}">

                    @error('saida_almoco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="saida">Saída</label>
                    <input class="form-control" id="saida" type="time" name="saida" value="{{isset($ponto) ? $ponto->saida : old('saida')}}">

                    @error('saida')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="comprovante3">Comprovante N° 3</label>
                    <span class="badge badge-info">.JPG .PNG .JPEG</span>
                    <input class="form-control" type="file" name="comprovante3" accept="image/png, image/jpeg, image/jpg">
                    @error('comprovante3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (isset($ponto) && ($ponto->comprovante3))
                        <br>
                        <a href="{{url('/')}}/storage/{{$ponto->comprovante3}}" target="_blank">
                            <img src="{{url('/')}}/storage/{{$ponto->comprovante3}}" width="150">
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="comprovante4">Comprovante N° 4</label>
                    <span class="badge badge-info">.JPG .PNG .JPEG</span>
                    <input class="form-control" type="file" name="comprovante4" accept="image/png, image/jpeg, image/jpg">
                    @error('comprovante4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (isset($ponto) && ($ponto->comprovante4))
                        <br>
                        <a href="{{url('/')}}/storage/{{$ponto->comprovante4}}" target="_blank">
                            <img src="{{url('/')}}/storage/{{$ponto->comprovante4}}" width="150">
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <span class="text-danger">( * ) Campos Obrigatórios</span>
    </div>


    <hr>
    <div class="text-right">
        <a href="{{route('ponto.index')}}" class="btn btn-outline-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
        <button type="submit" class="btn btn-outline-success">{!!(isset($ponto)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
    </div>

    @section('scripts')
    <script>
        $('#tipo').change(function () {
            var select = document.getElementById('tipo');
            var index = select.options[select.selectedIndex].index;
            
            if (index === 1) {
                $('.hora').show();

            }else{
                $('.hora').hide();
            }
        })
    </script>
    @endsection