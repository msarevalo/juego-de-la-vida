<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 24/03/2021
 * Time: 12:29 AM
 */

include ('conexion.php');

if (isset($_GET['id'])){
    $identificador = $_GET['id'];
}

$consulta = mysqli_query($con, "UPDATE `reglas` SET `estado` = 0 WHERE `id_regla` = " . $identificador);

if ($consulta){
    ?>
    <script>
        alert('Se eliminó el registro con exito');
        window.location.href='reglas.php';
    </script>
    <?php

}else{
    ?>
    <script>
        alert('Algo ha fallado, intenta eliminar nuevamente');
        window.location.href='reglas.php';
    </script>
    <?php
}