<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
obtenederDatosPaciente($_SESSION['idUsuario'], $conection, "paciente");
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Panel Paciente</title>
	 <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	 <link rel="stylesheet" href="css/normalize.css">
	 <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

	<header class="site-header">
		<div class="contenedor">
			<div class="barra">
				<img src="img/Logotipo.png" alt="Logo">
				<div class="user">
					<div><img src="img/sujeto.jpg" alt="FotoPerfil"></div>
					<form action="">
					<select name="selector" id="usuario" onchange="this.form.submit()">
						<option><?php echo $_SESSION['nombre']." ".$_SESSION['apellidoPaterno']." ".$_SESSION['apellidoMaterno']; ?></option>
						<option>Cerrar Sesion</option>
					</select>
					</form>
				</div>
			</div>
		</div>
	</header>
	
	<main class="seccion contenedor">
		<div class="contenedor-citas">
		</div>
		<div class="contenedor-panel-paciente">
				<div class="opcion-paciente">
					<a href="index.php"><img src="img/AgendarCita.png" alt="Imagen Punto de Venta"></a>
					<h3>Agendar cita</h3>
				</div>
				<div class="opcion-paciente">
					<a href="#"><img src="img/ModificarCita.png" alt="Imagen Gestion"></a>
					<h3>Modificar cita</h3>
				</div>
				<div class="opcion-paciente">
					<a href="visualizarExpediente-paciente.php"><img src="img/ExpedienteClinico.png" alt="Imagen Facturas"></a>
					<h3>Expediente clinico</h3>
				</div>

		</div>
	</main>

	<footer class="footer-site seccion"></footer>
</body>
</html>