
<div class="card2 card border-0 px-4 py-5">
    @if (isset($ponto))
        <form method="POST" action="{{ route('ponto.update', $ponto->id) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('ponto.store') }}" enctype="multipart/form-data">
    @endif
    @csrf
        <div class="row">
            <div class="col">
                <label for="data" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Data') }}</h6></label>
                <input class="mb-4" type="date" name="data" value="{{isset($ponto) ? $ponto->data : date('d/m/Y', strtotime(now()))}}">
                @error('data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <label for="entrada" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Entrada') }}</h6></label>
                <input class="mb-4" type="time" name="entrada" value="{{isset($ponto) ? $ponto->entrada : old('entrada')}}">
                @error('entrada')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col">
                <label for="entrada_almoco" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Entrada Almoço') }}</h6></label>
                <input id="entrada_almoco" type="time" name="entrada_almoco" value="{{isset($ponto) ? $ponto->entrada_almoco : old('entrada_almoco')}}">

                @error('entrada_almoco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col">
                <label for="saida_almoco" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Saída Almoço') }}</h6></label>
                <input id="saida_almoco" type="time" name="saida_almoco" value="{{isset($ponto) ? $ponto->saida_almoco : old('saida_almoco')}}">

                @error('saida_almoco')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col">
                <label for="saida" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Saída') }}</h6></label>
                <input id="saida" type="time" name="saida" value="{{isset($ponto) ? $ponto->saida : old('saida')}}">

                @error('saida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="dsr" class="mb-1"><h6 class="mb-0 text-sm">{{ __('DSR ?') }}</h6></label>
                <select class="form-control" name="dsr" id="dsr" required>
                    <option disabled selected>Selecione...</option>
                    <option value="1" {{ (isset($ponto) && $ponto->dsr == 1) ? 'selected' : '' }} >SIM</option>
                    <option value="0" {{ (isset($ponto) && $ponto->dsr == 0) ? 'selected' : '' }} >NÃO</option>
                </select>

                @error('dsr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <label for="comprovante1" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Comprovante N° 1') }}</h6></label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="mb-4" type="file" name="comprovante1" accept="image/png, image/jpeg, image/jpg">
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

            <div class="col">
                <label for="comprovante2" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Comprovante N° 2') }}</h6></label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="mb-4" type="file" name="comprovante2" accept="image/png, image/jpeg, image/jpg">
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

            <div class="col">
                <label for="comprovante3" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Comprovante N° 3') }}</h6></label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="mb-4" type="file" name="comprovante3" accept="image/png, image/jpeg, image/jpg">
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

            <div class="col">
                <label for="comprovante4" class="mb-1"><h6 class="mb-0 text-sm">{{ __('Comprovante N° 4') }}</h6></label>
                <span class="badge badge-info">.JPG .PNG .JPEG</span>
                <input class="mb-4" type="file" name="comprovante4" accept="image/png, image/jpeg, image/jpg">
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

            <div class="px-3">
                <button type="submit" class="btn btn-primary text-center float-end" style="background-color: #0095d9;width: 150px;color: #fff;border-radius: 2px;">{{ isset($ponto) ? __('Atualizar') : __('Cadastrar') }}</button>
            </div>
        </div>
    </form>
</div>