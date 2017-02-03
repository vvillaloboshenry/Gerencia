<?php

//// solo se podra modificar si el estado no es finalizado,
// si es finaliazdo tb se borrar el boton de actualizar
include "conexion.php";
$jsondata = array();
$jsondata['titulo'] = 'Aviso';
$jsondata['mensaje'] = 'Hubo un problema al momento de enviar los datos, porfavor vuelva a recargar la pagina.';
$jsondata['tipo'] = 'warning';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST["m_ver_visita_estadoVisita"]) && $_POST["m_ver_visita_estadoVisita"] != "") {
            if ($_POST["m_ver_visita_estadoVisita"] == "Pendiente") {
                if (isset($_POST["m_ver_visita_idVisitaVisitanteFuncionario"]) && isset($_POST["m_ver_visita_idVisita"]) && isset($_POST["m_ver_visita_idVisitante"]) && isset($_POST["m_ver_visita_nombreVisitante"]) && isset($_POST["m_ver_visita_apellidoPVisitante"]) && isset($_POST["m_ver_visita_apellidoMVisitante"]) && isset($_POST["m_ver_visita_dniVisitante"]) && isset($_POST["m_ver_visita_idFuncionario"]) && isset($_POST["m_ver_visita_lugar"]) && isset($_POST["m_ver_visita_motivo"])) {
                    if ($_POST["m_ver_visita_idVisitaVisitanteFuncionario"] != "" && $_POST["m_ver_visita_idVisita"] != "" && $_POST["m_ver_visita_idVisitante"] != "" && $_POST["m_ver_visita_nombreVisitante"] != "" && $_POST["m_ver_visita_apellidoPVisitante"] != "" && $_POST["m_ver_visita_apellidoMVisitante"] != "" && $_POST["m_ver_visita_dniVisitante"] != "" && $_POST["m_ver_visita_idFuncionario"] != "" && $_POST["m_ver_visita_lugar"] != "" && $_POST["m_ver_visita_motivo"] != "") {
                        $sqlVisitante = "UPDATE Visitante SET nombre='" . $_POST["m_ver_visita_nombreVisitante"] . "',apellidoPaterno='" . $_POST["m_ver_visita_apellidoPVisitante"] . "',apellidoMaterno='" . $_POST["m_ver_visita_apellidoMVisitante"] . "',dniVisitante=" . $_POST["m_ver_visita_dniVisitante"] . " WHERE idVisitante=" . $_POST["m_ver_visita_idVisitante"];
                        $queryVisitante = $con->query($sqlVisitante);
                        if ($queryVisitante != null) {
                            $sqlDetalleVisitaVisitanteFuncionario = "UPDATE dt_visitas_visitante_funcionario SET idFuncionario=" . $_POST["m_ver_visita_idFuncionario"] . " WHERE idVisitaVisitanteFuncionario=" . $_POST["m_ver_visita_idVisitaVisitanteFuncionario"];
                            $queryDetalleVisitaVisitanteFuncionario = $con->query($sqlDetalleVisitaVisitanteFuncionario);
                            if ($queryDetalleVisitaVisitanteFuncionario != null) {
                                if ($_POST["m_ver_visita_fechaTermino"] != null && $_POST["m_ver_visita_horaTermino"] != null) {
                                    $sqlVisita = "UPDATE Visita SET fechaTermino='" . $_POST["m_ver_visita_fechaTermino"] . ' ' . $_POST["m_ver_visita_horaTermino"] . "',motivo='" . $_POST["m_ver_visita_motivo"] . "', lugar='" . $_POST["m_ver_visita_lugar"] . "' WHERE idVisita=" . $_POST["m_ver_visita_idVisita"];
                                } else {
                                    $sqlVisita = "UPDATE Visita SET fechaTermino=NULL,motivo='" . $_POST["m_ver_visita_motivo"] . "', lugar='" . $_POST["m_ver_visita_lugar"] . "' WHERE idVisita=" . $_POST["m_ver_visita_idVisita"];
                                }
                                $queryVisita = $con->query($sqlVisita);
                                if ($queryVisita != null) {
                                    $jsondata['titulo'] = 'Completado';
                                    $jsondata['mensaje'] = 'Se actualizo la Visita correctamente.';
                                    $jsondata['tipo'] = 'success';
                                } else {
                                    $jsondata['titulo'] = 'Error';
                                    $jsondata['mensaje'] = 'No se pudo actualizar la Visita.';
                                    $jsondata['tipo'] = 'error';
                                }
                            } else {
                                $jsondata['titulo'] = 'Error';
                                $jsondata['mensaje'] = 'No se pudo derivar esta visita hacia otra Unidad Organica, porfavor verifique sus datos y vuelva a recargar la pagina.';
                                $jsondata['tipo'] = 'error';
                            }
                        } else {
                            $jsondata['titulo'] = 'Error';
                            $jsondata['mensaje'] = 'No se pudo actualizar los datos del visitante, tal vez ya exista una persona con el mismo dni.';
                            $jsondata['tipo'] = 'error';
                        }
                    } else {
                        $jsondata['titulo'] = "Informacion";
                        $jsondata['mensaje'] = 'No se admiten valores vacios o inconsistentes.';
                        $jsondata['tipo'] = 'info';
                    }
                }
            } else {
                $jsondata['titulo'] = 'Informacion';
                $jsondata['mensaje'] = 'Actualmente esta visita se encuentra en estado Finalizado por lo cual ya no se podra hacer ningun cambio.';
                $jsondata['tipo'] = 'info';
            }
        }
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>
