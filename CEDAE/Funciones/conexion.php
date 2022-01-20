<?php
    date_default_timezone_set("America/Mexico_City");	
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'cedae';

    $conection = @mysqli_connect($host,$user,$password,$db);

    if(!$conection){
        echo "Error en la conexion";
    }
?>