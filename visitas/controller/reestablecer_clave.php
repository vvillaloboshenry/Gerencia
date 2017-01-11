<?php

include "conexion.php";
if (!empty($_POST)) {
    $sql = "UPDATE users SET passUsers='" . $_POST["m_reestablecer_clave_loginUsers"] . "' where idUsers=" . $_POST["m_reestablecer_clave_idUsers"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Clave reestablecida exitosamente.\");</script>";
    } else {
        print "<script>alert(\"No se realizar esta accion.\");</script>";
    }
}
?>