<?php
    include_once('conexion.php');
    session_start();
    $idReceta = $_GET['idReceta'];
    $query = mysqli_query($conection, "DELETE FROM receta WHERE idReceta = '$idReceta'");
    if($query == true){
        header('location: ../diagnosticoHecho.php');
    }else{
        echo "Error";
    }
?>