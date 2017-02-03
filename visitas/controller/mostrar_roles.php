<?php

$sql2 = "SELECT r.idRol,r.rol,COUNT(DISTINCT(dpp.idPermiso)) AS numPermisos,COUNT(DISTINCT(f.idFuncionario)) AS numFuncionarios FROM Rol r INNER JOIN dt_permiso_rol dpp ON r.idRol=dpp.idRol INNER JOIN permisos p ON dpp.idPermiso=p.idPermiso LEFT JOIN funcionario f ON r.idRol=f.idRol GROUP BY r.idRol ORDER BY 3 DESC,4 DESC,1 ASC";
$query_rol = $con->query($sql2);
?> 
