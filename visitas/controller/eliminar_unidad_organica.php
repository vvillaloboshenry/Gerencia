<?php

include "conexion.php";
if (!empty($_POST)) {
    $sql = "UPDATE unidad_organica SET estado=0 WHERE idUnidad=" . $_POST["m_eliminar_unidad_organica_id"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar.\");</script>";
    }
}
?>