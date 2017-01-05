<?php

include "conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["permisos"]) && isset($_POST["inputNameProfi"]) && isset($_POST["inputDescripcion"])) {
            if ($_POST["permisos"] != "" && $_POST["inputNameProfi"] != "" && $_POST["inputDescripcion"] != "") {
                $sql = "INSERT INTO profiles (nameProfi, descripcion) VALUES ('" . $_POST["inputNameProfi"] . "','" . $_POST["inputDescripcion"] . "')";
                $query = $con->query($sql);
                $idPerfil = $con->insert_id;
                if ($query != null) {
                    $permisos = $_POST["permisos"];
                    $count = count($permisos);
                    for ($i = 0; $i < $count; $i++) {
                        $sqlPermisos = "INSERT INTO dt_permiso_perfil (id_perfil, id_permiso, estado) VALUES (" . $idPerfil . ",'" . $permisos[$i] . "',1);";
                        $queryPermisos = $con->query($sqlPermisos);
                    }
                    if ($queryPermisos != null) {
                        print "<script>alert(\"Se asigno correctamente los permisos al rol\");</script>";
                        header('Location: ../#/crear_roles');
                    } else {
                        print "<script>alert(\"No se pudo asignar los permisos al rol de manera correcta.\");</script>";
                    }
                } else {
                    print "<script>alert(\"No se pudo crear el rol y mucho menos asignar permisos.\");</script>";
                }
            }
        }
    }
}

    