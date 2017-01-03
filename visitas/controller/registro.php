<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

include "conexion.php";
if (!empty($_POST)) {
    if (isset($_POST["inputNameVisitante"]) && isset($_POST["inputSurnameVisitante"]) && isset($_POST["inputDniVisitante"]) && isset($_POST["inputNameFuncionario"]) && isset($_POST["inputSurnameFuncionario"]) && isset($_POST["inputOficina"]) && isset($_POST["inputCargo"]) && isset($_POST["inputLugar"]) && isset($_POST["inputMotivo"])) {
        if ($_POST["inputNameVisitante"] != "" && $_POST["inputSurnameVisitante"] != "" && $_POST["inputDniVisitante"] != "" && $_POST["inputNameFuncionario"] != "" && $_POST["inputSurnameFuncionario"] != "" && $_POST["inputOficina"] != "" && $_POST["inputCargo"] != "" && $_POST["inputLugar"] != "" && $_POST["inputMotivo"] != "") {
            $sql = "insert into visita(nombreVisitante,apellidoVisitante,dniVisitante,nombreFuncionario,apellidoFuncionario,oficinaFuncionario,cargoFuncionario,motivo,lugar) values ('" . $_POST["inputNameVisitante"] . "','" . $_POST["inputSurnameVisitante"] . "'," . $_POST["inputDniVisitante"] . ",'" . $_POST["inputNameFuncionario"] . "','" . $_POST["inputSurnameFuncionario"] . "','" . $_POST["inputOficina"] . "','" . $_POST["inputCargo"] . "','" . $_POST["inputMotivo"] . "','" . $_POST["inputLugar"] . "')";
            $query = $con->query($sql);
            if ($query != null) {
                print "<script>alert(\"Visita creada exitosamente.\");</script>";
            } else {
                print "<script>alert(\"No se pudo crear la visita.\");</script>";
            }
        }
    }
}
?>