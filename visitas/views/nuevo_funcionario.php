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
                    <li class="" id="tabtwo"><a data-toggle="tab">Unidad Organica</a></li>
                    <li class="" id="tabthree"><a data-toggle="tab">Lista de Funcionarios</a></li>
                </ul>
                <!-- Tab panes -->

                <!-- TAB FORMULARIO FUNCIONARIOS --> <?php require_once 'tab_form_funcionarios.php'; ?> <!-- FIN TAB FORMULARIO FUNCIONARIOS -->
                <!-- TAB FORMULARIO UNIDAD ORGANICA --> <?php require_once 'tab_form_unidad_organica.php'; ?> <!-- TAB FORMULARIO UNIDAD ORGANICA -->
                <!-- TAB LISTA FUNCIONARIOS --> <?php require_once 'tab_funcionarios.php'; ?> <!-- FIN TAB LISTA FUNCIONARIOS -->
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
