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
        <?php
        include "../controller/conexion.php";
        ?>
        <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" type="text/css"/>
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="../css/plugins/bootstrap-select-1.12.1/js/bootstrap-select.js" type="text/javascript"></script>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/gerenciaJS.js"></script>
    </head>
    <script>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });

            $('table.display').DataTable({
                dom: "<'row'<'col-sm-8'l><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12'p>>"
            });
        });
        $('#chk_listado').on('ifChecked', function (event) {
            $('.chk_listado').iCheck('check');
        });
        $('#chk_listado').on('ifUnchecked', function (event) {
            $('.chk_listado').iCheck('uncheck');
        });
    </script>
    <style>
        .hiddenRow {
            padding: 2 !important;
        }
        .table-responsive .area { border-left: 4px solid #f38787; }
    </style>
    <body>
        <div class="container">
            <div class="content-wrapper" style="min-height: 542px;">
                <!-- Menu Flotante-->
                <div>
                    <div class="container"></div>
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li><a href="#/administrador" style="color: #0088cc"><i class="fa fa-home"></i>Principal</a></li>
                            <li><a style="color: black"> Roles & Permisos </a></li>
                        </ol>
                    </section>
                </div>
                <!-- Fin Menu Flotante-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!-- Roll page -->
                            <div class="nav-tabs-custom"> 
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="ul-menu-list">
                                    <li class="active" id="tabone"><a data-toggle="tab">Roles</a></li>
                                    <li class="" id="tabtwo"><a data-toggle="tab">Nuevo Rol con permisos</a></li>
                                    <li class="" id="tabthree"><a data-toggle="tab">Asignacion de  Rol</a></li>
                                </ul><br>
                                <!-- Fin Nav Tabs  -->
                                <!-- TAB LISTA ROLES --> <?php require_once 'tab_roles.php'; ?> <!-- FIN TAB LISTA ROLES -->
                                <!-- TAB FORMULARIO NUEVO ROL --> <?php require_once 'tab_form_nuevo_rol.php'; ?> <!-- FIN TAB FORMULARIO NUEVO ROL -->
                                <!-- TAB FORMULARIO ASIGNAR ROL --> <?php require_once 'tab_form_asignacion_rol.php'; ?> <!-- FIN TAB FORMULARIO ASIGNAR ROL -->
                                <!-- MODAL ACTUALIZAR ROL --> <?php require_once 'm_actualizar_rol.php'; ?> <!-- FIN MODAL ACTUALIZAR ROL -->
                            </div> 
                            <!--Fin Roll page -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
