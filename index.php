<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
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
                    <h1 style="text-align:center;"><span id="nombre"></span></h1>
                    <h2><span id="year"></span></h2>
                    <h2><span id="director"></span></h3>
                    <h2><span id="precio"></span></h4>
                    <h2><span id="alquilada"></span></h4>
                    <h2><span id="devolucion"></span></h4>
                </div>
                <div class="formaCont">
                    <form id="forma" method="post"> <!-- Submit controlado por jquery -->
                        <h1>Añadir una película (Puede requerir refrescar la página)</h1>
                        <label for="nombre">Nombre:</label><br>
                        <input class="infoDeInput" required type="text" name="nombre"><br>
                        <label for="year">Año:</label><br>
                        <input class="infoDeInput" required type="number" name="year"><br>
                        <label for="director">Director:</label><br>
                        <input class="infoDeInput" required type="text" name="director"><br>
                        <label for="precio">Precio:</label><br>
                        <input class="infoDeInput" required type="number" name="precio"><br>
                        <label for="alquilada">Alquilada:</label><br>
                        <input class="infoDeInput" required type="radio" name="alquilada" value="true"> Si
                        <input class="infoDeInput" required type="radio" name="alquilada" value="false"> No<br>
                        <label for="devolucion">Se devolverá el:</label><br>
                        <input class="infoDeInput" required type="date" name="devolucion"><br>
                        <button type="submit" id="submitButton">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
            <script src="script.js?new"></script>
    </body>
</html>

