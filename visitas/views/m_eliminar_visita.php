<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEliminarLabel">Eliminar Visita</h4>
            </div>
            <form class="form-horizontal" action='./controller/eliminar_visita.php' method='POST' >
                <div class="modal-body">							
                    ¿Está seguro de eliminar esta Visita?<strong data-name=""></strong>
                    <input type="hidden" id="m_eliminar_visita_idVisita" name="m_eliminar_visita_idVisita" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit" id="eliminar-usuario" class="btn btn-primary" >Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
