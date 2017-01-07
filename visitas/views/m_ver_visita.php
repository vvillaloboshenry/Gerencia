<div class="modal fade" id="modalVerEditar" tabindex="-1" role="dialog" aria-labelledby="modalVerEditar">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA DETALLE DE VISITAS</h4>
            </div>
            <div class="modal-footer"></div>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/editar_visita.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_idVisita" name="m_idVisita" readonly="">
                            </div>   
                            <label class="col-lg-2 control-label">ESTADO VISITA:   </label>
                            <div class="col-lg-4">
                                <select id="m_estadoVisita" class="col-lg-2 form-control" title="Seleccione Estado" disabled="">
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Pendiente">Pendiente</option>
                                </select>
                            </div> 
                        </div>    
                        <div id="divtxtId1" class="form-group">                                        
                            <label class="col-lg-2 control-label">VISITANTE:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_nombreVisitante" name="m_nombreVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                            </div>                    
                            <label class="col-lg-2 control-label">DNI VISITANTE:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_dniVisitante" name="m_dniVisitante" placeholder="DNI VISITANTE" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">FUNCIONARIO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_nombreFuncionario" name="m_nombreFuncionario" placeholder="NOMBRE DEL FUNCIONARIO" disabled="">
                            </div>                    
                            <label class="col-lg-2 control-label">OFICINA FUNC:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_oficinaFuncionario" name="m_oficinaFuncionario"  placeholder="OFICINA DEL FUNCIONARIO" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId3" class="form-group">                                        
                            <label class="col-lg-2 control-label">CARGO FUNC:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_cargoFuncionario" name="m_cargoFuncionario" placeholder="CARGO DEL FUNCIONARIO" disabled="">
                            </div>                    
                        </div>
                        <div id="divtxtId4" class="form-group">                                        
                            <label class="col-lg-2 control-label">F. ENTRADA:   </label>
                            <div class="col-lg-4">
                                <input type="date" class="form-control" id="m_fecha" name="m_fecha" disabled="">
                            </div>                  
                            <label class="col-lg-2 control-label">FECHA SALIDA:</label>
                            <div class="col-lg-4">
                                <input type="date" class="form-control" id="m_fechaTermino" name="m_fechaTermino" disabled="">
                            </div>
                        </div>
                        <div id="divtxtId5" class="form-group">                                        
                            <label class="col-lg-2 control-label">H. ENTRADA:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_horaEntrada" name="m_horaEntrada" placeholder="HORA DE ENTRADA" disabled="">
                            </div>
                            <label class="col-lg-2 control-label">HORA SALIDA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_horaTermino" name="m_horaTermino" placeholder="HORA DE SALIDA" disabled="">
                            </div>
                        </div> <div id="divtxtId6" class="form-group">                                        
                            <label class="col-lg-2 control-label">MOTIVO VISITA:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_motivo" name="m_motivo" placeholder="MOTIVO DE LA VISITA" disabled="">
                            </div>                    
                            <label class="col-lg-2 control-label">LUGAR VISITA:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_lugar" name="m_lugar" placeholder="LUGAR DE LA VISITA" disabled="">
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