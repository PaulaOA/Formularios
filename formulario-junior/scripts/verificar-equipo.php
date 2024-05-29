<?php
require_once("conexion-form.php");

if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo'])) {
    $nombreEquipo = mysqli_real_escape_string($conn, $_POST['nombreEquipo']);

    $sql = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '$nombreEquipo'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "registrado";
    } else {
        echo "noRegistrado";
    }
} else {
    echo "error";
}

$conn->close();
?>
