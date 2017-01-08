<?php
include "../controller/mostrar_unidad_organica.php";
include "../controller/mostrar_roles.php";
?>
<!-- TAB FORM FUNCIONARIOS -->
<div class="box" id="box-one" style="display: block;">
    <form class="form-horizontal" method="post" action='./controller/agregar_Funcionarios.php'>
        <div class="control-group" id="controlVisitante"><br> 
            <fieldset class="scheduler-border" id="fieldVisitante" style="border:1px solid #eee;">
                <legend class="scheduler-border">Datos del Funcionario</legend><br>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label" >Nombres:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputNombreFuncionario' id="inputNombreFuncionario" placeholder="Nombre completo del funcionario" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Apellidos:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name='inputApellidoPaternoFuncionario' id="inputApellidoPaternoFuncionario" placeholder="Apellido Paterno" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name='inputApellidoMaternoFuncionario' id="inputApellidoMaternoFuncionario" placeholder="Apellido Materno" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">DNI(*):</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputDniFuncionario' id="inputDniFuncionario" placeholder="# de DNI" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Cargo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputCargoFuncionario' id="inputCargoFuncionario" placeholder="Cargo del funcionario" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Unidad Perteneciente:</label>
                    <div class="col-md-8">
                        <select class="form-control" name='inputOficinaFuncionario' id="inputOficinaFuncionario">
                            <option disabled="true">-- Unidad perteneciente del Usuario --</option>
                            <?php if ($query_unidad_organica->num_rows > 0): ?>
                                <?php while ($unidad = $query_unidad_organica->fetch_array()): ?>
                                    <option value=" <?php echo $unidad["idUnidad"]; ?> " > <?php echo $unidad["nombreUnidadOrganica"]; ?> </option>
                                <?php endwhile; ?> 
                            <?php endif; ?>
                            <option value="0"> No se encuentra disponible aun </option>
                        </select>
                    </div>

                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name='inputEmailUser' id="inputEmailUser" placeholder="Correo Institucional : ejemplo@regionlambayeque.gob.pe" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <?php if ($query_rol->num_rows > 0): ?>
                        <label class="col-md-3 control-label">Tipo de Usuario</label>
                        <div class="col-md-8">
                            <select class="form-control" name='inputidprofile' id="inputidprofile">
                                <option disabled="true">-- Elige el tipo de Usuario --</option>
                                <?php while ($rr = $query_rol->fetch_array()): ?>
                                    <option value=" <?php echo $rr["idProfile"]; ?> " > <?php echo $rr["nameProfi"]; ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    <?php endif; ?>
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