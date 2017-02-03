<?php
include "../controller/mostrar_funcionarios.php";
?>
<div class="modal fade" id="modalVerEditar" tabindex="-1" role="dialog" aria-labelledby="modalVerEditar">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA DETALLE DE VISITAS</h4>
            </div>
            <div style="border-top: 1px solid #e5e5e5;"></div>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/actualizar_visita.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_idVisita" name="m_ver_visita_idVisita" readonly="">
                                <input type="text" hidden="" class="form-control" id="m_ver_visita_idVisitaVisitanteFuncionario" name="m_ver_visita_idVisitaVisitanteFuncionario">
                            </div>
                            <label class="col-lg-2 control-label" id="hola">ESTADO VISITA</label>
                            <div class="col-lg-4">
                                 <a  title="Finalizar Visita Efectiva" data-dismiss="modal" aria-hidden="true"><input id="m_ver_visita_finalizarVisita" class="btn btn-info form-control" value="Finalizar Visita"></a>
                               <input type="text" class="form-control" id="m_ver_visita_estadoVisita" name="m_ver_visita_estadoVisita" readonly="">
                            </div>
                        </div>    
                        <div id="divtxtId1" class="form-group">                                        
                            <label class="col-lg-2 control-label">VISITANTE:</label>
                            <div class="col-lg-4">
                                <input type="text" hidden="" id="m_ver_visita_idVisitante" name="m_ver_visita_idVisitante">
                                <input type="text" class="form-control" id="m_ver_visita_nombreVisitante" name="m_ver_visita_nombreVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                            </div>                    
                            <label class="col-lg-2 control-label">AP. PATERNO:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_apellidoPVisitante" name="m_ver_visita_apellidoPVisitante" placeholder="DNI VISITANTE" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">AP. MATERNO:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_apellidoMVisitante" name="m_ver_visita_apellidoMVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                            </div>                    
                            <label class="col-lg-2 control-label">DNI VISITANTE:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_dniVisitante" name="m_ver_visita_dniVisitante" placeholder="DNI VISITANTE" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId3" class="form-group">                                        
                            <label class="col-lg-2 control-label">FUNCIONARIO:</label><a class="btn btn-default" style="left: 157px;position: fixed;background: white;border-color: rgba(255, 255, 255, 0);padding-left: 4px;" data-trigger="hover" data-popup="popover" data-toggle="popover"  data-placement="top" title="" data-content="El cambio o modificacion del Funcionario ocasionara que se derive esta visita hacia otra Unidad Organica perteneciente al nuevo Funcionario elegido" data-original-title="DERIVAR VISITA" aria-describedby="popover132247" ><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                            <div class="col-lg-4">
                                <?php if ($query_funcionarios->num_rows > 0): ?>
                                    <select class="selectpicker form-control" name="m_ver_visita_idFuncionario" id="m_ver_visita_idFuncionario" data-live-search="true" title="NOMBRE DEL FUNCIONARIO" required autofocus disabled>
                                        <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                            <option value="<?php echo $rr["idFuncionario"]; ?>"  data-subtext="<?php echo $rr["dniFuncionario"] . ' - ' . $rr["cargo"] . ' - ' . $rr["unidadOrganica"] . ' - ' . $rr["alias"]; ?>" > <?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"]; ?> </option>
                                        <?php endwhile; ?>
                                    </select> 
                                <?php endif; ?>
                            </div> 
                            <label class="col-lg-2 control-label">U. ORGANICA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_unidadOrganica" name="m_ver_visita_unidadOrganica"  placeholder="OFICINA DEL FUNCIONARIO" readonly="">
                            </div>
                        </div>
                        <div id="divtxtId6" class="form-group">                                        
                            <label class="col-lg-2 control-label">FECHA INICIO:</label>
                            <div class="col-lg-4">
                                <input type="date" class="form-control" id="m_ver_visita_fecha" name="m_ver_visita_fecha" disabled="">
                            </div>                  
                            <label class="col-lg-2 control-label">FECHA FIN:</label>
                            <div class="col-lg-4">
                                <input type="date" class="form-control" id="m_ver_visita_fechaTermino" name="m_ver_visita_fechaTermino" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId7" class="form-group">           
                            <label class="col-lg-2 control-label">H. ENTRADA:</label>
                            <div class="col-lg-4">
                                <input type="time" step="1" class="form-control" id="m_ver_visita_horaEntrada" name="m_ver_visita_horaEntrada" placeholder="HORA DE ENTRADA" disabled="">
                            </div>
                            <label class="col-lg-2 control-label">H. SALIDA:</label>
                            <div class="col-lg-4">
                                <input type="time" step="1" class="form-control" id="m_ver_visita_horaTermino" name="m_ver_visita_horaTermino" placeholder="HORA DE SALIDA" disabled="">
                            </div>
                        </div> 
                        <div id="divtxtId8" class="form-group">                                                          
                            <label class="col-lg-2 control-label">LUGAR VISITA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_ver_visita_lugar" name="m_ver_visita_lugar" placeholder="LUGAR DE LA VISITA" disabled="">
                            </div>
                            <label class="col-lg-2 control-label">MOTIVO VISITA:</label>
                            <div class="col-lg-4">
                                <textarea class="form-control" id="m_ver_visita_motivo" name="m_ver_visita_motivo" style="height:33px ;max-height: 85px;" placeholder="DESCRIBA DE MANERA BREVE EL MOTIVO DE LA VISITA" required autofocus disabled=""></textarea>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="mbtn_actualizarVisita" class="btn btn-primary" >Guardar</button>
                        <button class="btn btn-default" id="mbtn_cancelarVisita" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 