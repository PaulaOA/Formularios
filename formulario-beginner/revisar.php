<?php
include "scripts/conexion-form.php";

?>
<!DOCTYPE html>
<html lang="es">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="https://www.technovation.org/wp-content/themes/technovation_1.0.6_HC/favicon.png?v=1.0"/>
    <title>Revisar Puntuaciones</title>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
  
    <style>
 #logo {
    position: absolute;
    top: 70px; /* Margen superior */
    left: 70px;
    width: 240px; /* Tamaño del logo */
    height: auto; /* Esto permite que la imagen se ajuste proporcionalmente */
    }

    .container {
        width: 100%;
        height: 100%;
        margin-bottom: 100px;
        margin-top: 100px;
      }


.contenedor {
    margin: 0 auto; /* Centra el contenedor horizontalmente */
    max-width: 1200px; /* Ancho máximo del contenedor */
}

table {
    border-collapse: collapse;
    width: 100%;

  </style>
  
  </head>
  <body>

<div class="container" id="contenedorFormulario">

    <img id="logo" src="https://www.technovation.org/wp-content/uploads/2019/07/logo-girls.png" alt="Technivation Image">


    <div class="contenedor mb-4" style="max-width: 600px;">
        <label for="nombre_equipo" style="margin-right:20px ;"><b>NOMBRE DEL EQUIPO</b></label>
        <input type="text" class="text-center" style="margin-right:20px ;" id="nombre_equipo">
        <button class="btn btn-secondary py-2 px-2" id="btnVerPuntuaciones">Ver puntuaciones</button>
    </div>

<div id="tablaPuntuaciones">

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

$(document).ready(function(){

    $('#btnVerPuntuaciones').click(function(){
        var nombreEquipo = $('#nombre_equipo').val().trim();


            $.ajax({
                url: 'scripts/obtener-puntuaciones.php',
                method: 'POST',
                data: {nombreEquipo: nombreEquipo},
                success: function(response){
                    $('#tablaPuntuaciones').html(response);
                }
            });
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>