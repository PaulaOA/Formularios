<?php
include "scripts/conexion-form.php";

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

$sql_items_1 = "SELECT * FROM items WHERE id_categoria = 1";
$items_categoria1 = $conn->query($sql_items_1);

$sql_items_2 = "SELECT * FROM items WHERE id_categoria = 2";
$items_categoria2 = $conn->query($sql_items_2);

$sql_items_3 = "SELECT * FROM items WHERE id_categoria = 3";
$items_categoria3 = $conn->query($sql_items_3);

$sql_items_4 = "SELECT * FROM items WHERE id_categoria = 4";
$items_categoria4 = $conn->query($sql_items_4);

?>