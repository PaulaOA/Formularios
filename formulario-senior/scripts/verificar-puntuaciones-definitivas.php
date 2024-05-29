<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion-form.php");

// Verificar si se recibió el nombre del equipo
if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo'])) {
    // Sanitizar el nombre del equipo
    $nombreEquipo = mysqli_real_escape_string($conn, $_POST['nombreEquipo']);

    // Consulta SQL para verificar si el equipo tiene registros en la tabla puntuaciones_definitivas
    $sql = "SELECT * FROM puntuaciones_definitivas WHERE id_equipo = (
                SELECT id_equipo FROM equipos WHERE nombre_equipo = '$nombreEquipo'
            )";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se encontraron registros
    if ($result && $result->num_rows > 0) {
        // El equipo tiene registros en la tabla puntuaciones_definitivas
        echo "conRegistros";
    } else {
        // El equipo no tiene registros en la tabla puntuaciones_definitivas
        echo "sinRegistros";
    }
} else {
    // Si no se proporcionó el nombre del equipo, devolver un mensaje de error
    echo "Error: Nombre de equipo no proporcionado.";
}
?>
