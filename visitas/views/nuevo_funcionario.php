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
            eliminarFuncionario = function (idFuncionario) {
                $('#m_eliminar_funcionario_idFuncionario').val(idFuncionario);
            };
            editarFuncionario = function (idFuncionario, nombreFuncionario, apellidoPaternoFuncionario, apellidoMaternoFuncionario, emailFuncionario, dniFuncionario, cargoFuncionario,idUnidadOrganica,unidadOrganica) {
                //JQuery
                $('#m_idFuncionario').val(idFuncionario);
                $('#m_nombreFuncionario').val(nombreFuncionario);
                $('#m_apellidoPaternoFuncionario').val(apellidoPaternoFuncionario);
                $('#m_apellidoMaternoFuncionario').val(apellidoMaternoFuncionario);
                $('#m_emailFuncionario').val(emailFuncionario);
                $('#m_dniFuncionario').val(dniFuncionario);
                $('#m_cargoFuncionario').val(cargoFuncionario);
                $('#m_idUnidadOrganica').val(idUnidadOrganica);
            };
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
                <!-- TAB FORMULARIO UNIDAD ORGANICA --> <?php require_once 'tab_form_unidad_organica.php'; ?> <!-- TAB FORMULARIO UNIDAD ORGANICA -->
                <!-- TAB LISTA FUNCIONARIOS --> <?php require_once 'tab_funcionarios.php'; ?> <!-- FIN TAB LISTA FUNCIONARIOS -->
                <!-- TAB LISTA UNIDADES ORGANICAS --> <?php require_once 'tab_unidades_organicas.php'; ?> <!-- FIN TAB LISTA UNIDADES ORGANICAS -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_actualizar_funcionario.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
                <!-- MODAL ACTUALIZAR FUNCIONARIO --> <?php require_once 'm_eliminar_funcionario.php'; ?> <!-- FIN MODAL ACTUALIZAR FUNCIONARIO -->
            </div>
            <!-- Fin de Pagina de Funcionarios-->
        </div> <br><br><br>
        <!-- Fin Contenedor -->
    </body>

</html>


