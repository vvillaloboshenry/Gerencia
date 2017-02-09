<?php

$sql2 = "SELECT  dt.idVisitaVisitanteFuncionario,v.idVisita,vt.idVisitante,vt.nombre as nombreVisitante,vt.apellidoPaterno as apellidoPVisitante,vt.apellidoMaterno as apellidoMVisitante,vt.dniVisitante as dniVisitante,f.idFuncionario ,f.nombre as nombreFuncionario, f.apellidoPaterno as apellidoPFuncionario, f.apellidoMaterno as apellidoMFuncionario,f.idUnidadOrganica,uo.nombre as oficinaFuncionario,uo.alias, f.cargo as cargoFuncionario,v.fecha, v.fechaTermino, v.motivo,v.lugar,v.estadoVisita,v.dropState FROM dt_visitas_visitante_funcionario dt INNER JOIN visita v ON dt.idVisita=v.idVisita INNER JOIN visitante vt ON vt.idVisitante=dt.idVisitante INNER JOIN Funcionario f ON f.idFuncionario=dt.idFuncionario INNER JOIN unidad_organica uo ON f.idUnidadOrganica=uo.idUnidad where v.dropState=1;";
$query = $con->query($sql2);
?> 
