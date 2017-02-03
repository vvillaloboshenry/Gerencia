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

        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src='js/validator.js' type="text/javascript"></script>
        <meta charset="UTF-8">
        <?php
        include "../controller/conexion.php";
        include "../controller/mostrar_funcionarios.php";
        ?>  
        <script src="../css/plugins/bootstrap-select-1.12.1/js/bootstrap-select.js" type="text/javascript"></script>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/gerenciaJS.js"></script>
        <title>Nueva Visita a Funcionarios</title>
        <script>
            $(document).ready(function () {
                var consulta;
                //hacemos focus al campo de búsqueda
                $("#nueva_visita_dniVisitante").focus();

                //comprobamos si se pulsa una tecla
                $("#nueva_visita_dniVisitante").keyup(function (e) {

                    //obtenemos el texto introducido en el campo de búsqueda
                    consulta = $("#nueva_visita_dniVisitante").val();

                    //hace la búsqueda

                    if (consulta.length == 8 || consulta.length == 12 || consulta.length == 15) {
                        $.ajax({
                            type: "POST",
                            url: "./controller/buscar_visitante_dni.php",
                            data: "nueva_visita_dniVisitante=" + consulta,
                            dataType: "html",
                            error: function () {
                            },
                            success: function (data) {
                                $('#nueva_visita_idVisitante').val('');
                                $('#nueva_visita_nombreVisitante').val('');
                                $('#nueva_visita_apellidoPaternoVisitante').val('');
                                $('#nueva_visita_apellidoMaternoVisitante').val('');
                                $('#nueva_visita_nombreVisitante').prop("disabled", true);
                                $('#nueva_visita_apellidoPaternoVisitante').prop("disabled", true);
                                $('#nueva_visita_apellidoMaternoVisitante').prop("disabled", true);
                                var datas = data.split(",");
                                $('#nueva_visita_idVisitante').val(datas[0]);
                                $('#nueva_visita_nombreVisitante').val(datas[1]);
                                $('#nueva_visita_apellidoPaternoVisitante').val(datas[2]);
                                $('#nueva_visita_apellidoMaternoVisitante').val(datas[3]);
                                if ($('#nueva_visita_nombreVisitante').val() == "" || $('#nueva_visita_apellidoPaternoVisitante') == "" || $('nueva_visita_apellidoMaternoVisitante') == "") {
                                    $('#nueva_visita_nombreVisitante').prop("disabled", false);
                                    $('#nueva_visita_apellidoPaternoVisitante').prop("disabled", false);
                                    $('#nueva_visita_apellidoMaternoVisitante').prop("disabled", false);
                                }
                            }
                        });
                    } else {
                        $('#nueva_visita_idVisitante').val('');
                        $('#nueva_visita_nombreVisitante').val('');
                        $('#nueva_visita_apellidoPaternoVisitante').val('');
                        $('#nueva_visita_apellidoMaternoVisitante').val('');
                        $('#nueva_visita_nombreVisitante').prop("disabled", true);
                        $('#nueva_visita_apellidoPaternoVisitante').prop("disabled", true);
                        $('#nueva_visita_apellidoMaternoVisitante').prop("disabled", true);
                        ;
                    }
                });

            });
            $('.selectpicker').on('change', function () {
                var consulta = $(this).find("option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "./controller/buscar_funcionario_id.php",
                    data: "nueva_visita_idFuncionario=" + consulta,
                    dataType: "html",
                    error: function () {
                    },
                    success: function (data) {
                        $('#nueva_visita_oficina').val('');
                        $('#nueva_visita_cargo').val('');
                        var datas = data.split(",");
                        $('#nueva_visita_cargo').val(datas[1]);
                        $('#nueva_visita_oficina').val(datas[2]);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="divContenedor">
            <div class="container">
                <!--  <form class="form-signin" action='registro.php' method='POST' onSubmit='return validar();'> -->
                <form class="form-signin" action='./controller/crear_visita.php' method='POST'> 				
                    <h2 class="form-signin-heading">Registro de Visitas</h2>
                    <br>
                    <div class="control-group" id="controlVisitante">
                        <fieldset class="scheduler-border" id="fieldVisitante">
                            <legend class="scheduler-border">Datos del Visitante</legend>
                            <table id="tVisitante">
                                <tr>
                                    <td class="td-form">
                                        <label>	Doc. Identidad:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_dniVisitante' id="nueva_visita_dniVisitante" class="form-control" placeholder="L.E / DNI, CARNET EXT, RUC, PASAPORTE U OTROS" required autofocus >
                                        <input type="text" hidden="" name='nueva_visita_idVisitante' id="nueva_visita_idVisitante">
                                        <br>
                                    </td>
                                </tr>
                                <div id="resultado"></div>
                                <tr>
                                    <td class="td-form">
                                        <label>	Nombres:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_nombreVisitante' id="nueva_visita_nombreVisitante" class="form-control" placeholder="Nombre" required autofocus disabled="">
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Apell. Paterno:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_apellidoPaternoVisitante' id="nueva_visita_apellidoPaternoVisitante" class="form-control" placeholder="Apellido Paterno del Visitante" required autofocus disabled="">
                                        </br>
                                    </td>
                                </tr>     
                                <tr>
                                    <td class="td-form">
                                        <label>	Apell. Materno:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_apellidoMaternoVisitante' id="nueva_visita_apellidoMaternoVisitante" class="form-control" placeholder="Apellido Materno del Visitante" required autofocus disabled="">
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
                                        <label>	Funcionario:</label>
                                    </td>
                                    <td>
                                        <div class="col-md-13">
                                            <?php if ($query_funcionarios->num_rows > 0): ?>
                                                <select class="selectpicker form-control" name='nueva_visita_idFuncionario' id="nueva_visita_idFuncionario" data-live-search="true" title="Seleccione al funcionario para la visita" required autofocus>
                                                    <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                                        <option value=" <?php echo $rr["idFuncionario"]; ?> "  data-subtext="<?php echo $rr["usuario"] . ' - ' . $rr["cargo"] . ' - ' . $rr["unidadOrganica"] . ' - ' . $rr["alias"]; ?>" > <?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"]; ?> </option>
                                                    <?php endwhile; ?>
                                                </select> 
                                            <?php endif; ?>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Oficina:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_oficina' id="nueva_visita_oficina" class="form-control" placeholder="Oficina" required autofocus disabled="">
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Cargo:</label>
                                    </td>
                                    <td>
                                        <input type="text" name='nueva_visita_cargo' id="nueva_visita_cargo" class="form-control" placeholder="Cargo" required autofocus disabled="">
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
                                        <input type="text" name='nueva_visita_lugar' id="nueva_visita_lugar" class="form-control" placeholder="Lugar o referencia de la visita" required autofocus>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-form">
                                        <label>	Motivo Visita:</label>
                                    </td>
                                    <td>
                                        <textarea rows="4" cols="50" style="max-width: 480px;max-height: 150px;" name='nueva_visita_motivo' id="nueva_visita_motivo" class="form-control" placeholder="Describa de manera breve y resumida el motivo de la visita" required autofocus></textarea>
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
                $rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
                if ($rol == '') {
                    $url = "./#/ver_visitas";
                } else {
                    $url = "./#/administrador";
                }
                echo '<a class="btn btn -lg btn-danger"  id="btnVerVisita" href=' . $url . '>Mostrar Visitas</a>';
                ?>  
                <br> <br>
            </div> <!-- /container -->       
        </div>
    </body>
</html>
