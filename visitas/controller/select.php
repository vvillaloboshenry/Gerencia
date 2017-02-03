<?php
include "conexion.php";
require'../class/sessions.php';

$objses = new Sessions();
$objses->init();
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$alias = "";
$jsondata = array();
$sqlUnidad = "SELECT uo.nombre as unidadOrganica,uo.alias FROM Funcionario f LEFT join Rol r ON f.idRol=r.idRol LEFT JOIN unidad_organica uo on f.idUnidadOrganica=uo.idUnidad WHERE f.usuario='" . $usuario . "' order by f.idFuncionario asc;";
$queryUnidad = $con->query($sqlUnidad);
while ($row = mysqli_fetch_array($queryUnidad)) {
    $alias = $row["alias"];
}
$sql2 = "SELECT dt.idVisitaVisitanteFuncionario,v.idVisita,vt.idVisitante,vt.nombre as nombreVisitante,vt.apellidoPaterno as apellidoPVisitante,vt.apellidoMaterno as apellidoMVisitante,vt.dniVisitante as dniVisitante,f.idFuncionario,f.nombre as nombreFuncionario, f.apellidoPaterno as apellidoPFuncionario, f.apellidoMaterno as apellidoMFuncionario,f.idUnidadOrganica,uo.nombre as oficinaFuncionario,uo.alias, f.cargo as cargoFuncionario,v.fecha, ifnull(v.fechaTermino,0) as fechaTermino , v.motivo,v.lugar,v.estadoVisita,v.dropState FROM dt_visitas_visitante_funcionario dt INNER JOIN visita v ON dt.idVisita=v.idVisita INNER JOIN visitante vt ON vt.idVisitante=dt.idVisitante INNER JOIN Funcionario f ON f.idFuncionario=dt.idFuncionario INNER JOIN unidad_organica uo ON f.idUnidadOrganica=uo.idUnidad where uo.alias='" . $alias . "' and v.dropState=1 and f.dropState=1 ORDER by v.estadoVisita DESC, v.idVisita ASC;";
$query = $con->query($sql2);
$rowa = array();
while ($row2 = mysqli_fetch_array($query)) {
    $rowa["idVisitaVisitanteFuncionario"] = $row2["idVisitaVisitanteFuncionario"];
    $rowa["idVisita"] = $row2["idVisita"];
    $rowa["idVisitante"] = $row2["idVisitante"];
    $rowa["nombreVisitante"] = $row2["nombreVisitante"];
    $rowa["apellidoPVisitante"] = $row2["apellidoPVisitante"];
    $rowa["apellidoMVisitante"] = $row2["apellidoMVisitante"];
    $rowa["dniVisitante"] = $row2["dniVisitante"];
    $rowa["idFuncionario"] = $row2["idFuncionario"];
    $rowa["nombreFuncionario"] = $row2["nombreFuncionario"];
    $rowa["apellidoPFuncionario"] = $row2["apellidoPFuncionario"];
    $rowa["apellidoMFuncionario"] = $row2["apellidoMFuncionario"];
    $rowa["idUnidadOrganica"] = $row2["idUnidadOrganica"];
    $rowa["oficinaFuncionario"] = $row2["oficinaFuncionario"];
    $rowa["alias"] = $row2["alias"];
    $rowa["cargoFuncionario"] = $row2["cargoFuncionario"];
    $rowa["fecha"] = $row2["fecha"];
    $rowa["fechaTermino"] = $row2["fechaTermino"];
    $rowa["motivo"] = $row2["motivo"];
    $rowa["lugar"] = $row2["lugar"];
    $rowa["estadoVisita"] = $row2["estadoVisita"];
    $rowa["dropState"] = $row2["dropState"];$jsondata[] = $rowa;
}
echo json_encode($jsondata);
?>
