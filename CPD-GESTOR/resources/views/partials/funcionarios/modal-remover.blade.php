<!-- Modal -->
<div class="modal fade modal-remover" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="staticBackdropLabel">Remover Funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light" role="alert">
                    Esta ação irá remover todos os registros vinculados a este funcionário.
                </div>
                <hr>
                <b>Nome do funcionário: </b> <span id="funcionario-nome"></span>
                <hr>
                @if(request()->is('clientes/*'))
                    <form action="{{route('clientes.funcionarios.destroy')}}" method="POST">    
                @elseif(request()->is('spa/*'))
                    <form action="{{route('spa.funcionarios.destroy')}}" method="POST">
                @endif
                
                    @method('Delete')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="remover" name="remover" required>
                                <label for="remover" class="text-danger">Confirma a exclusão deste registro?</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="funcionario-id" name="funcionario_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-default btn-remover">Remover</button>
            </form>
            </div>
        </div>
    </div>
</div>