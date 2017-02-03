<?php
include "../controller/mostrar_roles.php";
?>
<!-- ************** Tabla Roll con Permisos ************* -->
<div class="box" id="box-one" style="display: block;">
    <?php if ($query_rol->num_rows > 0): ?>
        <!-- Users table -->
        <div class="table-responsive">
            <table class="table table-condensed" style="border-collapse:collapse;">  
                <tbody>
                    <?php
                    $id = 1;
                    ?>
                    <?php while ($r = $query_rol->fetch_array()): ?>
                        <tr style="height: 35px;" class="active">
                            <td class="accordion-toggle area" data-toggle="collapse" data-target="<?php echo '#' . $id; ?>" style="width: 145px;" ><a href=""><?php echo $r["rol"]; ?></a></td>
                            <td style="color:#337ab7;" data-toggle="collapse" data-target="<?php echo '#' . $id; ?>">
                                <?php
                                $sqlPermisos = "SELECT *FROM dt_permiso_rol dpp inner join permisos p ON dpp.idPermiso=p.idPermiso where dpp.idRol='" . $r["idRol"] . "'";
                                $query_permisos = $con->query($sqlPermisos);
                                if ($query_permisos->num_rows > 0):
                                    while ($columnaRol = $query_permisos->fetch_array()):
                                        $permisos[] = $columnaRol["idPermiso"];
                                        ?>
                                        <span class="<?php echo $columnaRol["icon"] ?>" title="<?php echo $columnaRol["permiso"] ?>" style="padding-right: 45px"></span>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </td>
                            <td style="border-right:0.5px solid rgba(68, 68, 68, 0.22)">
                                <span class="pull-right">
                                    <a class="btn btn-primary btn-xs" title="Editar" id="editarRol" name="editarRol" data-toggle="modal" data-target="#modalEditarRol" data-original-title="Edit"><i class="fa fa-pencil-square-o"  style="color:white;"></i></a>
                                    <a class="accordion-toggle" data-toggle="collapse" data-target="<?php echo '#' . $id; ?>" href="" aria-expanded="false">
                                        <i style="margin-top: 4px;padding-left: 8px" class="fa fa-chevron-down"></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                        <tr style="border-left: 0.5px solid rgba(68, 68, 68, 0.22);border-right: 0.5px solid rgba(68, 68, 68, 0.22);">
                            <td colspan="7" class="hiddenRow">
                                <div id="<?php echo $id; ?>" class="accordian-body collapse">
                                    <div  class="accordion-inner">
                                        <!-- INICIANDO DATATABLE -->
                                        <?php
                                        $sqlFuncionariosRol = "SELECT f.idFuncionario, f.nombre, f.apellidoPaterno, f.apellidoMaterno, f.usuario,f.clave,f.email, f.idUnidadOrganica,uo.nombre as unidadOrganica FROM Funcionario f LEFT join Rol r ON f.idRol=r.idRol LEFT JOIN unidad_organica uo on f.idUnidadOrganica=uo.idUnidad where r.idRol='" . $r["idRol"] . "'  order by f.idFuncionario asc;";
                                        $query_funcionarios_rol = $con->query($sqlFuncionariosRol);
                                        ?>
                                        <?php if ($query_funcionarios_rol->num_rows > 0) { ?>
                                            <div class="table-responsive">
                                                <table class="display table-bordered dataTable no-footer" id="tablaUsers" role="grid">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>Usuario</th>
                                                            <th>Email</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php $serie = 1 ?>
                                                        <?php while ($columnaFuncionarios = $query_funcionarios_rol->fetch_array()): ?>
                                                            <tr style="background: white;">
                                                                <td style="background: white;"><?php echo $serie; ?></td>
                                                                <td style="background: white;"><?php echo $columnaFuncionarios["nombre"] . ' ' . $columnaFuncionarios["apellidoPaterno"] . ' ' . $columnaFuncionarios["apellidoMaterno"]; ?></td>
                                                                <td style="background: white;"><?php echo $columnaFuncionarios["usuario"]; ?></td>
                                                                <td style="background: white;"><?php echo $columnaFuncionarios["email"]; ?></td> 
                                                                <td><a class="btn btn-danger" title="Reestablecer Clave" id="reestablecerClave" name="reestablecerClave" data-toggle="modal" data-target="#modalRestablecerClave" data-original-title="ReestablecerClave" onclick="<?php echo "reestablecerClave('" . $columnaFuncionarios["idFuncionario"] . "','" . $columnaFuncionarios["usuario"] . "');"; ?>"><i class="fa fa-unlock" style="color:white;"></i></a></td>

                                                            </tr>
                                                            <?php $serie+=1 ?>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table> <br/>
                                            </div>
                                            <?php
                                        }else {
                                            echo '<br/>';
                                            echo 'No hay Usuarios disponibles para mostrar en este Rol.';
                                            echo '<br/><br/> ';
                                        }
                                        ?>
                                        <!-- FIN DATATABLE -->
                                    </div> 
                                </div>
                            </td>
                        </tr>  
                        <?php $id+=1 ?>
                    <?php endwhile; ?>
                    <!------------------ -->
                    <tr style="height: 35px;" class="active">
                        <td class="accordion-toggle area" data-disabled="" data-toggle="collapse" data-target="#sinRol" style="width:145px;"><a style="color:rgba(68, 68, 68, 0.55);font-weight: 700;" href="">SIN ASIGNAR ROL</a></td>
                        <td data-toggle="collapse" data-target="#sinRol" style="color:rgba(68, 68, 68, 0.55);">
                            <span class="fa fa-users disabled" title="Nuevo Funcionario" style="padding-right: 45px"></span>
                            <span class="fa fa-user-secret" title="Permisos &amp; Roles" style="padding-right: 45px"></span>
                            <span class="fa fa-files-o" title="Copiar Datos" style="padding-right: 45px"></span>
                            <span class="fa fa-file-text-o" title="Reporte Pdf" style="padding-right: 45px"></span>
                            <span class="fa fa-file-excel-o" title="Reporte Excel" style="padding-right: 45px"></span>
                            <span class="fa fa-print" title="Imprimir Reporte" style="padding-right: 45px"></span>
                            <span class="fa fa-plus" title="Nueva Visita" style="padding-right: 45px"></span>
                            <span class="fa fa-eye" title="Ver Visita" style="padding-right: 45px"></span>
                            <span class="fa fa-pencil-square-o" title="Editar Visita" style="padding-right: 45px"></span>
                            <span class="fa fa-trash-o" title="Eliminar Visita" style="padding-right: 45px"></span>
                        </td>
                        <td style="border-right:0.5px solid rgba(68, 68, 68, 0.22)">
                            <span class="pull-right">
                                <a class="accordion-toggle" data-toggle="collapse" data-target="#sinRol" href="" aria-expanded="false">
                                    <i style="margin-top: 4px;padding-left: 8px" class="fa fa-chevron-down"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    <tr style="border-left: 0.5px solid rgba(68, 68, 68, 0.22);border-right: 0.5px solid rgba(68, 68, 68, 0.22);">
                        <td colspan="7" class="hiddenRow">
                            <div id="sinRol" class="accordian-body collapse">
                                <div  class="accordion-inner">
                                    <!-- INICIANDO DATATABLE -->
                                    <?php
                                    $sqlSinAsignarRol = "SELECT *FROM Funcionario where idRol='' AND dropState=1;";
                                    $query_sin_signar_rol = $con->query($sqlSinAsignarRol);
                                    ?>
                                    <?php if ($query_sin_signar_rol->num_rows > 0) { ?>
                                        <div class="table-responsive">
                                            <table class="display table-bordered" id="tablaUsers">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
                                                        <th>Usuario</th>
                                                        <th>Email</th>
                                                        <th>Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php $codd = 1 ?>
                                                    <?php while ($columnaSinRol = $query_sin_signar_rol->fetch_array()): ?>
                                                        <tr style="background: white;">
                                                            <td style="background: white;"><?php echo $codd; ?></td>
                                                            <td style="background: white;"><?php echo $columnaSinRol["nombre"] . ' ' . $columnaSinRol["apellidoPaterno"] . ' ' . $columnaSinRol["apellidoMaterno"]; ?></td>
                                                            <td style="background: white;"><?php echo $columnaSinRol["usuario"]; ?></td>
                                                            <td style="background: white;"><?php echo $columnaSinRol["email"]; ?></td> 
                                                            <td><a class="btn btn-danger" title="Reestablecer Clave" id="reestablecerClave" name="reestablecerClave" data-toggle="modal" data-target="#modalRestablecerClave" data-original-title="ReestablecerClave" onclick="<?php echo "reestablecerClave('" . $columnaSinRol["idFuncionario"] . "','" . $columnaSinRol["usuario"] . "');"; ?>" ><i class="fa fa-unlock" style="color:white;"></i></a></td>
                                                        </tr>
                                                        <?php $codd+=1 ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table> <br/>
                                        </div>
                                        <?php
                                    }else {
                                        echo '<br/>';
                                        echo 'No hay Usuarios disponibles para mostrar en este Rol';
                                        echo '<br/><br/> ';
                                    }
                                    ?>
                                    <!-- FIN DATATABLE -->
                                </div> 
                            </div>
                        </td>
                    </tr>  
                    <!------------>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<!-- ************** Fin Tabla Roll con Permisos ************* -->

