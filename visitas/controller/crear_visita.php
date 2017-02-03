<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["nueva_visita_idFuncionario"]) && isset($_POST["nueva_visita_lugar"]) && isset($_POST["nueva_visita_motivo"])) {
            if (trim($_POST["nueva_visita_idFuncionario"]) != "" && trim($_POST["nueva_visita_lugar"]) != "" && trim($_POST["nueva_visita_motivo"]) != "") {
                // se comprueba la existencia del visitante, si no existe se crea uno
                if (trim($_POST["nueva_visita_idVisitante"]) == "") {
                    if (isset($_POST["nueva_visita_dniVisitante"]) && isset($_POST["nueva_visita_nombreVisitante"]) && isset($_POST["nueva_visita_apellidoPaternoVisitante"]) && isset($_POST["nueva_visita_apellidoMaternoVisitante"])) {
                        if (trim($_POST["nueva_visita_dniVisitante"]) != "" && trim($_POST["nueva_visita_nombreVisitante"]) != "" && trim($_POST["nueva_visita_apellidoPaternoVisitante"]) != "" && trim($_POST["nueva_visita_apellidoMaternoVisitante"]) != "") {
                            $sqlVisitante = "INSERT INTO visitante(nombre, apellidoPaterno, apellidoMaterno, dniVisitante) VALUES ('" . $_POST["nueva_visita_nombreVisitante"] . "','" . $_POST["nueva_visita_apellidoPaternoVisitante"] . "','" . $_POST["nueva_visita_apellidoMaternoVisitante"] . "','" . $_POST["nueva_visita_dniVisitante"] . "')";
                            $queryVisitante = $con->query($sqlVisitante);
                            $idVisitante = $con->insert_id;
                            $_POST["nueva_visita_idVisitante"] = $idVisitante;
                        }
                    }
                } // una vez validado el usuario se crea la visita
                // begin visita
                $sqlVisita = "INSERT INTO visita(lugar,motivo) VALUES ('" . $_POST["nueva_visita_lugar"] . "','" . $_POST["nueva_visita_motivo"] . "')";
                $queryVisita = $con->query($sqlVisita);
                $idVisita = $con->insert_id;
                // end visita
                if ($queryVisita != null) {
                    //se crea el detalle
                    $sqlDetalleVisitasVisitanteUser = "INSERT INTO dt_visitas_visitante_funcionario(idVisita, idVisitante, idFuncionario) VALUES ('" . $idVisita . "','" . $_POST["nueva_visita_idVisitante"] . "','" . $_POST["nueva_visita_idFuncionario"] . "')";
                    $queryDetalleVisitasVisitanteUser = $con->query($sqlDetalleVisitasVisitanteUser);
                    if ($queryDetalleVisitasVisitanteUser != null) {
                        $jsondata['titulo'] = 'Completado';
                        $jsondata['mensaje'] = 'Se creo la visita de manera correcta.';
                        $jsondata['tipo'] = 'success';
                    } else {
                       $jsondata['titulo'] = 'Error';
                        $jsondata['message'] = 'No se pudo crear la visita correctamente, porfavor verifique sus datos de entrada o actualice la pagina.';
                        $jsondata['tipo'] = 'error';
                    }
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo crear la Visita.';
                    $jsondata['tipo'] = 'error';
                }
            } else {
                $jsondata['titulo'] = 'Informacion';
                $jsondata['mensaje'] = 'No se admiten valores vacios o inconsistentes.';
                $jsondata['tipo'] = 'info';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>