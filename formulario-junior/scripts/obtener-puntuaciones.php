<?php
require_once("conexion-form.php");

if (isset($_POST['nombreEquipo']) && !empty($_POST['nombreEquipo'])) {
    $nombreEquipo = mysqli_real_escape_string($conn, $_POST['nombreEquipo']);

    $sql_nombre = "SELECT id_equipo FROM equipos WHERE nombre_equipo = '".$nombreEquipo."'";

    $id_encontrado = $conn->query($sql_nombre);

    if ($id_encontrado && $id_encontrado->num_rows > 0) {

        $fila_equipo = $id_encontrado->fetch_assoc();
        $id_equipo = $fila_equipo['id_equipo'];

        $sql_puntuaciones_totales = "SELECT * FROM puntuaciones_totales WHERE id_equipo = $id_equipo ";
        $result_puntuaciones_totales = $conn->query($sql_puntuaciones_totales);
        $puntuaciones_totales = $result_puntuaciones_totales->fetch_assoc();


        $sql_puntuaciones_definitivas = "SELECT COUNT(*) as count FROM puntuaciones_definitivas WHERE id_equipo = $id_equipo";
        $result_puntuaciones_definitivas = $conn->query($sql_puntuaciones_definitivas);
        $row_puntuaciones_definitivas = $result_puntuaciones_definitivas->fetch_assoc();
        $count_puntuaciones_definitivas = $row_puntuaciones_definitivas['count'];

        if ($id_encontrado->num_rows > 0 && $count_puntuaciones_definitivas > 0) {
            $sql_equipo = "SELECT 
                            i.id_item,
                            i.descripcion,
                            p.puntuacion,
                            e.nombre_equipo
                        FROM 
                            items AS i
                        LEFT JOIN 
                            puntuaciones_definitivas AS p ON i.id_item = p.id_item
                        LEFT JOIN
                            equipos AS e ON p.id_equipo = e.id_equipo
                        WHERE 
                            p.id_equipo = $id_equipo
                        ORDER BY 
                            i.id_item ASC;";

            $puntuaciones_equipo = $conn->query($sql_equipo);
            
            $sql_categorias = "SELECT nombre FROM categorias";
            $resultado_categorias = $conn->query($sql_categorias);

            if ($resultado_categorias->num_rows > 0) {
                $categorias_nombre = array();
                while ($fila_categoria = $resultado_categorias->fetch_assoc()) {
                    $categorias_nombre[] = $fila_categoria['nombre'];
                }
            } else {
               
                echo "No se encontraron categorías.";
                exit();
            }
                echo "<div class='contenedor container-fluid' style='max-width: 100%;'>
                <div class='row justify-content-center'>
                    <div class='col-md-10 pl-4'>
                        <div class='card mt-4 mb-2'>
                            <div class='card-header text-center'>Viendo las puntuaciones definitivas del equipo <b>".$nombreEquipo."</b></div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table table-striped mb-2' id='tabla_puntuaciones'>
                                            <thead>
                                                <tr>
                                                    <th class='text-center' style='width: 10%;'>ID Item</th>
                                                    <th class='text-center' style='width: 80%;'>Item</th>
                                                    <th class='text-center' style='width: 10%;'>Puntuación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class='text-center' colspan='3' style='background-color: blue; color: white;'>".$categorias_nombre[0]."</td>
                                                </tr>";
                                                $i = 0;
                                                while ($puntuacion = $puntuaciones_equipo->fetch_assoc()):
                                                    $i++;
                                                    echo "<tr>
                                                            <td class='text-center'>".$puntuacion['id_item']."</td>
                                                            <td>".$puntuacion['descripcion']."</td>
                                                            <td class='text-center'>".($puntuacion['puntuacion'] == 0 ? '' : $puntuacion['puntuacion'])."</td>
                                                        </tr>";
                                                    if ($i == 1) {
                                                        echo "<tr>
                                                                <td class='text-center' colspan='3' style='background-color: deeppink; color: white;'>".$categorias_nombre[1]."</td>
                                                            </tr>";
                                                    }

                                                    if ($i == 9) {
                                                        echo "<tr>
                                                                <td class='text-center' colspan='3' style='background-color: forestgreen; color: white;'>".$categorias_nombre[2]."</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan='3' class='titulo' style='background-color: lightgreen; color: black; font-weight: normal;'><b>Opción 1:</b> Presentación de aplicaciones móviles Puntuación técnica de vídeos</td>
                                                            </tr>";
                                                    }
                                                    if ($i == 12) {
                                                        echo "<tr>
                                                                <td colspan='3' class='descripcion' style='background-color: lightgreen; color: black;'><b>Opción 2:</b> Presentación del prototipo de IA. Puntuación del vídeo técnico</td>
                                                            </tr>";
                                                    }
                                                    if ($i == 15) {
                                                        echo "<tr>
                                                                <td class='text-center' colspan='3' style='background-color: deeppink; color: white;'>".$categorias_nombre[3]."</td>
                                                            </tr>";
                                                    }
                                                    if ($i == 17) {
                                                        echo "<tr>
                                                                <td class='text-center' colspan='3' style='background-color: darkorange; color: white;'>".$categorias_nombre[4]."</td>
                                                            </tr>";
                                                    }
                                                endwhile;
                                        echo "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";

                    echo "<div class='contenedor container-fluid' style='max-width: 100%;'>
                <div class='row justify-content-center'>
                    <div class='col-md-5 pl-4'>
                        <div class='card mt-4 mb-2'>
                            <div class='card-header text-center' style='background-color: darkblue; color: white;'>Puntuaciones totales</div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table table-striped mb-2' id='tabla_puntuaciones_totales'>
                                            <tbody>
                                                <tr>
                                                  <td style='width: 90%;'>Puntuación total de la descripción del proyecto</td>
                                                  <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_categoria1']."</td>
                                                </tr>
                                                <tr>
                                                  <td style='width: 90%;'>Puntuación total del vídeo</td>
                                                  <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_categoria2']."</td>
                                                </tr>
                                                <tr>
                                                  <td style='width: 90%;'>Puntuación total del vídeo técnico</td>
                                                  <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_categoria3']."</td>
                                                </tr>
                                                <tr>
                                                  <td style='width: 90%;'>Puntuación total del Plan de adopción de usuarios</td>
                                                  <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_categoria4']."</td>
                                                </tr>
                                                <tr>
                                                  <td style='width: 90%;'>Puntuación total del itinerario de aprendizaje</td>
                                                  <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_categoria5']."</td>
                                                </tr>
                                                <tr>
                                                    <td style='text-align: right;' style='width: 90%;'><b>Puntuación total</b></td>
                                                    <td class='text-center' colspan='1' style='width: 10%;'>".$puntuaciones_totales['total_general']."</td>
                                                </tr>
                                            
                                             </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";

        } else {
            echo " <p class='text-center'>El equipo está registrado pero aún no tiene puntuaciones definitivas</p>";
        }
            
    } else {
        echo "<p class='text-center'>No se encontraron equipos con ese nombre</p>";
    }
} else {
    echo "<p class='text-center'>Por favor, ingresa un nombre de equipo para realizar la búsqueda.</p>";
}
?>