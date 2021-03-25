function cuadro() {
    var col = $("#columnas").val();
    var fila = $("#filas").val();
    $("#tabla").empty();
    $("#prueba").empty();
    $("#enviar").css("display", "none");
    $("#titulo-iteracion").css("display", "none");
    $("#titulo-tabla").css("display", "none");
    $("#iteracion").css("display", "none");
    //alert(fila);
    var cuadro;
    if (fila>=3){
        if (col>=3){
            for (var i=0; i<fila; i++){
                cuadro = cuadro + "<tr>";
                for (var j=0; j<col; j++){
                    var check = "c" + i + "-" + j;
                    //console.log(check);
                    cuadro = cuadro + "<td><input type='checkbox' id='" + check + "' name='" + check +"'></td>";
                }
                cuadro = cuadro + "</tr>";
            }
            $("#tabla").append(cuadro);
            $("#iteracion").css("display", "block");
            $("#enviar").css("display", "block");
            //$("#tabla").css("display", "block");
            $("#titulo-iteracion").css("display", "block");
            $("#titulo-tabla").css("display", "block");
            $("#col-cuadro").val(col);
            $("#fil-cuadro").val(fila);
        }else {
            $("#prueba").append("Las Columnas deben ser mayores o iguales a 3");
        }
    }else {
        $("#prueba").append("Las Filas deben ser mayores o iguales a 3");
    }

}