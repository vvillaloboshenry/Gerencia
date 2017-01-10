<?php

include "conexion.php";
if (!empty($_POST)) {
    if (isset($_POST["tab_asignar_rol_idProfile"]) && isset($_POST["tab_asignar_rol_idUsers"])) {
        if ($_POST["tab_asignar_rol_idProfile"] != "" && $_POST["tab_asignar_rol_idUsers"] != "") {
            echo $_POST["tab_asignar_rol_idProfile"],' '.$_POST["tab_asignar_rol_idUsers"];
            $sql = "UPDATE users SET idprofile=" . $_POST["tab_asignar_rol_idProfile"] . " WHERE idUsers=" . $_POST["tab_asignar_rol_idUsers"];
            echo $sql;
            $query = $con->query($sql);
            if ($query != null) {
                print "<script>alert(\"Rol asignado Correctamente.\");</script>";
            } else {
                print "<script>alert(\"No se pudo asignar el Rol.\");</script>";
            }
        }
    }
}
?>