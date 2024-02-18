{{-- @extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div  class="card-header"><h4><i class="fa-solid fa-eye"></i> Visualizar <b> {{ ($ponto->data) ? date('d/m/Y', strtotime($ponto->data)) : date('d/m/Y', strtotime($ponto->created_at)) }}</b> </h4></div>
                
                <div class="card-body">
                    <div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Entrada</th>
                                            <th>Entrada Almoço</th>
                                            <th>Saída Almoço</th>
                                            <th>Saída</th>
                                            <th> {{$ponto->horas_extras != '' ? 'Hora Extra' : 'Hora Negaiva' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> {{date('H:i:s', strtotime( $ponto->entrada) )}}</td>
                                            <td> {{ date('H:i:s', strtotime($ponto->entrada_almoco))}} </td>
                                            <td> {{ date('H:i:s', strtotime($ponto->saida_almoco))}} </td>
                                            <td> {{date('H:i:s', strtotime($ponto->saida))}} </td>
                                            <td> {{ $ponto->horas_extras != '' ? date('H:i:s', strtotime($ponto->horas_extras)) : date('H:i:s', strtotime($ponto->horas_negativas))}} </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if ($ponto->comprovante1 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante1}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante1}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante2 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante2}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante2}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante3 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante3}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante3}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ponto->comprovante4 != '')
                                                    <a href="{{url('/')}}/storage/{{$ponto->comprovante4}}" target="_blank">
                                                        <img src="{{url('/')}}/storage/{{$ponto->comprovante4}}" width="150">
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




@extends('layout.app')

@section('title', 'Visualizar - Ponto')

@section('page-title', 'Ponto')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="far fa-eye"></i> Visualizar Ponto</h3>
                <div class="card-tools">
                    {{-- <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{route('spa.canteiros.create')}}" class="nav-link active">NOVO FUNCIONÁRIO</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-info">
                            <b>Data: </b> {{ date('d / m / Y', strtotime($ponto->data)) }}<br>
                            <b>Tipo: </b>
                            @if ($ponto->tipo === 1)
                                {!!'<span class="badge badge-primary" style="font-size: 15px;">DIA TRABALHADO</span>'!!}
                            @elseif ($ponto->tipo === 2)
                                {!!'<span class="badge badge-warning" style="font-size: 15px;">DSR</span>'!!}
                            @else
                                {!!'<span class="badge badge-success" style="font-size: 15px;">FOLGA</span>'!!}
                            @endif
                            <br>
                            <b>Horario de Entrada: </b><br>
                            <i class="fas fa-stopwatch fa-lg" style="color: #005eff;"></i> <span class="badge badge-primary" style="font-size: 15px;">{{$ponto->entrada}}</span><br>
                            <b>Horario de Entrada K3: </b><br>
                            <i class="fas fa-stopwatch fa-lg" style="color: #005eff;"></i> <span class="badge badge-primary" style="font-size: 15px;">{{ $ponto->entrada_almoco }}</span><br>
                            <b>Horario de Saída K3: </b><br>
                            <i class="fas fa-stopwatch fa-lg" style="color: #005eff;"></i> <span class="badge badge-primary" style="font-size: 15px;">{{ $ponto->saida_almoco }}</span><br>
                            <b>Horario de Saída: </b><br>
                            <i class="fas fa-stopwatch fa-lg" style="color: #005eff;"></i> <span class="badge badge-primary" style="font-size: 15px;">{{ $ponto->saida }}</span><br>
                        </div>
                    </div>
                    
                    {{-- <div class="callout callout-info col-md-6 border p-2 text-center">
                        <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/{{str_replace('public', 'storage', $usuario->imagem)}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                        @if($usuario->where('imagem_origem', 'c'))
                            <img class="img-fluid" src="{{url('/')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                        @else
                            <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                        @endif
                        
                    </div> --}}
                </div>
                <div class="dropdown-divider"></div>
                <div class="text-right">
                    <a href="{{route('ponto.index')}}" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>
                        
                    <a href="{{ route('ponto.edite', [$ponto->id]) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
