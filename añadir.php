<?php
    include "Movie.php";

    $nueva = new Movie($_POST["nombre"],$_POST["year"],$_POST["director"],$_POST["precio"],$_POST["alquilada"],$_POST["devolucion"]);
    $jsonString = file_get_contents('lista.json');
    $peliculas = json_decode($jsonString, true);
    $nueva = json_decode(json_encode($nueva), true);
    array_push($peliculas, $nueva);
    $newJson = json_encode($peliculas);
    file_put_contents('lista.json', $newJson);
    $_POST = array();
?>
