<div class="modal fade" id="modalEditarRol" tabindex="-1" role="dialog" aria-labelledby="modalEditarRol">
    <div class="modal-dialog modal-lg" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA DE ACTUALIZACION DE ROL CON PERMISOS </h4>
            </div>
            <div style="border-top: 1px solid #e5e5e5;"></div><br>
            <div class="modal-body">
                <form class="form-horizontal" action='./controller/actualizar_rol.php' method='POST' >
                    <div class="panel-body">
                        <div id="divtxtId" class="form-group">
                            <div class="form-group">
                                <label for="role" class=" col-lg-3 control-label">Rol </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="inputNameProfi"  name="inputNameProfi"  maxlength="50" placeholder="Rol" required="true" >
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class=" col-lg-3 control-label">Descripcion </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="inputDescripcion"   name="inputDescripcion" maxlength="50" placeholder="Breve Descripcion de su funcion " required="true">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="permission" class="col-lg-3 control-label company-label">Permisos</label>
                                <div class="col-sm-9 col-md-offset-2" style="height: 310px; overflow-y: auto;">
                                    <h4>Seleccionar Permisos</h4>
                                    <ul class="k-group k-treeview-lines" role="tree">
                                        <div>
                                            <input id="chk_listado" type="checkbox" name="all" >
                                            <span style="padding-left: 40px;">Todos los Permisos</span>
                                        </div>
                                        <ul class="k-group" style="display: block;">
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox" id="1" name="permisos[]" value="1">
                                                <span class="k-in"><span class="fa fa-users"></span>Nuevo Funcionario (*)</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox" id="2" name="permisos[]" value="2">
                                                <span class="k-in"><span class="fa fa-user-secret"></span>Roles & Permissions (*)</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox" id="3" name="permisos[]" value="3">
                                                <span class="k-in"><span class="fa fa-files-o"></span>Copiar Tabla</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox" id="4" name="permisos[]" value="4">
                                                <span class="k-in"><span class="fa fa-file-text-o"></span>Reporte Pdf</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="5" name="permisos[]" value="5">
                                                <span class="k-in"><span class="fa fa-file-excel-o"></span>Reporte Excel</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="6" name="permisos[]" value="6">
                                                <span class="k-in"><span class="fa fa-print"></span>Imprimir Reporte</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="7" name="permisos[]" value="7">
                                                <span class="k-in"><span class="fa fa-plus"></span>Nueva Visita (*)</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="8" name="permisos[]" value="8">
                                                <span class="k-in"><span class="fa fa-eye"></span>Ver Visita</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="9" name="permisos[]" value="9">
                                                <span class="k-in"><span class="fa fa-pencil-square-o"></span>Editar Visita (*)</span>
                                            </li>
                                            <li style="padding-bottom: 3px;">
                                                <input class="chk_listado" type="checkbox"  id="10" name="permisos[]" value="10"> 
                                                <span class="k-in"><span class="fa fa-trash-o"></span>Eliminar Visita (*)</span>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
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