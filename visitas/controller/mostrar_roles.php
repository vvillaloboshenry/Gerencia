<?php

$sql2 = "SELECT idProfile,nameProfi,COUNT(*) FROM profiles p  inner join dt_permiso_perfil dpp ON p.idProfile=dpp.id_perfil GROUP BY idProfile ORDER BY 3 DESC";
$query_rol = $con->query($sql2);
?> 
