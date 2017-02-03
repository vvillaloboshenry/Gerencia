<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["nombreFuncionario"]) && isset($_POST["apellidoPFuncionario"]) && isset($_POST["apellidoMFuncionario"]) && isset($_POST["cargoFuncionario"]) && isset($_POST["dniFuncionario"]) && isset($_POST["dniFuncionario"]) && isset($_POST["dniFuncionario"]) && isset($_POST["email"])) {
            if (trim($_POST["nombreFuncionario"]) != "" && trim($_POST["apellidoPFuncionario"]) != "" && trim($_POST["apellidoMFuncionario"]) != "" && trim($_POST["cargoFuncionario"]) != "" && trim($_POST["dniFuncionario"]) != "" && trim($_POST["dniFuncionario"]) != "" && trim($_POST["dniFuncionario"]) != "" && trim($_POST["email"]) != "") {
                if (isset($_POST["idUnidadOrganica"]) && trim($_POST["idUnidadOrganica"]) != "") {
                    $sql = "INSERT INTO Funcionario(nombre,apellidoPaterno,apellidoMaterno,cargo,idUnidadOrganica,dniFuncionario,usuario,clave,email) VALUES ('" . $_POST["nombreFuncionario"] . "','" . $_POST["apellidoPFuncionario"] . "','" . $_POST["apellidoMFuncionario"] . "','" . $_POST["cargoFuncionario"] . "','" . $_POST["idUnidadOrganica"] . "','" . $_POST["dniFuncionario"] . "','" . $_POST["dniFuncionario"] . "','" . md5($_POST["dniFuncionario"]) . "','" . $_POST["email"] . "');";
                } else {
                    $sql = "INSERT INTO Funcionario(nombre,apellidoPaterno,apellidoMaterno,cargo,idUnidadOrganica,dniFuncionario,usuario,clave,email) VALUES ('" . $_POST["nombreFuncionario"] . "','" . $_POST["apellidoPFuncionario"] . "','" . $_POST["apellidoMFuncionario"] . "','" . $_POST["cargoFuncionario"] . "','0','" . $_POST["dniFuncionario"] . "','" . $_POST["dniFuncionario"] . "','" . md5($_POST["dniFuncionario"]) . "','" . $_POST["email"] . "');";
                }
                $query = $con->query($sql);
                if ($query != null) {
                    $jsondata['titulo'] = 'Completado';
                    $jsondata['mensaje'] = 'Nuevo Funcionario agregado correctamente.';
                    $jsondata['tipo'] = 'success';
                } else {
                    $jsondata['titulo'] = 'Error';
                    $jsondata['mensaje'] = 'No se pudo agregar al funcionario, tal vez ya exista una persona con el mismo dni.';
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
