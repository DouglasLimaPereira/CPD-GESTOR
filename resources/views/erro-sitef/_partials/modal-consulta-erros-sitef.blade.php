<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="GET">
                    @csrf
                    <div class="row border-bottom mb-3">
                        <div class="col-md-12">
                            <p class=""> Erros Sitef </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-gruop">
                                <label for="">Código <span class="text-danger">*</span></label>
                                <input type="text" max="3" name="codigo" class="form-control" class="codigo" id="codigo" value="{{old('codigo')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" onclick="consultarerro()">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>