<?php

include "conexion.php";
if (!empty($_POST)) {
    $sql = "DELETE FROM users WHERE idUsers=" . $_POST["m_eliminar_funcionario_idFuncionario"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar.\");</script>";
    }
}
?>