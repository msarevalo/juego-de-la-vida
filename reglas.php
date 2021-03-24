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
<a href="menu.php"><img src="img/back.png" width="25"></a>
<a href="crear-regla.php"><img src="img/add.png" width="25"></a>
<table border="1">
    <tr>
        <th>Id Regla</th>
        <th>Accion</th>
        <th>Validacion</th>
        <th>Valor de Validacion</th>
        <th>Acciones</th>
    </tr>
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
                <label>ID</label>
                <?php
                    echo "<input type='number' name='id' id='id' readonly value='" . $regla['id_regla'] . "'>";
                ?><br>
                <label>Accion</label>
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
                </select><br>
                <label>Tipo de Validacion</label>
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
                </select><br>
                <label>Valor de Validacion</label>
                <?php
                    echo "<input type='number' min='0' id='valor' name='valor' value='" . $regla['valor'] . "'>";
                ?><br>
                <input type="submit">
            </form>
    <?php
        }
    }
    ?>
</div>