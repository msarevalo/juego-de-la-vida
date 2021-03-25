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
<a href="reglas.php"><img src="img/back.png" width="30"></a>
<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 24/03/2021
 * Time: 12:05 AM
 */

include ('conexion.php');

if (isset($_POST['accion'])){
    $accion = $_POST['accion'];
}

if (isset($_POST['validacion'])){
    $validacionpost = $_POST['validacion'];
}

if (isset($_POST['valor'])){
    $valor = $_POST['valor'];

    $consulta = mysqli_query($con, "INSERT INTO `reglas` (`id_tipo`, `validacion`, `valor`, `estado`) VALUES ('" . $accion . "', '" . $validacionpost . "', '" . $valor . "', 1)");

    if ($consulta){

    ?>
        <script>
            alert('Se agregó el registro con exito');
            window.location.href='reglas.php';
        </script>
    <?php
    }else{

        ?>
        <script>
            alert('Algo ha fallado');
            window.location.href='crear-regla.php';
        </script>
    <?php
    }
}

$vidas = mysqli_query($con, "SELECT * FROM `tipos_vida` ORDER BY `tipos_vida`.`name` ASC");
$validaciones = mysqli_query($con, "SELECT * FROM `tipo_validacion`");
//var_dump($vidas);
?>

<form action="crear-regla.php" enctype="multipart/form-data" method="post">
    <table class="regla" style="margin-top: -10px">
        <thead>
            <tr><th colspan="2">Crear Regla</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <label>Accion</label>
                </td>
                <td>
                    <select id="accion" name="accion" required>
                        <option value="" selected disabled>Selecciona una Accion</option>
                        <?php
                            while ($vida = mysqli_fetch_array($vidas)){
                                echo "<option value='" . $vida['id_tipo'] . "'>" . $vida['name'] . "</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tipo de Validacion</label>
                </td>
                <td>
                    <select id="validacion" name="validacion" required>
                        <option value="" disabled selected>Seleccione una Validacion</option>
                        <?php
                            while ($validacion = mysqli_fetch_array($validaciones)){
                                echo "<option value='" . $validacion['id_validacion'] ."'>" . $validacion['validacion'] . " " . $validacion['nombre'] . "</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Valor de Validacion</label>
                </td>
                <td>
                    <input type='number' min='0' id='valor' name='valor' required>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" class="btn w-M br-0 stl-3" style="margin-bottom: 10px">
                </td>
            </tr>
        </tbody>
    </table>
</form>