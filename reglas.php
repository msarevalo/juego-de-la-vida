<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 23/03/2021
 * Time: 4:31 PM
 */

include ('conexion.php');

$reglas = mysqli_query($con, "SELECT `reglas`.`id_regla`, `reglas`.`id_tipo`, `tipo_validacion`.`validacion`, `reglas`.`valor` FROM `reglas` INNER  JOIN `tipo_validacion` ON `tipo_validacion`.`id_validacion`=`reglas`.`validacion` AND `reglas`.`estado`=1 ORDER BY `reglas`.`id_regla` ASC ");
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
<a href="menu.php"><img src="img/back.png" width="30"></a>
<a href="crear-regla.php"><img src="img/add.png" width="30"></a>
<table class="regla" style="margin-top: -10px">
    <thead>
        <th>Id Regla</th>
        <th>Accion</th>
        <th>Validacion</th>
        <th>Valor de Validacion</th>
        <th>Acciones</th>
    </thead>
    <tbody>
<?php
$conteo = 1;
while ($regla = mysqli_fetch_array($reglas)){
    echo "<tr>";
    echo "<td>" . $conteo . "</td>";
    switch ($regla['id_tipo']){
        case 1:
            echo "<td>Muere</td>";
            break;
        case 2:
            echo "<td>Permanece</td>";
            break;
        case 3:
            echo "<td>Vive</td>";
            break;
    }
    echo "<td>" . $regla['validacion'] . "</td>";
    echo "<td>" . $regla['valor'] . "</td>";
    echo "<td><a href='reglas.php?id=" . $regla['id_regla'] . "'><img src='img/edit.png' width='25'></a><a href=''></a>
    <a href='eliminar-regla.php?id=" . $regla['id_regla'] . "'><img src='img/delete.png' width='25'></a></td>";
    echo  "</tr>";
    $conteo++;
}
?>
    </tbody>
</table>
<div>
    <?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $reglas = mysqli_query($con, "SELECT `reglas`.`id_regla`, `reglas`.`id_tipo`, `tipo_validacion`.`id_validacion`,`tipo_validacion`.`validacion`, `reglas`.`valor` FROM `reglas` INNER  JOIN `tipo_validacion` ON `tipo_validacion`.`id_validacion`=`reglas`.`validacion` AND `reglas`.`id_regla`=" . $id);
        $vidas = mysqli_query($con, "SELECT * FROM `tipos_vida` ORDER BY `tipos_vida`.`name` ASC");
        $validaciones = mysqli_query($con, "SELECT * FROM `tipo_validacion`");
        //var_dump($vidas);
        while ($regla = mysqli_fetch_array($reglas)){
            ?>
            <form action="editar-regla.php" enctype="multipart/form-data" method="post">
                <table class="regla">
                    <thead>
                        <th colspan="2">Editar</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label>ID</label>
                            </td>
                            <td>
                            <?php
                                echo "<input type='number' name='id' id='id' readonly value='" . $regla['id_regla'] . "'>";
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Accion</label>
                            </td>
                            <td>
                                <select id="accion" name="accion">
                                <?php
                                    while ($vida = mysqli_fetch_array($vidas)){
                                        if ($regla['id_tipo']==$vida['id_tipo']){
                                            echo "<option selected value='" . $vida['id_tipo'] . "'>" . $vida['name'] . "</option>";
                                        }else{
                                            echo "<option value='" . $vida['id_tipo'] ."'>" . $vida['name'] . "</option>";
                                        }
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
                                <select id="validacion" name="validacion">
                                <?php
                                    while ($validacion = mysqli_fetch_array($validaciones)){
                                        if ($regla['id_validacion'] == $validacion['id_validacion']){
                                            echo "<option selected value='" . $validacion['id_validacion'] . "'>" . $validacion['validacion'] . " " . $validacion['nombre'] . "</option>";
                                        }else{
                                            echo "<option value='" . $validacion['id_validacion'] ."'>" . $validacion['validacion'] . " " . $validacion['nombre'] . "</option>";
                                        }
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
                            <?php
                                echo "<input type='number' min='0' id='valor' name='valor' value='" . $regla['valor'] . "'>";
                            ?>
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
    <?php
        }
    }
    ?>
</div>
</body>