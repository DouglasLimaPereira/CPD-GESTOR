@extends('layout.app')

@section('title', 'Gerar Codigo de Barras')

@section('page-title', 'Gerar Codigo de Barras')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{ route('codigo-barras.index') }}" method="GET">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" value="{{ isset($codigo) ? $codigo : '' }}" required>
                            </div>
                        </div>
                        @if(isset($codigo))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="callout callout-info" style="background-color: #dee1e5">
                                        <div class="codigo">
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'C39',1,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'C39+',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'C39E',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'C39E+',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'C93',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'S25',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'S25+',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'I25',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'MSI+',2,53,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($codigo, 'POSTNET',2,50,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($codigo, 'QRCODE',3,3,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($codigo, 'PDF417',1,1,array(1,1,1), true)}}" alt="barcode" />
                                            <br>
                                            <hr>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($codigo, 'DATAMATRIX',3,3,array(1,1,1), true)}}" alt="barcode" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
