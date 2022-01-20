<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
obtenerDatos($_SESSION['idUsuario'],$conection,"farmaceuta");
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Panel Farmacia</title>
	 <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	 <link rel="stylesheet" href="css/normalize.css">
	 <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

	<header class="site-header">
		<div class="contenedor">
			<div class="barra">
				<a href="#"><img src="img/Logotipo.png" alt="Logo"></a>
				<div class="user">
					<div><img src="img/sujeto.jpg" alt=""></div>
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
		<div class="contenedor-panel">
				<div class="opcion-farmacia">
					<a href="ventas.php"><img src="img/PuntoVenta.png" alt="Imagen Punto de Venta"></a>
					<h3>Punto de Venta</h3>
				</div>
				<div class="opcion-farmacia">
					<a href="inventario.php"><img src="img/Gestion.png" alt="Imagen Gestion"></a>
					<h3>Gestionar Inventario</h3>
				</div>
		</div>
	</main>

	<footer class="footer-site seccion"></footer>

</body>
</html>