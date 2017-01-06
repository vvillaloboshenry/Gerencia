<?php
include "../controller/mostrar_funcionarios.php";
?>
<!-- TAB FORM UNIDAD ORGANICA -->
<div class="box" id="box-two" style="display: none;">
    <form class="form-horizontal" method="post" action='./controller/crear_unidad_organica.php'>
        <div class="control-group" id="controlVisitante"><br> 
            <fieldset class="scheduler-border" id="fieldVisitante" style="border:1px solid #eee;">
                <legend class="scheduler-border">Unidad Organica</legend><br>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label" >Codigo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputCodigo' id="inputCodigo" placeholder="Codigo de Unidad Organica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Nombre:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputNombre' id="inputNombre" placeholder="Nombre de Unidad Organica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Nombre Corto:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputAlias' id="inputAlias" placeholder="Nombre de referencia a la Unidad Orgnica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Jerarquia Organica:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name='inputJerarquiaOrganica' id="inputJerarquiaOrganica" placeholder="Jerarquia Organica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <?php if ($query_funcionarios->num_rows > 0): ?>
                        <label class="col-md-3 control-label">Jefe/Encargado:</label>
                        <div class="col-md-8">
                            <select class="form-control" name='inputEncargado' id="inputEncargado">
                                <option disabled="true">-- Elige el tipo de Usuario --</option>
                                <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                    <option value=" <?php echo $rr["idUsers"]; ?> " > <?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"] . ' - ' . $rr["cargo"]; ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
                <br>
            </fieldset>  
        </div>
        <div class="col-md-offset-3 col-md-2">
            <div style="margin: auto;">
                <button type="submit" class="btn btn-info">Grabar Funcionario</button>
            </div>
        </div>
    </form><br><br>
</div>