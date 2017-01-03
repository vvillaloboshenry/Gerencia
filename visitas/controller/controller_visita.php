<?php

include "conexion.php";

function editar_visita() {
    if (!empty($_POST)) {
        if (isset($_POST["m_idVisita"]) && isset($_POST["m_nombreVisitante"]) && isset($_POST["m_dniVisitante"]) && isset($_POST["m_nombreFuncionario"]) && isset($_POST["m_oficinaFuncionario"]) && isset($_POST["m_cargoFuncionario"]) && isset($_POST["m_motivo"]) && isset($_POST["m_lugar"])) {
            if ($_POST["m_idVisita"] != "" && $_POST["m_nombreVisitante"] != "" && $_POST["m_dniVisitante"] != "" && $_POST["m_nombreFuncionario"] != "" && $_POST["m_oficinaFuncionario"] != "" && $_POST["m_cargoFuncionario"] != "" && $_POST["m_motivo"] != "" && $_POST["m_lugar"] != "") {
                $sql = "UPDATE visita set nombreVisitante='" . $_POST["m_nombreVisitante"] . "', dniVisitante='" . $_POST["m_dniVisitante"] . "', nombreFuncionario='" . $_POST["m_nombreFuncionario"] . "', oficinaFuncionario='" . $_POST["m_oficinaFuncionario"] . "', cargoFuncionario='" . $_POST["m_cargoFuncionario"] . "', motivo='" . $_POST["m_motivo"] . "', lugar='" . $_POST["m_lugar"] . "' WHERE idVisita=" . $_POST["m_idVisita"];
                $query = $con->query($sql);
                if ($query != null) {
                    print "<script>alert(\"Actualizado exitosamente.\");window.location='../#/ver_visitas'; </script>";
                }
            }
        }
    }
}

function eliminar_visita() {
    if (!empty($_GET)) {
        $sql = "UPDATE visita set dropState=0 WHERE idVisita=" . $_GET["idVisita"];
        $query = $con->query($sql);
        if ($query != null) {
            print "<script>alert(\"Eliminado exitosamente.\");window.location='../#/ver_visitas';</script>";
        } else {
            print "<script>alert(\"No se pudo eliminar.\");window.location='/#/ver_visitas';</script>";
        }
    }
}

function mostrar_visitas() {
    $sql2 = "select * from visita where dropState=1";
    $query = $con->query($sql2);
}

function crear_visitas() {
    if (!empty($_POST)) {
        if (isset($_POST["inputNameVisitante"]) && isset($_POST["inputSurnameVisitante"]) && isset($_POST["inputDniVisitante"]) && isset($_POST["inputNameFuncionario"]) && isset($_POST["inputSurnameFuncionario"]) && isset($_POST["inputOficina"]) && isset($_POST["inputCargo"]) && isset($_POST["inputLugar"]) && isset($_POST["inputMotivo"])) {
            if ($_POST["inputNameVisitante"] != "" && $_POST["inputSurnameVisitante"] != "" && $_POST["inputDniVisitante"] != "" && $_POST["inputNameFuncionario"] != "" && $_POST["inputSurnameFuncionario"] != "" && $_POST["inputOficina"] != "" && $_POST["inputCargo"] != "" && $_POST["inputLugar"] != "" && $_POST["inputMotivo"] != "") {
                $sql = "insert into visita(nombreVisitante,apellidoVisitante,dniVisitante,nombreFuncionario,apellidoFuncionario,oficinaFuncionario,cargoFuncionario,motivo,lugar) values ('" . $_POST["inputNameVisitante"] . "','" . $_POST["inputSurnameVisitante"] . "'," . $_POST["inputDniVisitante"] . ",'" . $_POST["inputNameFuncionario"] . "','" . $_POST["inputSurnameFuncionario"] . "','" . $_POST["inputOficina"] . "','" . $_POST["inputCargo"] . "','" . $_POST["inputMotivo"] . "','" . $_POST["inputLugar"] . "')";
                $query = $con->query($sql);
                if ($query != null) {
                    print "<script>alert(\"Visita creada exitosamente.\");window.location='../#/ver_visitas';</script>";
                } else {
                    print "<script>alert(\"No se pudo crear la visita.\");window.location='../#/nueva_visita';</script>";
                }
            }
        }
    }
}

?>