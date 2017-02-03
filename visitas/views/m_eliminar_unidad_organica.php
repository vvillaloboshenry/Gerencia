<div class="modal fade" id="modalEliminarUnidadOrganica" tabindex="-1" role="dialog" aria-labelledby="modalEliminarUnidadOrganica">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEliminarLabel">Eliminar Unidad Organica</h4>
            </div>
            <form class="form-horizontal" id="form_eliminar_unidad_organica" action='./controller/eliminar_unidad_organica.php' method='POST'>
                <div class="modal-body">							
                    ¿Está seguro de eliminar esta Unidad Organica?, recuerda que el cambio es irreversible
                    <input type="hidden" id="m_eliminar_unidad_organica_idUnidad" name="m_eliminar_unidad_organica_idUnidad" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary" >Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
