<?php
    session_start();
    include_once('conexion.php');
    $iddiag = $_SESSION['idDiagnostico'];
    $nombreMedico = $_SESSION['nombre']." ".$_SESSION['apellidoPaterno']." ".$_SESSION['apellidoMaterno'];
    $fecha = date('d-m-Y');
    $query = mysqli_query($conection, "INSERT INTO receta (idDiagnostico, nombreMedico, fecha) VALUES('$iddiag', '$nombreMedico', '$fecha')");
    if($query == true){
        $query = mysqli_query($conection,"SELECT idReceta FROM receta WHERE ORDER BY idReceta DESC LIMIT 1");
        $resultado = mysqli_fetch_row($query);
        $_SESSION['idReceta'] = $resultado[0];
        header('location: ../diagnosticoHecho.php');
    }else{
        echo "Error";
    }
?>
