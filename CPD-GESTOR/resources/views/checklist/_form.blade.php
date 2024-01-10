@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list">
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(isset($check_list))
    <form action="{{route('usuario.update', $check_list->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('usuario.store')}}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="checklist">Tipo de Check-list <span class="text-danger">*</span></label>
            <select name="checklist" id="checklist" class="form-control">
                <option value="">--- Selecione ---</option>
                <option value="">Abertura</option>
                <option value="">Fechamento</option>
                <option value="">Balança</option>
                <option value="">Log MFE</option>
                <option value="">Limpeza Consultor</option>
                <option value="">Limpeza Balança Pdv</option>
                <option value="">Limpeza dos Hacks</option>
                <option value="">Limpeza Desktop</option>
            </select>
        </div>
    </div>

    <div class="Abertura_Fechamento" style="display: none">
        <div class="callout callout-info">
            <div id="checklist" class="abertura col-md-4">
                <h5 class="Titulo mt-3"></h5>
                <hr>
                <div class="callout callout-info" style=" padding: 0; margin-top: 15px;">
                    <table class="table">
                        <thead>
                            <tr> 
                                <th width="20%"><img src="{{asset('image/caixa_som.png')}}" height="60px"></th>
                                <th width="31%"><b> Rádio </b></th>
                                <th width="33%"><b> Status </b></th>
                                <th>
                                    <input class="status" type="checkbox" name="status" id="">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div id="checklist" class="abertura col-md-4">
                <div class="callout callout-info" style=" padding: 0; margin-top: 15px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%"><img src="{{asset('image/consultor.png')}}" height="60px"></th>
                                <th width="33%"><b> Consultores </b></th>
                                <th width="33%"><b> Status </b></th>
                                <th>
                                    <input class="status" type="checkbox" name="status" id="">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div id="checklist" class="abertura col-md-4">
                <div class="callout callout-info" style=" padding: 0; margin-top: 15px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%"><img src="{{asset('image/pdv.png')}}" height="60px"></th>
                                <th width="33%"><b> PDV/s </b></th>
                                <th width="33%"><b> Status </b></th>
                                <th>
                                    <input class="status" type="checkbox" name="status" id="">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div id="checklist" class="abertura col-md-4">
                <div class="callout callout-info" style=" padding: 0; margin-top: 15px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%"><img src="{{asset('image/painel_senha.png')}}" height="60px"></th>
                                <th width="33%"><b> Paineis Senhas </b></th>
                                <th width="33%"><b> Status </b></th>
                                <th>
                                    <input class="status" type="checkbox" name="status" id="">
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="check-out-balanca" style="display: none">
        <div class="callout callout-info">
            <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Balanças de Check-out Frente de Loja / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
            <hr>
            <div class="row">
                @for ($pdv = 101; $pdv <= 135; $pdv++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$pdv}} </b></th>
                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>
                                        <th>
                                            <input class="status" type="checkbox" name="status{{$pdv}}">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>        
        </div>

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Açougue</em></h5>
            <hr>
            <div class="row">
                @for ($i = 14; $i <= 19; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Frios</em></h5>
            <hr>
            <div class="row">
                @for ($i = 20; $i <= 24; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Peixaria</em></h5>
            <hr>
            <div class="row">
                @for ($i = 25; $i <= 27; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Padaria</em></h5>
            <hr>
            <div class="row">
                @for ($i = 28; $i <= 31; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Hortifrute</em></h5>
            <hr>
            <div class="row">
                @for ($i = 32; $i <= 33; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balanças Doca</em></h5>
            <hr>
            <div class="row">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balança de Pescoço</em></h5>
            <hr>
            <div class="row">
                @for ($i = 1; $i <= 2; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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

        <div class="callout callout-info">
            <h5><i class="fa-solid fa-scale-balanced"> </i> <em>Balança Aérea</em></h5>
            <hr>
            <div class="row">
                @for ($i = 1; $i <= 2; $i++)
                    <div class="col-md-4">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="20%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="33%"><b> Balança {{$i}} </b></th>
                                                                                        <th width="33%"><b>Peso: <input class="form-control" type="number" name="" id=""> </b></th>

                                        <th>
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
    </div>

    <div class="Log-mfe" style="display: none">
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
    </div>

    <div class="limpeza-consultor" style="display: none">
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
    </div>       

    <div class="limpeza-balanca" style="display: none">
        <div class="callout callout-info">
            <h5> <i class="fa-solid fa-scale-balanced"></i> <em> Limpeza Balanças de Check-out Frente de Loja / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
            <hr>
            <div class="row">
                @for ($pdv = 101; $pdv <= 135; $pdv++)
                    <div class="col-md-3">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="30%"><img src="{{asset('image/balanca-checkout.png')}}" height="60px"></th>
                                        <th width="43%"><b> Balança {{$pdv}} </b></th>
                                        <th width="43%">
                                            <input class="status form-control" type="checkbox" name="status[{{$pdv}}]" style="height: 30px; width: 30px;">
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

    <div class="limpeza-hack" style="display: none">
        <div class="callout callout-info">
            <h5> <em> Limpeza dos Hacks / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
            <hr>
            <div class="row">
                @for ($pdv = 1; $pdv <= 4; $pdv++)
                    <div class="col-md-3">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="30%"><img src="{{asset('image/hack.png')}}" height="60px"></th>
                                        <th width="43%"><b> Balança {{$pdv}} </b></th>
                                        <th width="43%">
                                            <input class="status form-control" type="checkbox" name="status[{{$pdv}}]" style="height: 30px; width: 30px;">
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

    <div class="limpeza-desktop" style="display: none">
        <div class="callout callout-info">
            <h5> <em> Limpeza dos desktop / {{session()->get('filial')->nome_fantasia}} {{session()->get('filial')->codigo}} </em></h5>
            <hr>
            <div class="row">
                @for ($pdv = 1; $pdv <= 10; $pdv++)
                    <div class="col-md-3">
                        <div class="callout callout-info" style=" padding: 0;">
                            <table class="table">
                                <thead>
                                    <tr> 
                                        <th width="30%"><img src="{{asset('image/desktop.png')}}" height="60px"></th>
                                        <th width="43%"><b> Balança {{$pdv}} </b></th>
                                        <th width="43%">
                                            <input class="status form-control text-success" type="checkbox" name="status[{{$pdv}}]" style="height: 30px; width: 30px;">
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

    <hr>
    <div class="row float-right">
        {{--  <a href="{{route('painel.index')}}" class="btn btn-sm btn-secondary mr-3"><i class="fas fa-undo-alt"></i> Voltar</a>  --}}
        <button type="submit" class="btn btn-md btn-success mr-3">{!!(isset($check_list)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> CRIAR CHECK-LIST'!!}</button>
    </div>
  </form>

  @section('scripts')
    <script>
        $('#checklist').click(function () {
            var select = document.getElementById('checklist');
            var text = select.options[select.selectedIndex].text;
            if( text == 'Abertura' ){
                $('.Titulo').html('<h5 class="Titulo mt-3"> <i class="fa-solid fa-door-open"></i> <em> Abertura de Loja </em></h5>');
                $('.Abertura_Fechamento').show();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Fechamento' ){
                $('.Titulo').html('<h5 class="Titulo mt-3"> <i class="fa-solid fa-door-closed"></i> <em> Fechamento de Loja </em></h5>');
                $('.Abertura_Fechamento').show();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Balança' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').show();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Log MFE' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').show();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Limpeza Consultor' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').show();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Limpeza Balança Pdv' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').show();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Limpeza dos Hacks' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').show();
                $('.limpeza-desktop').hide();

            }else if( text == 'Limpeza Desktop' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').show();
            }
        });
    </script>
  @endsection
