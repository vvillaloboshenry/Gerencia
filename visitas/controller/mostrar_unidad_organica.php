<?php

$sql2 = "SELECT uo.idUnidad, uo.codigo, uo.nombre as nombreUnidadOrganica, uo.alias, uo.jerarquiaOrganica, uo.idUsers,u.nombre as nombreFuncionario,u.apellidoPaterno,u.apellidoMaterno FROM unidad_organica uo LEFT JOIN users u ON uo.idUsers=u.idUsers where uo.idUnidad>0";

$query_unidad_organica = $con->query($sql2);
?> 
