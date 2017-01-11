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
                    $cod = 1;
                    ?>
                    <?php while ($r = $query_rol->fetch_array()): ?>
                        <tr style="height: 35px;" class="active">
                            <td class="accordion-toggle area" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>" style="width: 145px;" ><a href=""><?php echo $r["nameProfi"]; ?></a></td>
                            <td style="color:#337ab7;" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>">
                                <?php
                                $sqlPermisos = "SELECT *FROM dt_permiso_perfil dpp inner join permisos p ON dpp.id_permiso=p.id where dpp.id_perfil='" . $r["idProfile"] . "'";
                                $query_permisos = $con->query($sqlPermisos);
                                if ($query_permisos->num_rows > 0):
                                    while ($columnaRol = $query_permisos->fetch_array()):
                                        $permisos[] = $columnaRol["id_permiso"];
                                        ?>
                                        <span class="<?php echo $columnaRol["icon"] ?>" title="<?php echo $columnaRol["nombre"] ?>" style="padding-right: 45px"></span>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </td>
                            <td style="border-right:0.5px solid rgba(68, 68, 68, 0.22)">
                                <span class="pull-right">
                                    <a class="btn btn-primary btn-xs" title="Editar" id="editarRol" name="editarRol" data-toggle="modal" data-target="#modalEditarRol" data-original-title="Edit"><i class="fa fa-pencil-square-o"  style="color:white;"></i></a>
                                    <a class="accordion-toggle" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>" href="" aria-expanded="false">
                                        <i style="margin-top: 4px;padding-left: 8px" class="fa fa-chevron-down"></i>
                                    </a>
                                </span>
                            </td>

                        </tr>

                        <tr style="border-left: 0.5px solid rgba(68, 68, 68, 0.22);border-right: 0.5px solid rgba(68, 68, 68, 0.22);">
                            <td colspan="7" class="hiddenRow">
                                <div id="<?php echo $cod; ?>" class="accordian-body collapse">
                                    <div  class="accordion-inner">
                                        <!-- INICIANDO DATATABLE -->
                                        <?php
                                        $sqlFuncionariosRol = "SELECT u.idUsers, u.nombre, u.apellidoPaterno, u.apellidoMaterno, u.loginUsers,u.passUsers, u.emailUser, u.idUnidadOrganica,uo.nombre as unidadOrganica FROM users u LEFT join profiles p ON u.idprofile=p.idProfile LEFT JOIN unidad_organica uo on u.idUnidadOrganica=uo.idUnidad where p.idProfile='" . $r["idProfile"] . "'  order by u.idUsers asc";
                                        $query_funcionarios_permisos = $con->query($sqlFuncionariosRol);
                                        ?>
                                        <?php if ($query_funcionarios_permisos->num_rows > 0) { ?>
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
                                                        <?php while ($columnaUsers = $query_funcionarios_permisos->fetch_array()): ?>
                                                            <tr style="background: white;">
                                                                <td style="background: white;"><?php echo $codd; ?></td>
                                                                <td style="background: white;"><?php echo $columnaUsers["nombre"] . ' ' . $columnaUsers["apellidoPaterno"] . ' ' . $columnaUsers["apellidoMaterno"]; ?></td>
                                                                <td style="background: white;"><?php echo $columnaUsers["loginUsers"]; ?></td>
                                                                <td style="background: white;"><?php echo $columnaUsers["emailUser"]; ?></td> 
                                                                <td><a class="btn btn-danger btn-sm" title="Reestablecer Clave" id="reestablecerClave" name="reestablecerClave" data-toggle="modal" data-target="#modalRestablecerClave" data-original-title="ReestablecerClave"><i class="fa fa-pencil-square-o"  style="color:white;"></i></a></td>
                                                            </tr>
                                                            <?php $codd+=1 ?>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table> <br/>
                                            </div>
                                            <?php
                                        }else {
                                            echo '<br/>';
                                            echo 'No hay datos disponibles para mostrar';
                                            echo '<br/><br/> ';
                                        }
                                        ?>
                                        <!-- FIN DATATABLE -->
                                    </div> 
                                </div>
                            </td>
                        </tr>  
                        <?php $cod+=1 ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<!-- ************** Fin Tabla Roll con Permisos ************* -->

