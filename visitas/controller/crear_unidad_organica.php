<?php

header("Content-Type: text/html;charset=utf-8");
include "conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["inputCodigo"]) && isset($_POST["inputNombre"]) && isset($_POST["inputAlias"]) && isset($_POST["inputJerarquiaOrganica"]) && isset($_POST["inputEncargado"])) {
            if ($_POST["inputCodigo"] != "" && $_POST["inputNombre"] != "" && $_POST["inputAlias"] != "" && $_POST["inputJerarquiaOrganica"] != "" && $_POST["inputEncargado"] != "") {
                $sql = "INSERT INTO unidad_organica(codigo, nombre, alias, jerarquiaOrganica, idUsers,estado) VALUES ('" . $_POST["inputCodigo"] . "','" . $_POST["inputNombre"] . "','" . $_POST["inputAlias"] . "','" . $_POST["inputJerarquiaOrganica"] . "','" . $_POST["inputEncargado"] . "',1);";
                $query = $con->query($sql);
                if ($query != null) {
                    print "<script>alert(\"Unidad Organica se a registrado exitosamente.\");</script>";
                } else {
                    print "<script>alert(\"No se pudo añadir la Unidad Organica.\");</script>";
                }
            }
        }
    }
}
?>