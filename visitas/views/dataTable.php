<?php 
require'../class/sessions.php';
include "../controller/conexion.php";
include "../controller/mostrar_visitas.php";

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
$permisos = isset($_SESSION['arr_permisos']) ? $_SESSION['arr_permisos'] : array('');
?>

            <?php if ($query->num_rows > 0): ?>
                <?php $cod = 1; ?>
                <?php while ($r = $query->fetch_array()): ?>
                    <tr>
                        <td><?php echo $cod ?></td> 
                        <td><?php echo $r["nombreVisitante"] . ' ' . $r["apellidoPVisitante"] . ' ' . $r["apellidoMVisitante"]; ?></td>
                        <td><?php echo $r["dniVisitante"]; ?></td>
                        <td><?php echo $r["motivo"]; ?></td>
                        <td><?php echo $r["lugar"]; ?></td>
                        <td><?php echo $r["nombreFuncionario"] . ' ' . $r["apellidoPFuncionario"] . ' ' . $r["apellidoMFuncionario"]; ?></td>
                        <td><?php
                            if ($r["oficinaFuncionario"] != "" && $r["cargoFuncionario"] != "") {
                                echo $r["alias"] . '/' . $r["cargoFuncionario"];
                            } else {// if oficinaFuncionario es vacio imprime el cargo, sino imprime la oficina(alias)
                                echo $r["oficinaFuncionario"] == "" ? $r["cargoFuncionario"] : $r["alias"]; // expresion ternaria
                            }
                            ?></td>
                        <td><?php echo date("d-m-Y", strtotime($r["fecha"])); ?></td>
                        <td><?php echo $r["fechaTermino"] != '0' ? date('d-m-Y', strtotime($r["fechaTermino"])) : '0000-00-00'; ?></td>
                        <td><?php $r["estadoVisita"] == "Finalizado" ? $class = "label label-primary" : $class = "label label-success"; ?>
                            <div class="label-block">
                                <span class="<?php echo $class; ?>"><?php echo $r["estadoVisita"]; ?></span>
                            </div>        
                        </td>
                        <td>
                            <?php if (in_array('verVisita', $permisos)) : ?>
                                <a class="btn btn-default btn-xs btn_verVisita " title="Ver" type="button" id="verVisita" name="verVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisitaVisitanteFuncionario"] . "','" . $r["idVisita"] . "','" . $r["idVisitante"] . "','" . $r["nombreVisitante"] . "','" . $r["apellidoPVisitante"] . "','" . $r["apellidoMVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["idFuncionario"] . "','" . $r["nombreFuncionario"] . "','" . $r["apellidoPFuncionario"] . "','" . $r["apellidoMFuncionario"] . "','" . $r["fecha"] . "','" . $r["fechaTermino"] . "','" . $r["oficinaFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','verVisita');"; ?>"><img alt="Ver" style="width:19px;" src="../icon/eye.png"/></a>
                            <?php endif; ?>
                            <?php if (in_array('editarVisita', $permisos)) : ?>     
                                <a class="btn btn-warning btn-xs btn_editarVisita" title="Editar" id="editarVisita" name="editarVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisitaVisitanteFuncionario"] . "','" . $r["idVisita"] . "','" . $r["idVisitante"] . "','" . $r["nombreVisitante"] . "','" . $r["apellidoPVisitante"] . "','" . $r["apellidoMVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["idFuncionario"] . "','" . $r["nombreFuncionario"] . "','" . $r["apellidoPFuncionario"] . "','" . $r["apellidoMFuncionario"] . "','" . $r["fecha"] . "','" . $r["fechaTermino"] . "','" . $r["oficinaFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','editar');"; ?>"><img alt="Editar" style="width:19px;" src="../icon/edit.png"></a>
                            <?php endif; ?>
                            <?php if (in_array('eliminarVisita', $permisos)) : ?>
                                <a class="btn btn-danger btn-xs btn_eliminarVisita" title="Eliminar" id="eliminarVisita" name="eliminarVisita" data-toggle="modal" data-target="#modalEliminar" onclick="<?php echo "eliminarVisita('" . $r["idVisita"] . "');"; ?>"><img alt="Eliminar" style="width:19px;" src="../icon/trash.png"></a>
                                <?php endif; ?>
                        </td>
                    </tr>
                    <?php $cod+=1 ?>
                <?php endwhile; ?>
            <?php endif; ?>
