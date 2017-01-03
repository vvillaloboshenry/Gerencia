<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

include "conexion.php";
if (!empty($_POST)) {
    echo 'alert($_POST["m_idVisitaEliminada"]);';
    $sql = "UPDATE visita set dropState=0 WHERE idVisita=" . $_POST["m_idVisitaEliminada"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar.\");</script>";
    }
}
?>