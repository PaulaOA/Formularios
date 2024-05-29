<?php

if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo']) && isset($_POST['puntuaciones'])) {

    $nombreEquipo = $_POST['nombreEquipo'];

    include "conexion-form.php";

    $sql_id_equipo = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '$nombreEquipo'";
    $result_id_equipo = $conn->query($sql_id_equipo);

    if ($result_id_equipo->num_rows > 0) {
        $row_id_equipo = $result_id_equipo->fetch_assoc();
        $idEquipo = $row_id_equipo['id_equipo'];

        $puntuaciones = $_POST['puntuaciones'];

        // Verificar si ya existen registros para este equipo en la tabla puntuaciones_definitivas
        $sql_check_existence = "SELECT * FROM puntuaciones_definitivas WHERE id_equipo = '$idEquipo'";
        $result_check_existence = $conn->query($sql_check_existence);

        if ($result_check_existence->num_rows == 0) {
            // No hay registros, insertar nuevos valores
            foreach ($puntuaciones as $idItem => $puntuacion) {
                $sql_insert = "INSERT INTO puntuaciones_definitivas (id_item, puntuacion, id_equipo) VALUES ('$idItem', '$puntuacion', '$idEquipo')";
                if ($conn->query($sql_insert) !== TRUE) {
                    echo "Error al guardar la puntuación para el ítem $idItem: " . $conn->error;
                    exit;
                }
            }

            // Insertar totales
            $totalGeneral = $_POST['totalGeneral'];
            $totalCategoria1 = $_POST['totalCategoria1'];
            $totalCategoria2 = $_POST['totalCategoria2'];
            $totalCategoria3 = $_POST['totalCategoria3'];
            $totalCategoria4 = $_POST['totalCategoria4'];
            $totalCategoria5 = $_POST['totalCategoria5'];

            $sql_insertTotales = "INSERT INTO puntuaciones_totales (id_equipo, total_general, total_categoria1, total_categoria2, total_categoria3, total_categoria4, total_categoria5) VALUES ('$idEquipo', '$totalGeneral', '$totalCategoria1', '$totalCategoria2', '$totalCategoria3', '$totalCategoria4', '$totalCategoria5')";

            if ($conn->query($sql_insertTotales) !== TRUE) {
                echo "Error al guardar los totales de puntuación: " . $conn->error;
                exit;
            }

            echo "puntuacionGuardada";
        } else {
            // Ya existen registros, devolver un mensaje indicando que las puntuaciones ya están guardadas
            echo "puntuacionesDefinitivas";
        }
    } else {
        echo "noRegistrado";
    }

    $conn->close();
} else {
    echo "Error: El nombre del equipo es obligatorio o faltan datos de puntuaciones.";
}
?>
