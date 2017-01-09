<?php

include "conexion.php";

if (!empty($_POST)) {
    if (isset($_POST["m_actualizar_unidad_organica_id"]) && isset($_POST["m_codigoUnidad"]) && isset($_POST["m_unidadOrganica"]) && isset($_POST["m_aliasUnidad"]) && isset($_POST["m_jerarquiaOrganica"]) && isset($_POST["m_idUsers"])) {
        if ($_POST["m_actualizar_unidad_organica_id"] != "" && $_POST["m_codigoUnidad"] != "" && $_POST["m_unidadOrganica"] != "" && $_POST["m_aliasUnidad"] != "" && $_POST["m_jerarquiaOrganica"] != "" && $_POST["m_idUsers"] != "") {
            $sql = "UPDATE unidad_organica set codigo='" . $_POST["m_codigoUnidad"] . "', nombre='" . $_POST["m_unidadOrganica"] . "', alias='" . $_POST["m_aliasUnidad"] . "', jerarquiaOrganica='" . $_POST["m_jerarquiaOrganica"] . "', idUsers='" . $_POST["m_idUsers"] . "' WHERE idUnidad=" . $_POST["m_actualizar_unidad_organica_id"];
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