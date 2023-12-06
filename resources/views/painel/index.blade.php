@extends('layout.app')

@section('title', 'Painel')

@section('page-title', 'Painel de Controle')

@section('content')
<h4 class="mt-3 MB-3"><em>ACESSO RÁPIDO</em></h4>
<hr>
<div class="row">
    <div class="col">
        <div class="small-box bg-info">
            <div class="inner">
                <h4>Minhas Informações</h4>
                <br>
            </div>
            <div class="icon">
                <i class="far fa-user" style="font-size: 44px;"></i>
            </div>
                <a href="{{route('usuario.perfil', auth()->user()->id)}}" class="small-box-footer">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col">
        <div class="small-box bg-info">
            <div class="inner">
                <h4>Consultar erro Sitef</h4>
                <br>
            </div>
            <div class="icon">
                <i class="fa-solid fa-triangle-exclamation" style="font-size: 44px;"></i>
            </div>
            {{--  <a class="small-box-footer" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>  --}}
                <a href="{{ route('erro-sitef.index') }}" class="small-box-footer">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col">
        <div class="small-box bg-info">
            <div class="inner">
                <h4>Horas Extras</h4>
                {{$hora_extra}}
            </div>
            <div class="icon">
                <i class="fas fa-hourglass-half" style="font-size: 44px;"></i>
            </div>
                <a href="{{ route('ponto.hora-extra') }}" class="small-box-footer">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col">
        <div class="small-box bg-info">
            <div class="inner">
                <h4>Relatório</h4>
                <br>
            </div>
            <div class="icon">
                <i class="far fa-file-pdf" style="font-size: 44px;"></i>
            </div>
            <a href="{{ route('ponto.relatorio') }}" class="small-box-footer">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<hr>        
@include('erro-sitef._partials.modal-consulta-erros-sitef')
@endsection

@section('scripts')
    {{--  <script>
        function consultarerro()
        {
            let cod_erro = $('#codigo').val()
            
            let url = "{{url('/')}}/api/errossitef/"+cod_erro+"/consultar"
           
            if(cod_erro != '')
            {
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(dados){
                        if(dados){
                            alert('ALERTA: Não é possível alterar este item. Existem medições relacionadas.')
                            $('#editar-fator-'+val.value).prop("checked", false)
                        }else{
                            $('.edicao_indice_produtivo'+val.value).attr("readonly", false)
                            $('.edicao_indice_improdutivo'+val.value).attr("readonly", false)
                            $('.edicao_indice_feriado'+val.value).attr("readonly", false)
                            $('.edicao_data_vigencia'+val.value).attr("readonly", false)
                        }
                    },
                    error: function(){
                        console.log('Ação indisponível no momento.')
                    }
                })
            }
        }
    </script>  --}}
@endsection