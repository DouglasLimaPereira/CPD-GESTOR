@extends('layout.app')

@section('title', 'Companies - Gestão')

@section('page-title', "Construtoras / $company->nome_fantasia" )

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Dados da Construtora</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            {{-- <li class="nav-item">
                                <a href="{{route('construtoras.index')}}" class="nav-link btn btn-secondary text-light">CANCELAR</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-header bg-light">
                                <div class="col-md-6">
                                    <b>CONSTRUTORA:</b> {{$company->nome_fantasia}} <br>
                                    <b>CNPJ:</b> {{$company->cnpj}} <br>
                                    <b>EMAIL:</b> {{$company->email}} <br>
                                    <b>Estado:</b> {!!($company->estado) ? '<span class="badge badge-success">ATIVA</span>' : '<span class="badge badge-danger">INATIVA</span>'!!}  
                                </div>
                                <div class="col-md-12 text-right">
                                    
                                    <a href="javascript:void(0)" onclick="status({{$company->id}})" class="btn btn-md btn-info">{!!$company->estado ? '<i class="fas fa-lock"></i> Inativar' : '<i class="fas fa-lock-open"></i> Ativar'!!}</a>

                                    {{-- @if ($company->estado)
                                        <a href="javascript:void(0)" onclick="status({{$company->id}}, false)" class="btn btn-md btn-warning">Inativar</a>
                                    @else
                                    <a href="javascript:void(0)" onclick="status({{$company->id}}, true)" class="btn btn-md btn-warning">Ativar</a>
                                    @endif --}}
                        
                                    <a href="{{route('construtoras.edit', $company->id)}}" class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-md btn-danger"><i class="fas fa-trash"></i> Remover</a>
                                </div>
                        </div>
                        <div class="row mt-3 ml-3 mr-3">
                            {{-- <li class="list-group-item"> --}}
                            {{-- <li class="list-group-item bg-light">
                                <h5><em><i class="fas fa-caret-right"></i> RECURSOS</em></h5>
                            </li> --}}
                            
                                {{-- <div class="row"> --}}
                                    <div class="col-md-3">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                            <h3>{{$company->canteiros->count()}}</h3>
                                            <p>Empreendimentos</p>
                                            </div>
                                            <div class="icon">
                                                <i class="nav-icon far fa-building"></i>
                                            </div>
                                            <a href="{{route('construtoras.canteiros.index', $company->id)}}" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>      
                                    </div>
                                {{-- </div> 
                            </li>--}}
                            {{-- <li class="list-group-item bg-light">
                                <h5>
                                    <em><i class="fas fa-caret-right"></i> PESSOAS</em><br>
                                    <small>Total: {{$company->pessoas->count()}}</small>
                                </h5>
                            </li> 
                            <li class="list-group-item">
                                <div class="row">--}}
                                    {{-- <div class="col-md-3">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                            <h3>{{$company->funcionarios->count()}}</h3>
                                            <p>Funcionários</p>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-address-card"></i>
                                            </div>
                                            <a href="{{route('construtoras.funcionarios.index', $company->id)}}" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>      
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                            <h3>{{$company->users->where('superadmin', true)->count()}}</h3>
                                            <p>Administradores</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-friends"></i>
                                            </div>
                                            <a href="{{route('construtoras.usuarios.index', $company->id)}}" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>      
                                    </div>
                                {{-- </div> --}}
                            </li>
                            {{-- <li class="list-group-item bg-light">
                                <h5><em><i class="fas fa-caret-right"></i> CONFIGURAÇÕES</em></h5>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                            <h3>{{$company->funcoes->count()}}</h3>
                                            <p>Funções</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-hand-paper"></i>
                                            </div>
                                            <a href="{{route('construtoras.funcoes.index', $company->id)}}" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>      
                                    </div>
                                </div>
                            </li> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function status(companyid)
        {
            ( {{$company->estado}} ) ? $confirmacao = confirm("Deseja desativar está Construtora?") : $confirmacao = confirm("Deseja Ativar está Construtora?");

            if($confirmacao){

                window.location.href = "{{ url('/') }}/construtoras/"+companyid+"/atualiza-estado"

            }

        }

    </script>

@endsection