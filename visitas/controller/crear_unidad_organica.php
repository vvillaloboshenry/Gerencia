<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["codigoUnidad"]) && isset($_POST["nombreUnidad"]) && isset($_POST["alias"]) && isset($_POST["jerarquiaOrganica"])) {
            if (trim($_POST["codigoUnidad"]) != "" && trim($_POST["nombreUnidad"]) != "" && trim($_POST["alias"]) != "" && trim($_POST["jerarquiaOrganica"]) != "") {
                if (isset($_POST["idFuncionario"]) && trim($_POST["idFuncionario"]) != "") {
                    $sql = "INSERT INTO unidad_organica(codigo, nombre, alias, jerarquiaOrganica, idFuncionario) VALUES ('" . $_POST["codigoUnidad"] . "','" . $_POST["nombreUnidad"] . "','" . $_POST["alias"] . "','" . $_POST["jerarquiaOrganica"] . "','" . $_POST["idFuncionario"] . "');";
                } else {
                    $sql = "INSERT INTO unidad_organica(codigo, nombre, alias, jerarquiaOrganica, idFuncionario) VALUES ('" . $_POST["codigoUnidad"] . "','" . $_POST["nombreUnidad"] . "','" . $_POST["alias"] . "','" . $_POST["jerarquiaOrganica"] . "','0');";
                }
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Unidad Organica se a registrado exitosamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo añadir la Unidad Organica. Posiblemente ya exista una unidad Organica con los mismos datos.';
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