<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 21/03/2021
 * Time: 2:46 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>El Juego De La Vida</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <!--<link href="../css/estilos.css" rel="stylesheet">-->
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js" type="application/javascript"></script>
</head>
<body>
<a href="menu.php"><img src="img/back.png" width="25"></a>
<div>
    <center>
    <!--<form action="prueba.php" enctype="multipart/form-data" method="post" id="encriptar">-->
        <label for="filas">Filas</label><input type="number" min="3" class="effect-11" placeholder="Filas" value="3" required name="filas" id="filas">
        <label for="columnas">Columnas</label><input type="number" min="3" class="basic-slide" placeholder="Columnas" value="3" required name="columnas" id="columnas">
        <br><span id="prueba"></span>
        <br><input type="submit" onclick="cuadro()" value="Generar Cuadro">
    </center>
    <!--</form>-->
</div>
<div>
    <center><br>
        <form id="cuadro" action="iterar.php" enctype="multipart/form-data" method="post">
            <table id="tabla" border="1">

            </table><br>
            <label for="iteracion" id="titulo-iteracion" style="display: none">Iteracion</label><input type="number" min="1" max="50" required id="iteracion" name="iteracion" style="display: none" placeholder="Ingresa la cantidad de iteraciones">
            <input id="fil-cuadro" name="fil-cuadro" style="display: none">
            <input id="col-cuadro" name="col-cuadro" style="display: none"><br>
            <input type="submit" style="display: none" id="enviar">
        </form>
    </center>
</div>
</body>
