<?php
include "../controller/mostrar_roles.php";
include "../controller/mostrar_funcionarios.php";
?>

<!-- ************** Crear Roll con Permisos *************-->
<div class="box" id="box-three" style="display: none;">
    <form method="POST" action="./controller/asignar_rol_funcionario.php" class="form-horizontal" >
        <div class="form-group"><br>
            <label for="role" class=" col-lg-3 control-label">Usuario </label>
            <div class="col-xs-5">
                <select class="selectpicker form-control" id="idFuncionario" name="idFuncionario" data-live-search="true" title="Seleccione un Usuario">
                    <?php if ($query_rol->num_rows > 0): ?>
                        <?php while ($columna_funcionarios = $query_funcionarios->fetch_array()): ?>
                            <option value="<?php echo $columna_funcionarios["idFuncionario"]; ?>" data-subtext="<?php echo $columna_funcionarios["alias"] . ' - ' . $columna_funcionarios["usuario"] . ' - ' . $columna_funcionarios["rol"];?>" > <?php echo $columna_funcionarios["nombre"] . ' ' . $columna_funcionarios["apellidoPaterno"] . ' ' . $columna_funcionarios["apellidoMaterno"]; ?></option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="role" class=" col-lg-3 control-label">Rol </label>
            <div class="col-xs-5">
                <select class="selectpicker form-control" id="idRol" name="idRol" data-live-search="true" title="Seleccione un Rol">
                    <?php if ($query_rol->num_rows > 0): ?>
                        <?php while ($rr = $query_rol->fetch_array()): ?>
                            <option value=" <?php echo $rr["idRol"]; ?>" data-subtext=""> <?php echo $rr["rol"]; ?> </option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div><br>
        <div class="form-group required">
            <label class=" col-md-3 control-label"></label>
            <div class="col-md-7">
                <input class="btn btn-primary" type="submit" value="Asignar Rol">
            </div>
        </div> <br><br>
    </form>
</div>
<!-- ************** Fin Rol y Permisos*************-->
