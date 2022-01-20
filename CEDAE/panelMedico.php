<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
obtenerDatos($_SESSION['idUsuario'],$conection,"medico");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Panel Medico</title>
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
					<div><img src="img/sujeto.jpg" alt=""></div>
					<form action="">
					<select name="selector" id="usuario" onchange="this.form.submit()">
						<option><?php echo "Dr. ".$_SESSION['nombre']." ".$_SESSION['apellidoPaterno']." ".$_SESSION['apellidoMaterno']; ?></option>
						<option>Cerrar Sesion</option>
					</select>
					</form>
				</div>
			</div>
		</div>
	</header>
	
	<main class="seccion contenedor">
		<div class="contenedor-panel">
				<div class="opcion-recepcion">
					<a href="#"><img src="img/AgendarCita.png" alt="Imagen Punto de Venta"></a>
					<h3>Agenda</h3>
				</div>
				<div class="opcion-recepcion">
					<a href="buscarExpediente.php"><img src="img/ModificarCita.png" alt="Imagen Gestion"></a>
					<h3>Buscar Expediente</h3>
				</div>
				<div class="opcion-recepcion">
					<a href="generarPacientes.php"><img src="img/HistorialVisitas.png" alt="Imagen Facturas"></a>
					<h3>Alta de Credenciales</h3>
				</div>
		</div>
	</main>

	<footer class="footer-site seccion"></footer>
	
	<?php
		if($_GET['selector'] == "Cerrar Sesion"){
			header('location: Funciones/cerrarSesion.php');
		}
	?>
	
</body>
</html>