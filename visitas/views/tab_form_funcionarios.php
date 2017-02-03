<?php
include "../controller/mostrar_unidad_organica.php";
include "../controller/mostrar_roles.php";
?>
<!-- TAB FORM FUNCIONARIOS -->
<div class="box" id="box-one" style="display: block;">
    <form class="form-horizontal" method="post" action='./controller/crear_funcionario.php'>
        <div class="control-group" id="controlVisitante"><br> 
            <fieldset class="scheduler-border" id="fieldVisitante" style="border:1px solid #eee;">
                <legend class="scheduler-border">Datos del Funcionario</legend><br>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label" >Nombres:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nombreFuncionario" id="nombreFuncionario" placeholder="Nombre completo del funcionario" required autofocus>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Apellidos:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="apellidoPFuncionario" id="apellidoPFuncionario" placeholder="Apellido Paterno" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="apellidoMFuncionario" id="apellidoMFuncionario" placeholder="Apellido Materno" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">DNI(*):</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="dniFuncionario" id="dniFuncionario" placeholder="# de DNI" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Cargo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cargoFuncionario" id="cargoFuncionario" placeholder="Cargo del funcionario" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo Institucional : ejemplo@regionlambayeque.gob.pe" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Unidad Perteneciente:</label>
                    <div class="col-md-8">
                        <select class="selectpicker form-control" name='idUnidadOrganica' id="idUnidadOrganica" data-live-search="true" title="Seleccione una Unidad perteneciente para este Usuario" >
                            <option value="0"> No se encuentra disponible aun </option>
                            <?php if ($query_unidad_organica->num_rows > 0): ?>
                                <?php while ($unidad = $query_unidad_organica->fetch_array()): ?>
                                    <?php $funcionario = $unidad["nombreFuncionario"] . ' ' . $unidad["apellidoPaterno"] . ' ' . $unidad["apellidoMaterno"]; ?>
                                    <option value="<?php echo $unidad["idUnidad"]; ?>" data-subtext="<?php if ($funcionario != null) {echo $funcionario;}?>"><?php echo $unidad["nombreUnidadOrganica"];?></option>
                                        <?php endwhile; ?> 
                                    <?php endif; ?>
                        </select>
                    </div>
                </div>
                <br>
            </fieldset>  
        </div>
        <div class="col-md-offset-3">
            <div style="">
                <button type="submit" class="btn btn-info">Grabar Funcionario</button>
                <a class="btn btn-danger"  id="btnRegresar" href='#/administrador '>Regresar a Visitas</a>
            </div>
        </div>
    </form><br><br>
</div>