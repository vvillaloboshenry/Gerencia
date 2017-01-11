<div class="modal fade" id="modalRestablecerClave" tabindex="-1" role="dialog" aria-labelledby="modalRestablecerClave">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reestableciendo Clave de Usuario</h4>
            </div>
            <form class="form-horizontal" action='./controller/reestablecer_clave.php' method='POST' >
                <div class="modal-body">							
                    <p>Esta accion cambiara la clave del usuario a la por defecto en el Sistema.  </p>
                    <p>¿Está seguro que desea reestablecer la Clave?</p>
                    <input type="hidden" id="m_reestablecer_clave_idUsers" name="m_reestablecer_clave_idUsers" value="">
                    <input type="hidden" id="m_reestablecer_clave_loginUsers" name="m_reestablecer_clave_loginUsers" value="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
