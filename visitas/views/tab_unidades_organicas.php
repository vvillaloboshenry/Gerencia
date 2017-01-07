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
                        <th>Nombre</th>
                        <th>Alias</th>
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
                            <td><?php echo $r["nombre"]; ?></td>
                            <td><?php echo $r["alias"]; ?></td>
                            <td><?php echo $r["jerarquiaOrganica"]; ?></td>
                            <td><?php echo $r["idUsers"]; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
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
