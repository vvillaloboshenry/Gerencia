<?php
include "../controller/mostrar_funcionarios.php";
?>

<!--TAB TABLE FUNCIONARIOS-->
<div class="box" id="box-three" style="display: none;">
    <?php if ($query->num_rows > 0): ?><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaFuncionarios">
                <thead>
                    <tr class="active">
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Oficina</th>
                        <th>Rol</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $cod = 1 ?>
                    <?php while ($r = $query->fetch_array()): ?>
                        <tr>
                            <td><?php echo $cod; ?></td>
                            <td><?php echo $r["loginUsers"]; ?></td>
                            <td><?php echo $r["nombre"] . ' ' . $r["apellidoPaterno"] . ' ' . $r["apellidoMaterno"]; ?></td>
                            <td><a href=""><?php echo $r["emailUser"]; ?></a></td>
                            <td><?php echo $r["cargo"]; ?></td>
                            <td><?php echo $r["oficina"]; ?></td>
                            <td><?php echo $r["nameProfi"]; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i></a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php $cod+=1 ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
