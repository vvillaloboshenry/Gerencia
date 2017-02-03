<?php
include "../controller/mostrar_funcionarios.php";
?>
<div class="modal fade" id="modalEditarUnidadOrganica" tabindex="-1" role="dialog" aria-labelledby="modalEditarUnidadOrganica">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA ASIGNACION DE JEFE ENCARGADO Y MODIFICACION DE UNIDAD ORGANICA</h4>
            </div>
            <div style="border-top: 1px solid #e5e5e5;"></div><br/>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/actualizar_unidad_organica.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_idUnidad" name="m_actualizar_unidad_organica_idUnidad" placeholder="CODIGO" readonly="">
                            </div>  
                            <label class="col-lg-2 control-label">CODIGO DE UNIDAD(*):   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_codigoUnidad" name="m_actualizar_unidad_organica_codigoUnidad" placeholder="CODIGO DE UNIDAD" >
                            </div>     
                        </div>    
                        <div id="divtxtId1" class="form-group">   
                            <label class="col-lg-2 control-label">UNIDAD ORGANICA:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_unidadOrganica" name="m_actualizar_unidad_organica_unidadOrganica" placeholder="NOMBRE DE UNIDAD ORGANICA">
                            </div>                                    
                            <label class="col-lg-2 control-label">NOMBRE CORTO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_aliasUnidad" name="m_actualizar_unidad_organica_aliasUnidad" placeholder="REFERENCIA DE UNIDAD" onkeypress="return soloLetras(event)">
                            </div>                   
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">JERARQUIA ORGANICA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_unidad_organica_jerarquiaOrganica" name="m_actualizar_unidad_organica_jerarquiaOrganica" placeholder="JERARQUIA ORGANICA DE U.O">
                            </div>
                            <label class="col-lg-2 control-label">JEFE/ENCARGADO:</label>
                            <div class="col-lg-4">
                                <select class="selectpicker form-control" name='m_actualizar_unidad_organica_idFuncionario' id="m_actualizar_unidad_organica_idFuncionario" data-live-search="true" title="Seleccion al encargado de esta Unidad">
                                    <option value="0">No se encuentra disponible aun</option>
                                    <?php if ($query_funcionarios->num_rows > 0): ?>
                                        <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                            <?php $m_cargo = $rr["cargo"]; ?>
                                            <option value="<?php echo $rr["idFuncionario"]; ?>" data-subtext="<?php echo $m_cargo; ?>"><?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"]; ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
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