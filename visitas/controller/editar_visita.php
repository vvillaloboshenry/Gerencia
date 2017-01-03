<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

include "conexion.php";
if (!empty($_POST)) {
    if (isset($_POST["m_idVisita"]) && isset($_POST["m_nombreVisitante"]) && isset($_POST["m_dniVisitante"]) && isset($_POST["m_nombreFuncionario"]) && isset($_POST["m_oficinaFuncionario"]) && isset($_POST["m_cargoFuncionario"]) && isset($_POST["m_motivo"]) && isset($_POST["m_lugar"])) {
        if ($_POST["m_idVisita"] != "" && $_POST["m_nombreVisitante"] != "" && $_POST["m_dniVisitante"] != "" && $_POST["m_nombreFuncionario"] != "" && $_POST["m_oficinaFuncionario"] != "" && $_POST["m_cargoFuncionario"] != "" && $_POST["m_motivo"] != "" && $_POST["m_lugar"] != "") {
            $sql = "UPDATE visita set nombreVisitante='" . $_POST["m_nombreVisitante"] . "', dniVisitante='" . $_POST["m_dniVisitante"] . "', nombreFuncionario='" . $_POST["m_nombreFuncionario"] . "', oficinaFuncionario='" . $_POST["m_oficinaFuncionario"] . "', cargoFuncionario='" . $_POST["m_cargoFuncionario"] . "', motivo='" . $_POST["m_motivo"] . "', lugar='" . $_POST["m_lugar"] . "' WHERE idVisita=" . $_POST["m_idVisita"];
            $query = $con->query($sql);
            if ($query != null) {
                print "<script>alert(\"Actualizado exitosamente.\");</script>";
            } else {
                print "<script>alert(\"No se pudo actualizar exitosamente.\");</script>";
            }
        }
    }
}
?>