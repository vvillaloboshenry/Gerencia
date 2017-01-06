<?php

echo '<meta charset="UTF-8">';
include "conexion.php";
if (!empty($_POST)) {
    $sql = "insert into users(nombre,apellidoPaterno,apellidoMaterno,cargo,oficina,dni,loginUsers,passUsers,emailUser,idprofile) values ('" . $_POST["inputNombreFuncionario"] . "','" . $_POST["inputApellidoPaternoFuncionario"] . "','" . $_POST["inputApellidoMaternoFuncionario"] . "','" . $_POST["inputCargoFuncionario"] . "','" . $_POST["inputOficinaFuncionario"] . "','" . $_POST["inputDniFuncionario"] . "','" . $_POST["inputDniFuncionario"] . "','" . $_POST["inputDniFuncionario"] . "','" . $_POST["inputEmailUser"] . "','" . $_POST["inputidprofile"] . "');";
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Nuevo Funcionario añadido exitosamente.\");</script>";
    } else {
        print "<script>alert(\"No se pudo añadir al funcionario.\");</script>";
    }
}
?>