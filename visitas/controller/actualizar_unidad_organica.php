<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_actualizar_unidad_organica_idUnidad"]) && isset($_POST["m_actualizar_unidad_organica_codigoUnidad"]) && isset($_POST["m_actualizar_unidad_organica_unidadOrganica"]) && isset($_POST["m_actualizar_unidad_organica_aliasUnidad"]) && isset($_POST["m_actualizar_unidad_organica_jerarquiaOrganica"]) && isset($_POST["m_actualizar_unidad_organica_idFuncionario"])) {
            if (trim($_POST["m_actualizar_unidad_organica_idUnidad"]) != "" && trim($_POST["m_actualizar_unidad_organica_codigoUnidad"]) != "" && trim($_POST["m_actualizar_unidad_organica_unidadOrganica"]) != "" && trim($_POST["m_actualizar_unidad_organica_aliasUnidad"]) != "" && trim($_POST["m_actualizar_unidad_organica_jerarquiaOrganica"]) != "" && trim($_POST["m_actualizar_unidad_organica_idFuncionario"]) != "") {
                $sql = "UPDATE unidad_organica set codigo='" . $_POST["m_actualizar_unidad_organica_codigoUnidad"] . "', nombre='" . $_POST["m_actualizar_unidad_organica_unidadOrganica"] . "', alias='" . $_POST["m_actualizar_unidad_organica_aliasUnidad"] . "', jerarquiaOrganica='" . $_POST["m_actualizar_unidad_organica_jerarquiaOrganica"] . "', idFuncionario='" . $_POST["m_actualizar_unidad_organica_idFuncionario"] . "' WHERE idUnidad=" . $_POST["m_actualizar_unidad_organica_idUnidad"];
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Se actualizaron los datos de la Unidad Organica correctamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo actualizar los datos de la Unidad Organica, porfavor verifique bien los datos de entrada';
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
