<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
switch ($rol) {
    case '' :
        header('Location: ../views/listar.php');
        break;
}
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <script src="../css/plugins/bootstrap-select-1.12.1/js/bootstrap-select.js" type="text/javascript"></script>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/gerenciaJS.js"></script>
        <?php
        include "../controller/conexion.php";
        ?>
        <script>
            $(document).ready(function () {
                $('#tablaFuncionarios').DataTable({
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12'p>>"
                });
                $('#tablaUnidadesOrganicas').DataTable({
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12'p>>"
                });
            });
           
        </script>
    </head>
    <body><br>
        <!-- Contenedor -->
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

            <!-- Pagina de Funcionarios-->
            <div class="page-content page-users">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="ul-menu-list">
                    <li class="active" id="tabone"><a data-toggle="tab" >Agregar Funcionario</a></li>
                    <li class="" id="tabtwo"><a data-toggle="tab">Unidad Organica</a></li>
                    <li class="" id="tabthree"><a data-toggle="tab">Funcionarios</a></li>
                    <li class="" id="tabfour"><a data-toggle="tab">Unidades Organicas</a></li>
                </ul>
                <!-- Fin Nav tabs -->

                <!-- TAB FORMULARIO FUNCIONARIOS --> <?php require_once 'tab_form_funcionarios.php'; ?> <!-- FIN TAB FORMULARIO FUNCIONARIOS -->
                <!-- TAB FORMULARIO UNIDAD ORGANICA --> <?php require_once 'tab_form_unidad_organica.php'; ?> <!-- FIN TAB FORMULARIO UNIDAD ORGANICA -->
                <!-- TAB LISTA FUNCIONARIOS --> <?php require_once 'tab_funcionarios.php'; ?> <!-- FIN TAB LISTA FUNCIONARIOS -->
                <!-- TAB LISTA UNIDADES ORGANICAS --> <?php require_once 'tab_unidades_organicas.php'; ?> <!-- FIN TAB LISTA UNIDADES ORGANICAS -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_actualizar_funcionario.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_eliminar_funcionario.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_actualizar_unidad_organica.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_eliminar_unidad_organica.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
            </div>
            <!-- Fin de Pagina de Funcionarios-->
        </div> <br><br><br>
        <!-- Fin Contenedor -->
    </body>
<script src="../js/controles_nuevo_funcionario.js" type="text/javascript"></script>
</html>


