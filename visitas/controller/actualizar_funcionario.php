<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_actualizar_funcionario_idFuncionario"]) && isset($_POST["m_actualizar_funcionario_dniFuncionario"]) && isset($_POST["m_actualizar_funcionario_nombreFuncionario"]) && isset($_POST["m_actualizar_funcionario_apellidoPFuncionario"]) && isset($_POST["m_actualizar_funcionario_apellidoMFuncionario"]) && isset($_POST["m_actualizar_funcionario_emailFuncionario"]) && isset($_POST["m_actualizar_funcionario_cargoFuncionario"]) && isset($_POST["m_actualizar_funcionario_idUnidadOrganica"])) {
            if (trim($_POST["m_actualizar_funcionario_idFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_dniFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_nombreFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_apellidoPFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_apellidoMFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_emailFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_cargoFuncionario"]) != "" && trim($_POST["m_actualizar_funcionario_idUnidadOrganica"]) != "") {
                $sql = "UPDATE Funcionario set nombre='" . $_POST["m_actualizar_funcionario_nombreFuncionario"] . "', apellidoPaterno='" . $_POST["m_actualizar_funcionario_apellidoPFuncionario"] . "', apellidoMaterno='" . $_POST["m_actualizar_funcionario_apellidoMFuncionario"] . "', cargo='" . $_POST["m_actualizar_funcionario_cargoFuncionario"] . "', dniFuncionario='" . $_POST["m_actualizar_funcionario_dniFuncionario"] . "', usuario='" . $_POST["m_actualizar_funcionario_dniFuncionario"] . "', email='" . $_POST["m_actualizar_funcionario_emailFuncionario"] . "', idUnidadOrganica='" . $_POST["m_actualizar_funcionario_idUnidadOrganica"] . "' WHERE idFuncionario=" . $_POST["m_actualizar_funcionario_idFuncionario"];
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Se actualizaron los datos del funcionario correctamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo actualizar los datos del funcionario, tal vez ya exista una persona con el mismo dni.';
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
