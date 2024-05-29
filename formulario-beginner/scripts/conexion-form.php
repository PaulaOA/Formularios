<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "formulariobeginner";

    $conn = new mysqli($servername, $username, $password, $database);
    $conn->set_charset("utf8");
    //Verificar conexión
    if ($conn->connect_error){
        die("Conexión fallida" . $conn->connect_error);
    } 
?>