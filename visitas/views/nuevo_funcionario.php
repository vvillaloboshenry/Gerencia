<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

switch ($profile) {
    case '' :
        header('Location: ../views/listar.php');
        break;
}
?>
<html>
    <head>
        <script src="../js/gerenciaJS.js"></script>
        <?php
        include "../controller/conexion.php";
        include "../controller/mostrar_roles.php";
        include "../controller/mostrar_funcionarios.php";
        ?>
    </head>
    <body><br>
        <div class="container">
            <!-- Menu Flotante-->
            <div>
                <div class="container"></div>
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#/administrador" style="color: #0088cc"><i class="fa fa-home"></i>Principal</a></li>
                        <li><a style="color: black"> Nuevo Funcionario</a></li>
                    </ol>
                </section>
            </div>
            <!-- Fin Menu Flotante-->

            <!-- Users page -->
            <div class="page-content page-users">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="ul-menu-list">
                    <li class="active" id="tabone"><a data-toggle="tab" >Agregar Funcionario</a></li>
                    <li class="" id="tabtwo"><a data-toggle="tab">Lista de Funcionarios</a></li>
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
                        <div class="col-md-offset-3 col-md-2">
                            <div style="margin: auto;">
                                <button type="submit" class="btn btn-info">Grabar Funcionario</button>
                            </div>
                        </div>
                    </form><br><br>
                </div>

                <!--table user -->
                <div class="box" id="box-two" style="display: none;">
                    <?php if ($query->num_rows > 0): ?>
                        <!-- Users table -->
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody> 
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
        <br><br><br>
    </body>

</html>
