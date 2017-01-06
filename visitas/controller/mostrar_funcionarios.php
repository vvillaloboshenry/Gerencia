<?php

$sql2 = "SELECT u.idUsers, u.nombre, u.apellidoPaterno, u.apellidoMaterno, u.cargo, u.oficina, u.loginUsers,  u.emailUser, p.nameProfi FROM users u inner join profiles p ON u.idprofile=p.idProfile";

$query_funcionarios = $con->query($sql2);
?> 
