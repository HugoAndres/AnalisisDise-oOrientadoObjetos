<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Buscar Expediente</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	    <link rel="stylesheet" href="css/normalize.css">
	    <link rel="stylesheet" href="css/buscarExpediente.css">
	</head>
	<body>
		<header class="site-header">
			<div class="contenedor">
				<div class="barra">
					<a href="panelMedico.php"><img src="img/Logotipo.png" alt="Logo"></a>
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
			<div class="buscador">
				<form action="altaExpedienteMedico.php">
					<a href="altaExpediente-medico.php">Generar Expediente</a>
				</form>
				<form action="buscarExpediente.php" id="busqueda">
					<p>
						<input type="search" name="buscarpaciente" placeholder="Buscar Paciente" class="text">
						<input type="submit" name="buscar" value="Buscar" class="btn">
					</p>
				</form>
			</div>

			<div class="seccionespecial">
				<?php obtenerExpedientes($conection); ?>
			</div>
		</main>
		<footer class="footer-site seccion"></footer>
	</body>
</html>	