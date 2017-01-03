<?php

//$sql1 = "select * from visita where year(fecha)<= year('" . $_POST["fechaBusqueda"] . "') and dropState =1";
$sql2 = "select * from visita where dropState=1";
$query = $con->query($sql2);
?> 
