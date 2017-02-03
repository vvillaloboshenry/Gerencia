<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al tratar de reestablecer la clave a la por defecto, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_reestablecer_clave_usuario"])) {
            if (trim($_POST["m_reestablecer_clave_usuario"]) != "") {
                $sql = "UPDATE Funcionario SET clave='" . md5(mysql_real_escape_string($_POST["m_reestablecer_clave_usuario"])) . "' where idFuncionario=" . $_POST["m_reestablecer_clave_idFuncionario"];
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Clave reestablecida exitosamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo reestablecer la clave, tal vez el funcionario no exista o aya sido eliminado; porfavor vuelva a recargar la pagina.';
                    $jsondata['tipo'] = 'error';
                }
            } else {
                $jsondata['titulo'] = 'Informacion';
                $jsondata['mensaje'] = 'No se reestablecio la clave correctamentem porfavor vuelva a recargar la pagina.';
                $jsondata['tipo'] = 'info';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>