<?php
include "../controller/mostrar_funcionarios.php";
?>

<!--TAB TABLE FUNCIONARIOS-->
<div class="box" id="box-three" style="display: none;">
    <?php if ($query_funcionarios->num_rows > 0): ?><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaFuncionarios">
                <thead>
                    <tr class="active">
                        <th>#</th>
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Unidad Perteneciente</th>
                        <th>Rol</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $cod = 1 ?>
                    <?php while ($r = $query_funcionarios->fetch_array()): ?>
                        <tr>
                            <td><?php echo $cod; ?></td>
                            <td><?php echo $r["loginUsers"]; ?></td>
                            <td><?php echo $r["nombre"] . ' ' . $r["apellidoPaterno"] . ' ' . $r["apellidoMaterno"]; ?></td>
                            <td><a href=""><?php echo $r["emailUser"]; ?></a></td>
                            <td><?php echo $r["cargo"]; ?></td>
                            <td><?php echo $r["unidadOrganica"]; ?></td>
                            <td><?php echo $r["nameProfi"]; ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" title="Editar" id="editarFuncionario" name="editarFuncionario" data-toggle="modal" data-target="#modalEditarFuncionario" onclick="<?php echo "editarFuncionario('" . $r["idUsers"] . "','" . $r["nombre"] . "','" . $r["apellidoPaterno"] . "','" . $r["apellidoMaterno"] . "','" . $r["emailUser"] . "','" . $r["dni"] . "','" . $r["cargo"] . "','" . $r["idUnidadOrganica"] . "','" . $r["unidadOrganica"] . "');"; ?>"><i class="fa fa-pencil-square-o" style="color:white;"></i></a>
                                <a class="btn btn-danger btn-xs" title="Eliminar" id="eliminarFuncionario" data-toggle="modal" data-target="#modalEliminarFuncionario" onclick="<?php echo "eliminarFuncionario('" . $r["idUsers"] . "');"; ?>"><i class="fa fa-trash-o" style="color:white;"></i></a>
                            </td>
                        </tr>
                        <?php $cod+=1 ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
