<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 23/03/2021
 * Time: 11:49 PM
 */

include ('conexion.php');

if (isset($_POST['id'])){
    $identificador = $_POST['id'];
}

if (isset($_POST['accion'])){
    $accion = $_POST['accion'];
}

if (isset($_POST['validacion'])){
    $validacionpost = $_POST['validacion'];
}

if (isset($_POST['valor'])){
    $valor = $_POST['valor'];
}

$consulta = mysqli_query($con, "UPDATE `reglas` SET `id_tipo` = " . $accion . ", `validacion` = " . $validacionpost . ", `valor` = " . $valor . " WHERE `id_regla` = " . $identificador);

if ($consulta){
    ?>
<script>
    alert('Se editó el registro con exito');
    window.location.href='reglas.php';
</script>
<?php

}else{
    ?>
<script>
    alert('Algo ha fallado, intenta editar nuevamente');
    window.location.href='reglas.php';
</script>
<?php
}