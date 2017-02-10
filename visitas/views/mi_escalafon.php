<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
$permisos = isset($_SESSION['arr_permisos']) ? $_SESSION['arr_permisos'] : array('');
$mensaje = isset($_POST['message']) ? $_POST['message'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;

switch ($rol) {
    case '' :
        //llamado a la clase que hace la conexcion a la base de datos
        require'../class/config.php';
//LLamado a la clase Usuarios para realizar el inicio de sesion
        require'../class/users.php';
//llamado a la clase que ejecutará los queries de Consulta, Adición y Eliminación
        require'../class/dbactions.php';
//llamado a la clase encargada de las sesiones
//creación o instanciamiento de un objeto de la Clase Connection
        $objConn = new Connection();
//objeto de la clase users
        $objUser = new Users();

//llamamos la funcion que nos conecta a la base de datos
        $objConn->get_connected();
//function que realiza la verificación de usuarios e inicio de sesion
        $objUser->login_in();


        print "<script>window.location='./#/administrador';</script>";
        break;
    default :
        print "<script>window.location='./#/mi_escalafon';</script>";
}
?>
<html>
    <head>
        <link href="../css/estilo.css" rel="stylesheet" type="text/css"/>   
        <?php
        include "../controller/conexion.php";
        ?>
        <script>
            $("#ul-menu-list li").click(function () {
                $('.box').hide().eq($(this).index()).show();
            });
        </script>
        <title>Visitas a Funcionarios</title>
    </head>
    <body>        
        <div class="container" id="contenedor">
            <div class="content-wrapper"  style="min-height: 542px;">
                <!-- Menu Flotante-->
                <div>
                    <div class="container"></div>
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li><a href="#/administrador" style="color: #0088cc"><i class="fa fa-home"></i>Principal</a></li>
                            <li><a style="color: black"> Mi Escalafon & Mi Actividad</a></li>
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
                                    <li class="active" id="tabone_"><a data-toggle="tab">Mi Escalafon</a></li>
                                    <li class="" id="tabtwo"><a data-toggle="tab">Mi Actividad</a></li>
                                </ul><br>
                                <!-- Fin Nav Tabs  -->
                                <!-- TAB MI ESCALAFON--> <?php require_once 'tab_mi_escalafon.php'; ?> <!-- FIN TAB MI ESCALAFON-->
                            </div> 
                            <!--Fin Roll page -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
    <script src="../js/controles_listar_administrador.js" type="text/javascript"></script>
</html>
