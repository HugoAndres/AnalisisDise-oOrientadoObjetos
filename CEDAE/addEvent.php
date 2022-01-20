<?php

// Conexion a la base de datos
require_once('bdd.php');
require_once('Funciones/conexion.php');
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['sexo'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$sexo = $_POST['sexo'];
	$telefono = $_POST['telefono'];
	$sucursal = $_POST['sucursal'];
	$correo = $_POST['email'];

	$nombres = explode(" ", $title);
	$nombre = $nombres[0];
	$apellidoPaterno = $nombres[1];
	$apellidoMaterno = $nombres[2];

	$query = mysqli_query($conection,"INSERT INTO paciente (nombre,apellidoPaterno,apellidoMaterno,email,telefono,genero) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$telefono', '$sexo')" );
	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);	
?>
