<?php

$buscar = $_POST['nueva_visita_idFuncionario'];

if (!empty($buscar)) {
    //&& strlen($buscar) == 8 || strlen($buscar) == 12
    buscar($buscar);
}

function buscar($b) {
    include "conexion.php";
    $sql = "SELECT f.idFuncionario, f.nombre, f.apellidoPaterno, f.apellidoMaterno, f.cargo, f.idUnidadOrganica, f.usuario,f.dniFuncionario, f.email, r.rol,uo.nombre as unidadOrganica,uo.alias FROM Funcionario f LEFT join Rol r ON f.idRol=r.idRol LEFT JOIN unidad_organica uo ON f.idUnidadOrganica=uo.idUnidad WHERE f.idFuncionario='" . $b . "' ORDER BY f.idFuncionario ASC;";
    $query = $con->query($sql);
    $contar = count($query);

    if ($contar == 0) {
        echo "No se han encontrado resultados para '<b>" . $b . "</b>'.";
    } else {
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['idUsers'];
            $cargoFuncionario = $row['cargo'];
            $unidadOrganica = $row['unidadOrganica'];
            $alias = $row['alias'];
            echo $id . "," . $cargoFuncionario . ',' . $unidadOrganica . ' - ' . $alias . ',';
        }
    }
}

?>
