<?php

$sql2 = "SELECT u.idUsers, u.nombre, u.apellidoPaterno, u.apellidoMaterno, u.cargo, u.idUnidadOrganica, u.loginUsers,u.dni, u.emailUser, p.nameProfi,uo.nombre as unidadOrganica,uo.alias FROM users u LEFT join profiles p ON u.idprofile=p.idProfile LEFT JOIN unidad_organica uo on u.idUnidadOrganica=uo.idUnidad order by u.idUsers asc;";
$query_funcionarios = $con->query($sql2);
?> 
