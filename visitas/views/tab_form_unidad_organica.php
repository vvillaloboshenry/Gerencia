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
                        <input type="text" class="form-control" name="codigoUnidad" id="codigoUnidad" placeholder="Codigo de Unidad Organica" required autofocus>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Nombre:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nombreUnidad" id="nombreUnidad" placeholder="Nombre de Unidad Organica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Nombre Corto:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="alias" id="alias" placeholder="Nombre de referencia a la Unidad Orgnica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <label class="col-md-3 control-label">Jerarquia Organica:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="jerarquiaOrganica" id="jerarquiaOrganica" placeholder="Jerarquia Organica" required>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 17px;">
                    <?php if ($query_funcionarios->num_rows > 0): ?>
                        <label class="col-md-3 control-label">Jefe/Encargado:</label>
                        <div class="col-md-8">
                            <select class="selectpicker form-control" name="idFuncionario" id="idFuncionario" data-live-search="true" title="Seleccion al encargado para esta Unidad">
                                <option value="0">No se encuentra disponible aun</option>
                                <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                    <?php $cargo = $rr["cargo"]; ?>
                                    <option value="<?php echo $rr["idFuncionario"]; ?>"  data-subtext="<?php echo $cargo; ?>"><?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"];?></option>
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