<?php

include "conexion-form.php";

$nombreEquipo = $_POST['nombreEquipo'];
$idItem = $_POST['idItem'];
$puntuacion = $_POST['puntuacion'];

$sql_id_equipo = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '$nombreEquipo'";
$result_id_equipo = $conn->query($sql_id_equipo);

if ($result_id_equipo->num_rows > 0) {
    $row_id_equipo = $result_id_equipo->fetch_assoc();
    $idEquipo = $row_id_equipo['id_equipo'];

    $sql_check_existence = "SELECT * FROM puntuaciones_temporales WHERE id_equipo = '$idEquipo' AND id_item = '$idItem'";
    $result_check_existence = $conn->query($sql_check_existence);

    if ($result_check_existence->num_rows > 0) {
        $sql_update = "UPDATE puntuaciones_temporales SET puntuacion = '$puntuacion' WHERE id_equipo = '$idEquipo' AND id_item = '$idItem'";
        if ($conn->query($sql_update) === TRUE) {
            echo "puntuacionActualizada";
        } else {
            echo "errorActualizar" . $conn->error;
        }
    } else {
        $sql_insert = "INSERT INTO puntuaciones_temporales (id_item, puntuacion, id_equipo) VALUES ('$idItem', '$puntuacion', '$idEquipo')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "puntuacionGuardada";
        } else {
            echo "errorGuardar" . $conn->error;
        }
    }
} else {
    echo "noRegistrado";
}

$conn->close();
?>

