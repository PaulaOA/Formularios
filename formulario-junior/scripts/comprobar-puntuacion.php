<?php
include "conexion-form.php";

if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo'])) {
    $nombreEquipo = $_POST['nombreEquipo'];

    $sql_id_equipo = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '$nombreEquipo'";
    $result_id_equipo = $conn->query($sql_id_equipo);

    if ($result_id_equipo->num_rows > 0) {
        $row_id_equipo = $result_id_equipo->fetch_assoc();
        $idEquipo = $row_id_equipo['id_equipo'];

        $sql_verificar_definitivas = "SELECT COUNT(*) AS total_definitivas FROM puntuaciones_definitivas WHERE id_equipo = $idEquipo";
        $result_verificar_definitivas = $conn->query($sql_verificar_definitivas);

        if ($result_verificar_definitivas) {
            $row_verificar_definitivas = $result_verificar_definitivas->fetch_assoc();
            $totalDefinitivas = $row_verificar_definitivas['total_definitivas'];

            if ($totalDefinitivas > 0) {
                echo "puntuacionDefinitiva";
            } else {
                $sql_verificar_temporales = "SELECT COUNT(*) AS total_temporales FROM puntuaciones_temporales WHERE id_equipo = $idEquipo";
                $result_verificar_temporales = $conn->query($sql_verificar_temporales);

                if ($result_verificar_temporales) {
                    $row_verificar_temporales = $result_verificar_temporales->fetch_assoc();
                    $totalTemporales = $row_verificar_temporales['total_temporales'];

                    if ($totalTemporales > 0) {
                        echo "puntuacionesTemporales";
                    } else {
                        echo "sinPuntuar";
                    }
                } else {
                    echo "error";
                }
            }
        } else {
            echo "error";
        }
    } else {
        echo "noExiste";
    }
} else {
    echo "nombreObligatorio";
}
?>
