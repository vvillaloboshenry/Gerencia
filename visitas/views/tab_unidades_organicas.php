<?php
include "../controller/mostrar_unidad_organica.php";
?>

<!--TAB TABLE UNIDADES ORGANICAS-->
<div class="box" id="box-four" style="display: none;">
    <?php if ($query_unidad_organica->num_rows > 0): ?><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaUnidadesOrganicas">
                <thead>
                    <tr class="active">
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Unidad Organica</th>
                        <th>Nombre Corto</th>
                        <th>Jerarquia Organica</th>
                        <th>Jefe Encargado</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $cod = 1 ?>
                    <?php while ($r = $query_unidad_organica->fetch_array()): ?>
                        <tr>
                            <td><?php echo $cod; ?></td>
                            <td><?php echo $r["codigo"]; ?></td>
                            <td><?php echo $r["nombreUnidadOrganica"]; ?></td>
                            <td><?php echo $r["alias"]; ?></td>
                            <td><?php echo $r["jerarquiaOrganica"]; ?></td>
                            <td><?php echo $r["nombreFuncionario"] . ' ' . $r["apellidoPaterno"] . ' ' . $r["apellidoMaterno"]; ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" title="Editar" id="editarUnidadOrganica" name="editarUnidadOrganica" data-toggle="modal" data-target="#modalEditarUnidadOrganica" onclick="<?php echo "editarUnidadOrganica('" . $r["idUnidad"] . "','" . $r["codigo"] . "','" . $r["nombreUnidadOrganica"] . "','" . $r["alias"] . "','" . $r["jerarquiaOrganica"] . "','" . $r["idFuncionario"] . "');"; ?>"><i class="fa fa-pencil-square-o" style="color:white;"></i></a>
                                <a class="btn btn-danger btn-xs" title="Eliminar" id="eliminarUnidadOrganica" name="eliminarUnidadOrganica" data-toggle="modal" data-target="#modalEliminarUnidadOrganica" onclick="<?php echo "eliminarUnidadOrganica('" . $r["idUnidad"] . "');"; ?>"><i class="fa fa-trash-o" style="color:white;"></i></a>
                            </td>
                        </tr>
                        <?php $cod+=1 ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
