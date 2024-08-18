@extends('layout.app')

@section('title', 'Pontos')

@section('page-title')
<h1 class="card-title"><i class="fa-solid fa-computer"></i> Senha PDVs 64<sub>bits</sub></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    {{--  <h3 class="card-title"><i class="fa-solid fa-computer"></i> Senha dos PDVs </h3>  --}}
                </div>
                <div class="card-body">
                    <div class="row justify-content-start">
                        @for ($pdv = 1; $pdv <= 35; $pdv++)                            
                        <div class="col-md-2">
                            <div class="callout callout-info" style=" padding: 0;">
                                <table class="table">
                                    <thead>
                                        <tr> 
                                            <th width="20%"><img src="{{asset('assets/image/pdv.png')}}" height="60px"></th>
                                            <th width="43%">
                                                <b> PDV {{$pdv}} </b> <br>
                                                <button class="btn btn-sm btn-info" onclick="copiarTexto({{$pdv}})"><i class="fa-regular fa-copy fa-lg"></i></button>
                                                <b id="{{$pdv}}"> 
                                                    {{'pdv@' . $valor + $pdv}}
                                                </b>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function copiarTexto($pdv) {
        var texto = document.getElementById($pdv).textContent;
        navigator.clipboard.writeText(texto).then(function() {
            toastr.success('Senha PDV '+$pdv+' copiado para a área de transferência.');
        }, function() {
            toastr.error('Falha ao copiar o texto.');
        });
    }
</script>
@endsection