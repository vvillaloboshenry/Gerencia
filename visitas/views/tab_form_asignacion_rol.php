
<!-- ************** Crear Roll con Permisos *************-->
<div class="box" id="box-three" style="display: none;">
    <form method="POST" action="./controller/asignar_rol_funcionario.php" class="form-horizontal" >
        <div class="form-group"><br>
            <label for="role" class=" col-lg-3 control-label">Rol </label>
            <div class="col-lg-5">
                <input type="text" class="form-control" id="inputNameProfi"  name="inputNameProfi"  maxlength="50" placeholder="Rol" required="true" >
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="role" class=" col-lg-3 control-label">Descripcion </label>
            <div class="col-lg-5">
                <input type="text" class="form-control" id="inputDescripcion"   name="inputDescripcion" maxlength="50" placeholder="Breve Descripcion de su funcion " required="true">
                <span class="text-danger"></span>
            </div>
        </div>
        <select class="selectpicker" data-live-search="true" >
            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
            <option data-tokens="mustard">Burger, Shake and a Smile</option>
            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
        </select>

        <div class="form-group required">
            <label class=" col-md-3 control-label"></label>
            <div class="col-md-7">
                <input class="btn btn-primary" type="submit" value="Crear Rol">
            </div>
        </div> <br><br>
    </form>
</div>
<!-- ************** Fin Rol y Permisos*************-->
