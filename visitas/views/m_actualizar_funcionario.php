<div class="modal fade" id="modalEditarFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalEditarFuncionario">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA ASIGNACION DE OFICINA Y MODIFICACION DE FUNCIONARIO</h4>
            </div>
            <div class="modal-footer"></div>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/actualizar_funcionario.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <label class="col-lg-2 control-label">CODIGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_idFuncionario" name="m_idFuncionario" placeholder="CODIGO DE FUNCIONARIO" readonly="">
                            </div>  
                            <label class="col-lg-2 control-label">DNI:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_dniFuncionario" name="m_dniFuncionario" placeholder="DNI DEL FUNCIONARIO" >
                            </div>     
                        </div>    
                        <div id="divtxtId1" class="form-group">   
                            <label class="col-lg-2 control-label">NOMBRE:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_nombreFuncionario" name="m_nombreFuncionario" placeholder="NOMBRE COMPLETO">
                            </div>                                    
                            <label class="col-lg-2 control-label">APELLIDO PAT:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_apellidoPaternoFuncionario" name="m_apellidoPaternoFuncionario" placeholder="APELLIDO PATERNO" onkeypress="return soloLetras(event)">
                            </div>                   
                        </div>
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">APELLIDO MAT:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_apellidoMaternoFuncionario" name="m_apellidoMaternoFuncionario" placeholder="APELLIDO MATERNO">
                            </div>
                            <label class="col-lg-2 control-label">EMAIL:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_emailFuncionario" name="m_emailFuncionario"  placeholder="EMAIL CORPORATIVO" >
                            </div>
                        </div>
                        <div id="divtxtId3" class="form-group">                                        
                            <label class="col-lg-2 control-label">CARGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_cargoFuncionario" name="m_cargoFuncionario" placeholder="CARGO DEL FUNCIONARIO" >
                            </div>  
                            <label class="col-lg-2 control-label">UNIDAD ORIGEN:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_idUnidadOrganica" name="m_idUnidadOrganica">
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