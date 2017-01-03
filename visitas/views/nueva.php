<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

switch ($profile) {
    case '' :
       // header('Location: ../visitas/#/ver_visitas');
        print "<script>window.location='./#/ver_visitas';</script>";
        break;
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src='js/validator.js' type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>Nueva Visita a Funcionarios</title>
    </head>
    <body>
        <div id="divContenedor">
            <div class="container">
                <!--  <form class="form-signin" action='registro.php' method='POST' onSubmit='return validar();'> -->
                <form class="form-signin" action='./controller/registro.php' method='POST'> 				
                    <h2 class="form-signin-heading">Registro de Visitas</h2>
                    <br>
                    <div class="control-group" id="controlVisitante">
                        <fieldset class="scheduler-border" id="fieldVisitante">
                            <legend class="scheduler-border">Datos del Visitane</legend>
                            <table id="tVisitante">
                                <tr>
                                    <td class="td-form">
                                        <label>	Nombres:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputNameVisitante' id="inputNameVisitante" class="form-control" placeholder="Nombre" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Apellidos:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputSurnameVisitante' id="inputSurnameVisitante" class="form-control" placeholder="Apellidos" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	DNI:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputDniVisitante' id="inputDniVisitante" class="form-control" placeholder="Dni" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>

                    <div class="control-group" id="controlFuncionario">
                        <fieldset class="scheduler-border" id="fieldFuncionario" >
                            <legend class="scheduler-border">Datos del Funcionario</legend>

                            <table  id="tFuncionario">
                                <tr>
                                    <td class="td-form">
                                        <label>	Nombres:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputNameFuncionario' id="inputNameFuncionario" class="form-control" placeholder="Nombre" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Apellidos:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputSurnameFuncionario' id="inputSurnameFuncionario" class="form-control" placeholder="Apellidos" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Oficina:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputOficina' id="inputOficina" class="form-control" placeholder="Oficina" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Cargo:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputCargo' id="inputCargo" class="form-control" placeholder="Cargo" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div class="control-group" id="controlVisita">
                        <fieldset class="scheduler-border" id="fieldVisita">
                            <legend class="scheduler-border">Datos de la Visita</legend>
                            <table id="tVisita">
                                <tr>
                                    <td class="td-form">
                                        <label> Lugar:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='inputLugar' id="inputLugar" class="form-control" placeholder="Lugar de la visita" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Motivo Visita:</label>
                                    </td>
                                    <td>
                                        <textarea rows="4" cols="50" style="max-width: 480px;max-height: 150px;" name='inputMotivo' id="inputMotivo" class="form-control" placeholder="Describa el motivo de la visita" required autofocus></textarea>
                                        </br>
                                    </td>
                                </tr>   
                            </table>
                        </fieldset>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnGuardarVisita">Grabar visita</button>
                    <br>
                    <div>
                    </div>				
                </form>
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
                echo '<a class="btn btn -lg btn-danger"  id="btnVerVisita" href=' . $url . '>Mostrar Visitas</a>';
                ?>

                <br> <br>
            </div> <!-- /container -->       
        </div>
    </body>
</html>
