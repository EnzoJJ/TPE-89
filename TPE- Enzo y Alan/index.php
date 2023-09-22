<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELISWEB - Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <?php
    $titulo = "PELISWEB-La mejor pagina de peliculas";
    $parrafo ="Bienvenido a PELISWEB, tu fuente de informacion y reseñas de peliculas.
    Ayudamos a los amantes del cine con analisis detallados, puntuaciones, sinopsis, reparto
    , genero y recomendaciones.  Nuestro objetivo es ser una fuente confiable, ofreciendo una visión completa y 
    objetiva de las películas que cubrimos.";
    echo "<div>";
    echo "<h1>" . $titulo . "</h1>";
    echo "<p>" . $parrafo . "</p>";
    echo "<img src='img/pelis.jpg' alt='Imagen de PELISWEB'>"; // Agrega la ruta a tu imagen y un texto alternativo
    echo "</div>";
    ?>
</div>

</body>
</html>
