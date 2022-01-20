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
		<title>Gestionar medicamentos</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/inventario.css">
	</head>
	<body>
		<header class="site-header">
			<div class="contenedor">
				<div class="barra">
					<a href="panelFarmacia.php"><img src="img/Logotipo.png" alt="Logo"></a>
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
			<div class="BotonesExtra" style="float:left">
				<a href="registrarMedicamento.php">Registrar Medicamentos</a>
			</div>
			<div style="float: right">

				<div style="overflow-y: scroll;width: 600px;height: 150px">
					<input type="button" name="boton1" value="Medicamentos próximos a caducar" style="font-family:Arial;font-size:20px;background-color:yellow;opacity: 0.8">
					<table style="font-size: 1.2rem; text-align:center;">
						<thead>
							<th>Nombre</th>
							<th>Presentacion</th>
							<th>Fecha de caducidad</th>
						</thead>
						<tbody>
							<?php obtenerMedicamentosCaducando($conection);?>
						</tbody>
					</table>


				</div>

				<div id="sin-stock" style="overflow-y: scroll;width: 600px;height: 150px">
					<input type="button" name="boton1" value="Medicamentos sin disponibilidad" style="font-family:Arial;font-size:20px;background-color:red;opacity: 0.8">
				</div>
			</div>
		</main>
		<footer class="footer-site seccion"></footer>
	</body>
</html>