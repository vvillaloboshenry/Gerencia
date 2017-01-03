<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

switch ($profile) {
    case '' :
        print "<script>window.location='./#/ver_visitas';</script>";
        break;
}
?>
<html>
    <head>
        <script src="../js/gerenciaJS.js"></script>
    </head>
    <body><br>
        <div class="container">
            <!-- Users page -->
            <div class="page-content page-users">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="ul-menu-list">
                    <li class="active" id="tabtwo"><a data-toggle="tab" >Agregar Funcionario</a></li>
                    <li class="" id="tabone"><a data-toggle="tab">Lista de Funcionarios</a></li>
                </ul>
                <!-- Tab panes -->
                <!-- Add new user -->
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
                                    <label class="col-md-3 control-label">DNI</label>
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
                                    <label class="col-md-3 control-label">Oficina:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name='inputOficinaFuncionario' id="inputOficinaFuncionario" placeholder="Oficina del funcionario" required> 
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 17px;">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name='inputEmailUser' id="inputEmailUser" placeholder="Correo Institucional : ejemplo@regionlambayeque.gob.pe" required>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 17px;">
                                    <label class="col-md-3 control-label">Tipo de Usuario</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name='inputidprofile' id="inputidprofile">
                                            <option disabled="true">-- Elige el tipo de Usuario --</option>
                                            <option value="1">Administrador</option>
                                            <option value="3">Funcionario</option>
                                            <option value="2">Secretaria</option>
                                            <option value="4">Guardia Vigia</option>
                                            <option value="5">Digitador</option>
                                        </select>
                                    </div></div>
                                <br>
                            </fieldset>  
                        </div>
                        <div class="col-md-offset-3 col-md-2">
                            <div style="margin: auto;">
                                <button type="submit" class="btn btn-info">Grabar Funcionario</button>
                            </div>
                        </div>
                    </form>

                </div>

                <!--table user -->
                <div class="box" id="box-two" style="display: none;">
                    <!-- Users table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="active">
                                    <th><input type="checkbox"></th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date Joined</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>arska.kram.1990</td>
                                    <td>Arska Kumar</td>
                                    <td><a href="mailto:arska.kram.1990@gmail.com">arska.kram.1990@gmail.com</a></td>
                                    <td>25.2.1990</td>
                                    <td>Moderator</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>ska.kakma</td>
                                    <td>Ska Kakma</td>
                                    <td><a href="mailto:ska.kakma@gmail.com">ska.kakma@gmail.com</a></td>
                                    <td>13.5.2005</td>
                                    <td>Admin</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>mundri.packoda</td>
                                    <td>Mundri Packoda</td>
                                    <td><a href="mailto:mundri.packoda@gmail.com">mundri.packoda@gmail.com</a></td>
                                    <td>12.4.2004</td>
                                    <td>Author</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>james.bond.007</td>
                                    <td>James Bond</td>
                                    <td><a href="mailto:james.bond.007@gmail.com">james.bond.007@gmail.com</a></td>
                                    <td>18.6.2003</td>
                                    <td>Temp</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;
        if ($profile == '') {
            $url = "./#/ver_visitas";
        } else {
            if ($profile == 1) {
                $url = "./#/administrador";
            } else {
                if ($profile == 2) {
                    $url = "./#/secretaria";
                }
            }
        }
        echo '<div class="col-md-offset-3 col-md-2"><div style="margin:inherit;"><a class="btn btn-danger"  id="btnRegresar" href=' . $url . '>Regresar a Visitas</a></div></div>';
        ?>
        <br>
    </body>

</html>
