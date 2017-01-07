<?php

$sql2 = "SELECT idUnidad, codigo, nombre, alias, jerarquiaOrganica, idUsers FROM unidad_organica where idUnidad>0";

$query_unidad_organica = $con->query($sql2);
?> 
