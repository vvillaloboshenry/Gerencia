<?php

$sql2 = "SELECT uo.idUnidad, uo.codigo, uo.nombre as nombreUnidadOrganica, uo.alias, uo.jerarquiaOrganica, uo.idFuncionario,f.nombre as nombreFuncionario,f.apellidoPaterno,f.apellidoMaterno FROM unidad_organica uo LEFT JOIN Funcionario f ON uo.idFuncionario=f.idFuncionario WHERE uo.idUnidad>0 and uo.dropState=1;";
$query_unidad_organica = $con->query($sql2);
?> 
