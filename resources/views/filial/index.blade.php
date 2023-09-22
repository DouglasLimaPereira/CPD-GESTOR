@extends('layout.app')

@section('title', 'Construtoras')

@section('page-title', 'Construtora')

@section('content')
    

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visualização</h3>
                    <div class="card-tools">
                        {{-- <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="{{route('spa.companys.create')}}" class="nav-link active">NOVO FUNCIONÁRIO</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="callout callout-info">
                                <b>Código: </b> {{$filial->id}}<br>
                                <b>Nome Fantasia:</b> {{$filial->nome_fantasia}}<br>
                                <b>CNPJ: </b> <span class="cnpj-view">{{$filial->cnpj}}</span><br>
                                <b>Endereço: </b> 
                                    {{$filial->logradouro}},
                                    Nº {{$filial->numero}}, {{($filial->complemento) ? '{$filial->logradouro} ,' : ''}}
                                    {{$filial->bairro}}, <span class="cep-view">{{$filial->cep}}</span>, {{$filial->cidade}} - {{$filial->uf}}

                            </div>
                            <div class="callout callout-info">
                                <b>Telefone: </b> {{($filial->telefone) ?? '-'}}<br>
                                <b>Whatsapp: </b> {{($filial->whatsapp) ?? '-'}}<br>
                                <b>E-mail SAC: </b> {{($filial->email) ?? '-'}}<br>
                                <b>E-mail Financeiro: </b> {{($filial->email_financeiro) ?? '-'}}<br>
                                <b>E-mail Comercial: </b> {{($filial->email_comercial) ?? '-'}}<br>
                                <b>Site: </b> {{($filial->website) ?? '-'}}<br>
                                <b>Instagram: </b> {{($filial->instagram) ?? '-'}}<br>
                            </div>
                            {{-- <div class="callout callout-info">
                                <b>Estado: </b> 
                                @switch($filial->estado)
                                    @case(0)
                                        <span class="badge badge-pill badge-secondary">Inativo</span>
                                        @break
                                    @case(1)
                                        <span class="badge badge-pill badge-primary">Ativo</span>
                                        @break
                                    @default
                                @endswitch
                                <br>
                                <b>Obras cadastradas: </b> {{$filial->canteiros->count()}}<br>
                                <b>Usuários cadastrados: </b> {{$filial->usuarios->count()}}<br>
                                <b>Tamanho do anexo: </b> {{$filial->limite_anexo}} mb
                            </div> --}}
                        </div>
                        {{-- <div class="col-md-6 p-2 text-center">
                            
                                @if($filial->logotipo)
                                    @if($filial->logo_origem == 'g')
                                        <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$filial->logotipo}}" width="500" alt="{{mb_strtoupper($filial->nome)}}" title="{{mb_strtoupper($filial->nome)}}">
                                    @elseif($filial->logo_origem == 'c')
                                        <img class="img-fluid" src="{{url('/')}}/storage/{{$filial->logotipo}}" width="500" alt="{{mb_strtoupper($filial->nome)}}" title="{{mb_strtoupper($filial->nome)}}">
                                    @endif
                                @else
                                    <span class="badge badge-secondary">Não existe logotipo cadastrado</span>
                                @endif
                            
                        </div> --}}
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- @elseif(request()->is('clientes/*')) --}}
                                <a href="#!" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>
                                @if(auth()->user()->filiais->where('filial_id', session()->get('filial_id'))->where('superadmin', true)->first())
                                    @can('editar', 'App\\Models\Construtora')
                                        <a href="{{route('filial.edit', $filial->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                    @endcan
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.cnpj-view').mask('00.000.000/0000-00')
            $('.cep-view').mask('00.000-000')
        })
    </script>
@endsection