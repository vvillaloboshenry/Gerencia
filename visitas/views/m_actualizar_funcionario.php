<?php
include "../controller/mostrar_unidad_organica.php";
?>
<div class="modal fade" id="modalEditarFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalEditarFuncionario">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA ASIGNACION DE OFICINA Y MODIFICACION DE FUNCIONARIO</h4>
            </div>
            <div style="border-top: 1px solid #e5e5e5;"></div><br/>
            <div class="modal-body">
                <form class="form-horizontal" id="form_actualizar_funcionario" action='./controller/actualizar_funcionario.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_idFuncionario" name="m_actualizar_funcionario_idFuncionario" placeholder="CODIGO DE FUNCIONARIO" readonly="">
                            </div>  
                            <label class="col-lg-2 control-label">DNI:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_dniFuncionario" name="m_actualizar_funcionario_dniFuncionario" placeholder="DNI DEL FUNCIONARIO" >
                            </div>     
                        </div>    
                        <div id="divtxtId1" class="form-group">   
                            <label class="col-lg-2 control-label">NOMBRE:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_nombreFuncionario" name="m_actualizar_funcionario_nombreFuncionario" placeholder="NOMBRE COMPLETO">
                            </div>                                    
                            <label class="col-lg-2 control-label">APELLIDO PAT:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_apellidoPFuncionario" name="m_actualizar_funcionario_apellidoPFuncionario" placeholder="APELLIDO PATERNO" onkeypress="return soloLetras(event)">
                            </div>                   
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">APELLIDO MAT:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_apellidoMFuncionario" name="m_actualizar_funcionario_apellidoMFuncionario" placeholder="APELLIDO MATERNO">
                            </div>
                            <label class="col-lg-2 control-label">EMAIL:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_emailFuncionario" name="m_actualizar_funcionario_emailFuncionario"  placeholder="EMAIL CORPORATIVO" >
                            </div>
                        </div>
                        <div id="divtxtId3" class="form-group">                                        
                            <label class="col-lg-2 control-label">CARGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_actualizar_funcionario_cargoFuncionario" name="m_actualizar_funcionario_cargoFuncionario" placeholder="CARGO DEL FUNCIONARIO" >
                            </div>  
                            <label class="col-lg-2 control-label">UNIDAD ORIGEN:   </label>
                            <div class="col-lg-4">
                                <select class="selectpicker form-control" name='m_actualizar_funcionario_idUnidadOrganica' id="m_actualizar_funcionario_idUnidadOrganica" data-live-search="true" title="Seleccione Unidad perteneciente del Usuario">
                                    <option value="0">No se encuentra disponible aun</option>
                                    <?php if ($query_unidad_organica->num_rows > 0): ?>
                                        <?php while ($unidad = $query_unidad_organica->fetch_array()): ?>
                                            <?php $m_funcionario = $unidad["nombreFuncionario"] . ' ' . $unidad["apellidoPaterno"] . ' ' . $unidad["apellidoMaterno"]; ?>
                                            <option value="<?php echo $unidad["idUnidad"]; ?>" data-subtext="<?php echo $m_funcionario; ?>"><?php echo $unidad["nombreUnidadOrganica"]; ?></option>
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