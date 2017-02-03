<?php

include "conexion.php";
// FALTAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
$jsondata['success'] = false;
$jsondata['message'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_actualizar_unidad_organica_id"]) && isset($_POST["m_codigoUnidad"]) && isset($_POST["m_unidadOrganica"]) && isset($_POST["m_aliasUnidad"]) && isset($_POST["m_jerarquiaOrganica"]) && isset($_POST["m_idUsers"])) {
            if ($_POST["m_actualizar_unidad_organica_id"] != "" && $_POST["m_codigoUnidad"] != "" && $_POST["m_unidadOrganica"] != "" && $_POST["m_aliasUnidad"] != "" && $_POST["m_jerarquiaOrganica"] != "" && $_POST["m_idUsers"] != "") {
                $sql = "UPDATE unidad_organica set codigo='" . $_POST["m_codigoUnidad"] . "', nombre='" . $_POST["m_unidadOrganica"] . "', alias='" . $_POST["m_aliasUnidad"] . "', jerarquiaOrganica='" . $_POST["m_jerarquiaOrganica"] . "', idUsers='" . $_POST["m_idUsers"] . "' WHERE idUnidad=" . $_POST["m_actualizar_unidad_organica_id"];
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['success'] = true;
                    $jsondata['message'] = 'Se actualizaron los datos del rol correctamente.';
                } else {
                    $jsondata['success'] = false;
                    $jsondata['message'] = 'No se pudo actualizar los datos del rol.';
                }
            } else {
                $jsondata['success'] = false;
                $jsondata['message'] = 'No se admiten valores vacios o inconsistentes.';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>