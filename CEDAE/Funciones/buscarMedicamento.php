<?php 
include_once('conexion.php');

    $codigo = $_POST['codigo'];

    if($codigo == ''){
        echo json_encode('error2');
    }else{
        $query = mysqli_query($conection, "SELECT nombre, presentacion,direccionImg FROM medicamento WHERE codigoBarras = '$codigo'");
        $resultados = mysqli_fetch_row($query);
        if($resultados > 0){
            echo json_encode($resultados);
        }else{
            echo json_encode('error');
        }

    }
?>