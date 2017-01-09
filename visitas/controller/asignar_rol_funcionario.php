<?php

include "conexion.php";
if (!empty($_POST)) {
    if (isset($_POST["m_idFuncionario"]) && isset($_POST["m_dniFuncionario"]) && isset($_POST["m_nombreFuncionario"]) && isset($_POST["m_apellidoPaternoFuncionario"]) && isset($_POST["m_apellidoMaternoFuncionario"]) && isset($_POST["m_emailFuncionario"]) && isset($_POST["m_cargoFuncionario"]) && isset($_POST["m_idUnidadOrganica"])) {
        if ($_POST["m_idFuncionario"] != "" && $_POST["m_dniFuncionario"] != "" && $_POST["m_nombreFuncionario"] != "" && $_POST["m_apellidoPaternoFuncionario"] != "" && $_POST["m_apellidoMaternoFuncionario"] != "" && $_POST["m_emailFuncionario"] != "" && $_POST["m_cargoFuncionario"] != "" && $_POST["m_idUnidadOrganica"] != "") {
            $sql = "UPDATE users set nombre='" . $_POST["m_nombreFuncionario"] . "', apellidoPaterno='" . $_POST["m_apellidoPaternoFuncionario"] . "', apellidoMaterno='" . $_POST["m_apellidoMaternoFuncionario"] . "', cargo='" . $_POST["m_cargoFuncionario"] . "', dni='" . $_POST["m_dniFuncionario"] . "', loginUsers='" . $_POST["m_dniFuncionario"] . "', emailUser='" . $_POST["m_emailFuncionario"] . "', idUnidadOrganica='" . $_POST["m_idUnidadOrganica"] . "' WHERE idUsers=" . $_POST["m_idFuncionario"];
            $query = $con->query($sql);
            if ($query != null) {
                print "<script>alert(\"Actualizado exitosamente.\");</script>";
            } else {
                print "<script>alert(\"No se pudo actualizar exitosamente.\");</script>";
            }
        }
    }
}
?>