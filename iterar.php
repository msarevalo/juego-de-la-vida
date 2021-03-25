<?php
/**
 * Created by PhpStorm.
 * User: LOYALQUO
 * Date: 21/03/2021
 * Time: 3:36 AM
 */

include ('conexion.php');

//$reglas = mysqli_query($con, "SELECT * FROM `reglas` WHERE `estado`=1");
//var_dump($reglas);

$filas = $_POST["fil-cuadro"];
$columnas = $_POST["col-cuadro"];
$iteracion = $_POST["iteracion"];

for ($i=0; $i<$filas; $i++){
    for ($j=0; $j<$columnas; $j++){
        $ubicacion = "c" . $i . "-" . $j;
        if (isset($_POST[$ubicacion])) {
            $matriz[$ubicacion] = 1;
        }else{
            $matriz[$ubicacion] = 0;
        }
    }
}

$matrizsalida = $matriz;
//var_dump($matriz);
//echo "<br><br>";
//var_dump($matrizsalida);
echo "<table>";
for ($i=0; $i<$filas; $i++){
    echo "<tr>";
    for ($j=0; $j<$columnas; $j++){
        $ubicacion = "c" . $i . "-" . $j;
        if ($matriz[$ubicacion]==0){
            echo "<td style='background: #6d9eeb'>" . $matriz[$ubicacion] . "</td>";
        }else{
            echo "<td style='background: #93c47d'>" . $matriz[$ubicacion] . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
echo "<br><br>";

$contador1 = 0;
for ($k=0; $k<$iteracion; $k++){
    for ($i=0; $i<$filas; $i++){
        for ($j=0; $j<$columnas; $j++){
            if ($i-1>=0){
                $vali = $i-1;
                if ($j-1>=0){
                    $valj = $j-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-0"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-0"] = $matriz[$ubicacion];
                }else{
                    $valj = $columnas-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-0"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-0"] = $matriz[$ubicacion];
                }
                $ubicacion = "c" . $vali . "-" . $j;
                $mini["c0-1"] = $matriz[$ubicacion];
                if ($j+1==$columnas){
                    $ubicacion = "c" . $vali . "-0";
                    $mini["c0-2"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-0";
                    $mini["c1-2"] = $matriz[$ubicacion];
                }else{
                    $valj = $j+1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-2"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-2"] = $matriz[$ubicacion];
                }
            }
            else{
                $vali = $filas-1;
                if ($j-1>=0){
                    $valj = $j-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-0"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-0"] = $matriz[$ubicacion];
                }else{
                    $valj = $columnas-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-0"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-0"] = $matriz[$ubicacion];
                }
                $ubicacion = "c" . $vali . "-" . $j;
                $mini["c0-1"] = $matriz[$ubicacion];
                if ($j+1==$columnas){
                    $ubicacion = "c" . $vali . "-0";
                    $mini["c0-2"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-0";
                    $mini["c1-2"] = $matriz[$ubicacion];
                }else{
                    $valj = $j+1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c0-2"] = $matriz[$ubicacion];
                    $ubicacion = "c" . $i . "-" . $valj;
                    $mini["c1-2"] = $matriz[$ubicacion];
                }
            }
            if ($i+1<$filas){
                $vali = $i+1;
                if ($j-1>=0){
                    $valj = $j-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-0"] = $matriz[$ubicacion];
                }else{
                    $valj = $columnas-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-0"] = $matriz[$ubicacion];
                }
                $ubicacion = "c" . $vali . "-" . $j;
                $mini["c2-1"] = $matriz[$ubicacion];
                if ($j+1<$columnas){
                    $valj = $j+1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-2"] = $matriz[$ubicacion];
                }else{
                    $ubicacion = "c" . $vali . "-0";
                    $mini["c2-2"] = $matriz[$ubicacion];
                }
            }else{
                $vali=0;
                if ($j-1>=0){
                    $valj = $j-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-0"] = $matriz[$ubicacion];
                }else{
                    $valj = $columnas-1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-0"] = $matriz[$ubicacion];
                }
                $ubicacion = "c" . $vali . "-" . $j;
                $mini["c2-1"] = $matriz[$ubicacion];
                if ($j+1<$columnas){
                    $valj = $j+1;
                    $ubicacion = "c" . $vali . "-" . $valj;
                    $mini["c2-2"] = $matriz[$ubicacion];
                }else{
                    $ubicacion = "c" . $vali . "-0";
                    $mini["c2-2"] = $matriz[$ubicacion];
                }
            }
            $ar = array_replace($mini,array_fill_keys(array_keys($mini, null),''));
            $conteo = array_count_values($ar);
            //var_dump($conteo);
            //echo "<br><br>";
            $ubicacion = "c" . $i . "-" . $j;

            //  var_dump($vidas);
            $reglas = mysqli_query($con, "SELECT `reglas`.`id_regla`, `reglas`.`id_tipo`, `tipo_validacion`.`validacion`, `reglas`.`valor` FROM `reglas` INNER  JOIN `tipo_validacion` ON `tipo_validacion`.`id_validacion`=`reglas`.`validacion` AND `reglas`.`estado`=1");
            while ($regla = mysqli_fetch_array($reglas)){
                if (isset($conteo[1])){
                    //echo $conteo['1'];
                    switch ($regla['validacion']){
                        case '<':
                            if (intval($conteo['1']) < intval($regla['valor'])){
                                if ($regla['id_tipo']==1){
                                    $matrizsalida[$ubicacion] = 0;
                                }elseif ($regla['id_tipo']==2){
                                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                                }elseif ($regla['id_tipo']==3){
                                    $matrizsalida[$ubicacion] = 1;
                                }
                            }
                            break;
                        case '<=':
                            if ($conteo[1] <= intval($regla['valor'])){
                                if ($regla['id_tipo']==1){
                                    $matrizsalida[$ubicacion] = 0;
                                }elseif ($regla['id_tipo']==2){
                                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                                }elseif ($regla['id_tipo']==3){
                                    $matrizsalida[$ubicacion] = 1;
                                }
                            }
                            break;
                        case '>':
                            if ($conteo[1] > intval($regla['valor'])){
                                if ($regla['id_tipo']==1){
                                    $matrizsalida[$ubicacion] = 0;
                                }elseif ($regla['id_tipo']==2){
                                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                                }elseif ($regla['id_tipo']==3){
                                    $matrizsalida[$ubicacion] = 1;
                                }
                            }
                            break;
                        case '>=':
                            if ($conteo[1] == intval($regla['valor'])){
                                if ($regla['id_tipo']==1){
                                    $matrizsalida[$ubicacion] = 0;
                                }elseif ($regla['id_tipo']==2){
                                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                                }elseif ($regla['id_tipo']==3){
                                    $matrizsalida[$ubicacion] = 1;
                                }
                            }

                            break;
                        case '==':
                            if ($conteo[1] == intval($regla['valor'])){
                                if ($regla['id_tipo']==1){
                                    $matrizsalida[$ubicacion] = 0;
                                }elseif ($regla['id_tipo']==2){
                                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                                }elseif ($regla['id_tipo']==3){
                                    $matrizsalida[$ubicacion] = 1;
                                }
                            }
                            break;
                    }
                }else{
                    $matrizsalida[$ubicacion] = 0;
                }
            }
            /*if (isset($conteo[1])) {
                if ($conteo[1] < 2) {
                    $matrizsalida[$ubicacion] = 0;
                } elseif ($conteo[1] > 3) {
                    $matrizsalida[$ubicacion] = 0;
                } elseif ($conteo[1] == 2) {
                    $matrizsalida[$ubicacion] = $matriz[$ubicacion];
                } elseif ($conteo[1] == 3) {
                    $matrizsalida[$ubicacion] = 1;
                }
            }else{
                $matrizsalida[$ubicacion] = 0;
            }*/

        }

    }
    //echo $matrizsalida["c2-4"] . "<br>";
    //var_dump($matrizsalida);
    $matriz=$matrizsalida;
    //var_dump($mini);
    $itera = $k+1;
    echo "<label>Iteracion: " . $itera ."</label><br><table>";
    for ($i=0; $i<$filas; $i++){
        echo "<tr>";
        for ($j=0; $j<$columnas; $j++){
            $ubicacion = "c" . $i . "-" . $j;
            if ($matriz[$ubicacion]==0){
                echo "<td style='background: #6d9eeb'>" . $matriz[$ubicacion] . "</td>";
            }else{
                echo "<td style='background: #93c47d'>" . $matriz[$ubicacion] . "</td>";
            }

        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<br><br>";
}

