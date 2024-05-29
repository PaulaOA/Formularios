<?php
include "conexion-form.php";

$nombreEquipo = $_GET['nombreEquipo'];

if (isset($nombreEquipo) && !empty($nombreEquipo)) {
    $nombreEquipo = mysqli_real_escape_string($conn, $nombreEquipo);

    $sql_nombre = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '".$nombreEquipo."'";

    $id_encontrado = $conn->query($sql_nombre);

    if ($id_encontrado && $id_encontrado->num_rows > 0) {
        $fila_equipo = $id_encontrado->fetch_assoc();
        $id_equipo = $fila_equipo['id_equipo'];

        $sql_puntuaciones_guardadas = "SELECT id_item, puntuacion FROM puntuaciones_temporales WHERE id_equipo = $id_equipo";

        $puntuaciones_equipo = $conn->query($sql_puntuaciones_guardadas);

        if ($puntuaciones_equipo->num_rows > 0) {

            while ($row = $puntuaciones_equipo->fetch_assoc()) {
                echo $row['id_item'] . ':' . $row['puntuacion'] . ';'; 
            }
        } else {
            echo "noEncontradas";
        }
    } else {
        echo "sinDefinitivas";
    }
} else {
    echo "noEquipos";
}

