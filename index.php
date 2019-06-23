<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
<!--        <script src="jquery-3.4.1.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <?php include 'Movie.php'; ?>
        <div class="container">
            <div class="lista">
                <ul class="pelis">
                <script>
                    <?php
                        $jsonString = file_get_contents('lista.json');
                        $peliculas = json_decode($jsonString, true);
                    ?>
                        let peliculas = <?php echo json_encode($peliculas) ?>;
                        for (let i = 0; i < peliculas.length; i++) { 
                            $("ul.pelis").append($("<li>").attr('id', peliculas[i]["nombre"]).append(peliculas[i]["nombre"])); 
                        };
                    <?php
                        $newJson = json_encode($peliculas);
                        file_put_contents('lista.json', $newJson);
                    ?>
                </script>
                    <li id="add">Añadir una película...</li>
                </ul>
            </div>        
            <div class="info">
                <div class="detalles">
                    <h1 id="nombre"></h1>
                    <h2 id="year"></h2>
                    <h3 id="director"></h3>
                    <h4 id="precio"></h3>
                    <h4 id="alquilada"></h4>
                </div>
                <div class="forma">
                    <form id="forma" method="post"> <!-- Submit controlado por jquery -->
                        <h1>Añadir una película</h1>
                        Nombre:<input required type="text" name="nombre"><br>
                        Año:<input required type="number" name="year"><br>
                        Director:<input required type="text" name="director"><br>
                        Precio:<input required type="number" name="precio"><br>
                        <label for="alquilada">Alquilada:</label>
                        <input required type="radio" name="alquilada" value="true"> Si
                        <input required type="radio" name="alquilada" value="false"> No<br>
                        Devolucion:<input required type="date" name="devolucion"><br>
                        <button type="submit" id="submitButton">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    <script src="script.js?new"></script>
    </body>
</html>

