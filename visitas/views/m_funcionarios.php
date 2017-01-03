
<div class="modal fade" id="modalFuncionarios" tabindex="-1" role="dialog" aria-labelledby="modalFuncionarios">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> AGREGAR FUNCIONARIO</h4>
            </div>
            <div class="modal-footer"></div>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/agregar_funcionarios.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId2" class="form-group">                                        
                            <label class="col-lg-2 control-label">NOMBRE:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_nomFuncionario" name="m_nomFuncionario" placeholder="NOMBRE DEL FUNCIONARIO" required="" >
                            </div>  
                            <label class="col-lg-2 control-label">APELLIDOS:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_apeFuncionario" name="m_apeFuncionario" placeholder="APELLIDOS DEL FUNCIONARIO" required="">
                            </div>  
                        </div>
                        <div id="divtxtId3" class="form-group">
                            <label class="col-lg-2 control-label">OFICINA: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_oficFuncionario" name="m_oficFuncionario"  placeholder="OFICINA DEL FUNCIONARIO" required="">
                            </div>
                            <label class="col-lg-2 control-label">CARGO:   </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="m_cargFuncionario" name="m_cargFuncionario" placeholder="CARGO DEL FUNCIONARIO" required="">
                            </div>                    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="mbtn_agregarFuncionario" class="btn btn-primary" >Agregar</button>
                        <button class="btn btn-default" id="mbtn_cancelarFuncionario" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>