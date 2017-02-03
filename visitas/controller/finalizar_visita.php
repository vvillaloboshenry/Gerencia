<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al tratar de finalizar la visita, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["idVisita"])) {
            if (trim($_POST["idVisita"]) != "") {
                if ($_POST["fechaTermino"] != "") {
                    $sqlVisita = "UPDATE visita SET estadoVisita='Finalizado' WHERE idVisita=" . $_POST["idVisita"] . " ;";
                } else {
                    $sqlVisita = "UPDATE visita SET fechaTermino=NOW(), estadoVisita='Finalizado' WHERE idVisita=" . $_POST["idVisita"] . " ;";
                }
                $queryVisita = $con->query($sqlVisita);
                if ($queryVisita != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Se dio por finalizada la Visita.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo dar por finalizada la Visita.';
                    $jsondata['tipo'] = 'error';
                }
            } else {
                $jsondata['titulo'] = 'Informacion';
                $jsondata['mensaje'] = 'No se admiten valores vacios o inconsistentes; porfavor vuelva a recargar la pagina.';
                $jsondata['tipo'] = 'info';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>