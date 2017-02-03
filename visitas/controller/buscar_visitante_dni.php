<?php

$buscar = $_POST['nueva_visita_dniVisitante'];

if (!empty($buscar) && strlen($buscar) == 8 || strlen($buscar) == 12) {
    buscar($buscar);
}

function buscar($b) {
    include "conexion.php";
    $sql = "SELECT * FROM visitante WHERE dniVisitante LIKE '%" . $b . "%'";
    $query = $con->query($sql);
    $contar = count($query);

    if ($contar == 0) {
        echo "No se han encontrado resultados para '<b>" . $b . "</b>'.";
    } else {
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['idVisitante'];
            $nombre = $row['nombre'];
            $apellidoPaterno = $row['apellidoPaterno'];
            $apellidoMaterno = $row['apellidoMaterno'];
            echo $id . "," . $nombre . ',' . $apellidoPaterno . "," . $apellidoMaterno;
        }
    }
}
?>

