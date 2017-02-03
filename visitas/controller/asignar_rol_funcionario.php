<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["idRol"]) && isset($_POST["idFuncionario"])) {
            if ($_POST["idRol"] == "" && $_POST["idFuncionario"] != "") {
                $sql = "UPDATE Funcionario SET idRol=NULL WHERE idFuncionario=" . $_POST["idFuncionario"];
            } else {
                if ($_POST["idRol"] != "" && $_POST["idFuncionario"] != "") {
                    $sql = "UPDATE Funcionario SET idRol=" . $_POST["idRol"] . " WHERE idFuncionario=" . $_POST["idFuncionario"];
                }
            }
            $query = $con->query($sql);
            if ($query != null) {
                $jsondata['titulo'] = 'Completado';
                $jsondata['mensaje'] = 'Rol asignado correctamente.';
                $jsondata['tipo'] = 'success';
            } else {
                $jsondata['titulo'] = 'Error';
                $jsondata['mensaje'] = 'No se pudo asignar el Rol al Usuario';
                $jsondata['tipo'] = 'error';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>
