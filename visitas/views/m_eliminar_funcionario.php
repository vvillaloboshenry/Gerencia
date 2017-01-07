<div class="modal fade" id="modalEliminarFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalEliminarFuncionario">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEliminarLabel">Eliminar Funcionario</h4>
            </div>
            <form class="form-horizontal" action='./controller/eliminar_funcionario.php' method='POST' >
                <div class="modal-body">							
                    ¿Está seguro de eliminar a este funcionario?, recuerda que el cambio es irreversible<strong data-name=""></strong>
                    <input type="hidden" id="m_eliminar_funcionario_idFuncionario" name="m_eliminar_funcionario_idFuncionario" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary" >Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
