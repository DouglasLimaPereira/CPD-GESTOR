<div class="modal fade edita-indice" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Editar índice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('erro-sitef.index', [$company->id, $canteiro->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row border-bottom mb-3">
                        <div class="col-md-12">
                            <p class="text-danger text-right">(*) Preenchimento obrigatório.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-gruop">
                                <label for="">Segunda a sexta-feira <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_produtivo" class="form-control" class="m-indice-produtivo" id="m-indice-produtivo" required>
                            </div>
                        </div>
            
                        <div class="col">
                            <div class="form-gruop">
                                <label for="">Sábados e domingos <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_improdutivo" class="form-control" class="m-indice-improdutivo" id="m-indice-improdutivo" required>
                            </div>
                        </div>
            
                        <div class="col">
                            <div class="form-gruop">
                                <label for="">Feriados <span class="text-danger">*</span></label>
                                <input type="number" min="1" max="5" step="0.01" name="indice_feriado" class="form-control" class="m-indice-feriado" id="m-indice-feriado" required>
                            </div>
                        </div>

                        <div class="col col-data-vigencia">
                            <div class="form-gruop">
                                <label for="">Vigência <span class="text-danger">*</span></label>
                                <input type="date" name="data_vigencia" class="form-control" class="m-data-vigencia" id="m-data-vigencia" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <input type="hidden" name="canteiro_id" value="{{$canteiro->id}}">
                    <input type="hidden" name="indice_id" id="m-indice-id">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
            </form>
        </div>
    </div>
</div> 