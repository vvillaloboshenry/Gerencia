<?php

include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["permisos"]) && isset($_POST["rol"]) && isset($_POST["descripcion"])) {
            if (count($_POST["permisos"]) >= 0 && trim($_POST["rol"]) != "" && trim($_POST["descripcion"]) != "") {
                $sql = "INSERT INTO Rol (rol, descripcion) VALUES ('" . $_POST["rol"] . "','" . $_POST["descripcion"] . "')";
                $query = $con->query($sql);
                $idRol = $con->insert_id;
                if ($query != null) {
                    $idPermisos = $_POST["permisos"];
                    $count = count($idPermisos);
                    for ($i = 0; $i < $count; $i++) {
                        $sqlPermisos = "INSERT INTO dt_permiso_rol (idRol, idPermiso) VALUES (" . $idRol . ",'" . $idPermisos[$i] . "');";
                        $queryPermisos = $con->query($sqlPermisos);
                    }
                    if ($queryPermisos != null) {
                        $jsondata['titulo'] = "Completado";
                        $jsondata['mensaje'] = 'Se asigno correctamente los permisos al rol.';
                        $jsondata['tipo'] = 'success';
                    } else {
                        $jsondata['titulo'] = "Error";
                        $jsondata['mensaje'] = 'No se pudo asignar los permisos al rol de manera correcta.';
                        $jsondata['tipo'] = 'error';
                    }
                } else {
                    $jsondata['titulo'] = "Error";
                    $jsondata['mensaje'] = 'No se pudo crear el rol y mucho menos asignar permisos.';
                    $jsondata['tipo'] = 'error';
                }
            } else {
                $jsondata['titulo'] = "Informacion";
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
