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
                <option value="">Abertura de Loja</option>
                <option value="">Fechamento de Loja</option>
                <option value="">Status Quinzenal de Balanças</option>
                <option value="">Log MFE</option>
                <option value="">Limpeza Consultor</option>
                <option value="">Limpeza Balança Pdv</option>
                <option value="">Limpeza dos Racks</option>
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
        @include('checklist._partials.status_quinzenal_balanca')            
    </div>

    <div class="Log-mfe" style="display: none">
        @include('checklist._partials.log_mfe')        
    </div>

    <div class="limpeza-consultor" style="display: none">
        @include('checklist._partials.limpeza_consultor')       
    </div>       

    <div class="limpeza-balanca" style="display: none">
        @include('checklist._partials.limpeza_balanca_pdv')        
    </div>

    <div class="limpeza-hack" style="display: none">
        @include('checklist._partials.limpeza_rack')        
    </div>

    <div class="limpeza-desktop" style="display: none">
        @include('checklist._partials.limpeza_desktop')       
    </div>

    <hr>
    <div class="row float-right">
         <a href="{{route('check-list.index')}}" class="btn btn-outline-danger mr-3"><i class="fas fa-undo-alt"></i> Cancelar</a> 
        <button type="submit" class="btn btn-outline-success mr-3">{!!(isset($check_list)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> CRIAR CHECK-LIST'!!}</button>
    </div>
  </form>

  @section('scripts')
    <script>
        $('#checklist').change(function () {
            var select = document.getElementById('checklist');
            var text = select.options[select.selectedIndex].text;
            if( text == 'Abertura de Loja' ){
                $('.Titulo').html('<h5 class="Titulo mt-3"> <i class="fa-solid fa-door-open"></i> <em> Abertura de Loja </em></h5>');
                $('.Abertura_Fechamento').show();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Fechamento de Loja' ){
                $('.Titulo').html('<h5 class="Titulo mt-3"> <i class="fa-solid fa-door-closed"></i> <em> Fechamento de Loja </em></h5>');
                $('.Abertura_Fechamento').show();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();

            }else if( text == 'Status Quinzenal de Balanças' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').show();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();
                $('#balanca_floja').attr('required', 'true');
                $('#balanca_acougue').attr('required', 'true');
                $('#balanca_frios').attr('required', 'true');
                $('#balanca_peixaria').attr('required', 'true');
                $('#balanca_padaria').attr('required', 'true');
                $('#balanca_hortifrute').attr('required', 'true');
                $('#balanca_doca').attr('required', 'true');
                $('#balanca_pescoco').attr('required', 'true');
                $('#balanca_aerea').attr('required', 'true');

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
                $('#consultores').attr('required', 'true');

            }else if( text == 'Limpeza Balança Pdv' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').show();
                $('#balanca_pdv_floja').attr('required', 'true');
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').hide();
                $('#balanca_floja').attr('required', 'true');

            }else if( text == 'Limpeza dos Racks' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').show();
                $('.limpeza-desktop').hide();
                $('#rack').attr('required', 'true');

            }else if( text == 'Limpeza Desktop' ){
                $('.Abertura_Fechamento').hide();
                $('.check-out-balanca').hide();
                $('.Log-mfe').hide();
                $('.limpeza-consultor').hide();
                $('.limpeza-balanca').hide();
                $('.limpeza-hack').hide();
                $('.limpeza-desktop').show();
                $('#desktop').attr('required', 'true');
            }
        });
    </script>
  @endsection
