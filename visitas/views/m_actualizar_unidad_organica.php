<div class="modal fade" id="modalEditarUnidadOrganica" tabindex="-1" role="dialog" aria-labelledby="modalEditarUnidadOrganica">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA ASIGNACION DE JEFE ENCARGADO Y MODIFICACION DE UNIDAD ORGANICA</h4>
            </div>
            <div class="modal-footer"></div>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/actualizar_unidad_organica.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_id" name="m_actualizar_unidad_organica_id" placeholder="CODIGO" readonly="">
                            </div>  
                            <label class="col-lg-2 control-label">CODIGO DE UNIDAD(*):   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_codigoUnidad" name="m_codigoUnidad" placeholder="CODIGO DE UNIDAD" >
                            </div>     
                        </div>    
                        <div id="divtxtId1" class="form-group">   
                            <label class="col-lg-2 control-label">UNIDAD ORGANICA:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_unidadOrganica" name="m_unidadOrganica" placeholder="NOMBRE DE LA UNIDAD ORGANICA">
                            </div>                                    
                            <label class="col-lg-2 control-label">NOMBRE CORTO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_aliasUnidad" name="m_aliasUnidad" placeholder="REFERENCIA DE UNIDAD" onkeypress="return soloLetras(event)">
                            </div>                   
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">JERARQUIA ORGANICA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_jerarquiaOrganica" name="m_jerarquiaOrganica" placeholder="JERARQUIA ORGANICA DE U.O">
                            </div>
                            <label class="col-lg-2 control-label">JEFE/ENCARGADO:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_idUsers" name="m_idUsers"  placeholder="" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Guardar</button>
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 