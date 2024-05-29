<?php

if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo'])) {
    $nombreEquipo = $_POST['nombreEquipo'];

    include "conexion-form.php";

    $insert_equipo = "INSERT INTO equipos (nombre_equipo) VALUES ('$nombreEquipo')";
    if ($conn->query($insert_equipo) === TRUE) {
        echo "equipoRegistrado";
    } else {
        echo "error";
    }

    $conn->close();
} else {
    echo "error";
}

?>

