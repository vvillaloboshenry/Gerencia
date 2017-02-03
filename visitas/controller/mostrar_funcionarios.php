<?php

$sql2 = "SELECT f.idFuncionario, f.nombre, f.apellidoPaterno, f.apellidoMaterno, f.cargo, f.dniFuncionario,f.usuario, f.email, r.rol,ifnull(uo.idUnidad,0) as idUnidadOrganica,uo.nombre as unidadOrganica,uo.alias FROM (select *from unidad_organica where dropState=1) uo RIGHT JOIN Funcionario f ON f.idUnidadOrganica=uo.idUnidad LEFT JOIN Rol r ON f.idRol=r.idRol WHERE f.dropState=1 ORDER BY f.idFuncionario ASC;";
$query_funcionarios = $con->query($sql2);
?> 
