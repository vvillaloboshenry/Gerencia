<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de eliminar la Unidad Organica, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_eliminar_unidad_organica_idUnidad"])) {
            if (trim($_POST["m_eliminar_unidad_organica_idUnidad"]) != "") {
                $sql = "UPDATE unidad_organica SET dropState=0 WHERE idUnidad=" . $_POST["m_eliminar_unidad_organica_idUnidad"];
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Se elimino la Unidad Organica correctamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo eliminar la Unidad Organica, porfavor vuelva a recargar la pagina.';
                    $jsondata['tipo'] = 'error';
                }
            } else {
                $jsondata['titulo'] = 'Informacion';
                $jsondata['mensaje'] = 'Porfavor vuelva a recargar la pagina.';
                $jsondata['tipo'] = 'info';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>
