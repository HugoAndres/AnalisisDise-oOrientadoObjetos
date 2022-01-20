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
		<title>Gestionar Inventario</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/estilos.css">
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
			<form id="codigo-barras">
				<div style="float: left">
				<div style="text-align: center">
					<table>
					   <td><label for="codigo" style="font-family:Arial;font-size:15px;border-style: none;float:left">Código de barras *</label></td>
					   <td><input id="codigo-llenado" required placeholder="Ingresa un código de barras" type="text" name="codigo" size="20" value="" style="font-family:Arial;font-size:15px"></td>
					   <td><input id="submit" type="submit" name="boton1" value="Autocompletar con código de barras" style="font-family:Arial;font-size:15px"></td>
				    </table>
				</div>
				<div id="mensaje">

				</div>
				<br>
			</form>
			<form id="formulario-op">
				<div style="float:left">
					<label for="nombre" style="font-family:Arial;font-size:15px;border-style: none;float:left">Nombre y/o gramaje: *</label>
					<br>
					<input required readonly  type="text" id="nombre" name="nombre" size="20" value="" style="font-family:Arial;font-size:15px">
					<br><br><br><br><br>
					<label  for="fecha" style="font-family:Arial;font-size:15px;border-style: none;float:left">Fecha de caducidad *</label>
					<br>
					<input required id="fecha" readonly type="date" name="fecha" size="20" value="" style="font-family:Arial;font-size:15px">
					<br><br><br><br><br>
					<label for="piezas" style="font-family:Arial;font-size:15px;border-style: none;float:left">Piezas: *</label>
					<br>
					<input min=0 id="piezas" type="text" readonly name="piezas" size="20" value="" style="font-family:Arial;font-size:15px">
					<br><br><br><br><br>
					<input name="guardar" class="btn" type="submit" value="Guardar" style="font-family:Arial;font-size:20px;border-top:none;border-left:none;border-right:none;border-bottom:none;float:left;background-color: lightblue">
				</div>
				<div style="float:right;">
					<label for="presentacion" style="font-family:Arial;font-size:15px;border-style: none;float:left">Presentación: *</label>
					<br>
					<input id="presentacion" readonly type="text" name="presentacion" size="20" value="" style="font-family:Arial;font-size:15px">
					<br><br><br><br><br>
					<label  for="precio" style="font-family:Arial;font-size:15px;border-style: none;float:left">Precio de venta: *</label>	
					<br>
					<input min="0" id="precio" type="number" readonly name="precio" size="20" value="" style="font-family:Arial;font-size:15px">
					<br><br><br><br><br>
					<label  for="precio" style="font-family:Arial;font-size:15px;border-style: none;float:left">Código de barras: *</label>	
					<br>
					<input min="0" id="codigo" type="number" readonly name="codigobarras" size="20" value="" style="font-family:Arial;font-size:15px">
				</div>

			</div>
			<div style="float: right">
				<br><br><br>
				<img id="image" style="border: 1px solid; color: black;" alt="" width="300" height="300" />
				<br><br>
				<input type="file" name="imagen" value="Buscar imagen del producto" style="font-family:Arial;font-size:15px">
			</div>
			</form>
		</main>

		<script src="js/scripts.js"></script>
		<footer class="footer-site seccion"></footer>
	</body>
</html>