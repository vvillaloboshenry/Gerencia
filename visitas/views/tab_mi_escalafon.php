<?php
$objses = new Sessions();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
include "../controller/conexion.php";
?>
<!-- ************** Tabla Roll con Permisos ************* -->
<div class="form-horizontal">
    <div class="box" id="box-one" style="display: block;">
        <?php
        $sqlEscalafon = "select f.nombre as nombreCompleto, f.apellidoPaterno,f.apellidoMaterno,f.dniFuncionario,f.email,f.cargo,f.usuario,uo.nombre as nombreUnidad,uo.codigo,uo.alias,uo.jerarquiaOrganica from funcionario f LEFT JOIN unidad_organica uo on f.idUnidadOrganica=uo.idUnidad where dniFuncionario='" . $usuario . "'";
        $query_escalafon = $con->query($sqlEscalafon);
        if ($query_escalafon->num_rows > 0):
            while ($datos = $query_escalafon->fetch_array()):
                ?>
                <h4>DATOS DEL FUNCIONARIO</h4><br>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">NOMBRE COMPLETO:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["nombreCompleto"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">APELLIDO PATERNO:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["apellidoPaterno"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">APELLIDO MATERNO:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["apellidoMaterno"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">DOC. DE IDENTIDAD:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["dniFuncionario"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">CORREO INSTITUCIONAL:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["email"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">CARGO INSTITUCIONAL:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["cargo"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">CLAVE: </label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" id="clave" name="clave" maxlength="50" placeholder="Cambiar Clave">
                        <span class="text-danger"></span>
                        <button type="submit" class="btn btn-info">Cambiar Clave</button>
                    </div>
                </div>
                <h4>DATOS DE LA UNIDAD ORGANICA</h4><br>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">UNIDAD ORGANICA:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["nombreUnidad"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">NOMBRE CORTO:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["alias"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">CODIGO DE UNIDAD:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["codigo"]; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-lg-3 control-label">JERARQUIA ORGANICA:</label>
                    <div class="col-lg-5">
                        <label for="role" class="control-label" style="font-weight: 100;text-transform: uppercase;"><?php echo $datos["jerarquiaOrganica"]; ?></label>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div><br><br>
</div>
<!-- ************** Fin Tabla Roll con Permisos ************* -->

