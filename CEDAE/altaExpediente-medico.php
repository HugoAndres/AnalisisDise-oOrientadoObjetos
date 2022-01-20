<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
if(isset($_GET['buscarl'])){

}

?>
<html>
	<head>
		<title>Alta de Expediente Clínico</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="CSS/normalize.css">	
		<link rel="stylesheet" href="CSS/altaExpediente.css">
		<script language = "JavaScript">
			function confirmarEnvio(){
				var resultado = confirm("¿Deseas almacenar los datos?");
				if(resultado == true){
					alert("El usuario se ha registrado correctamente");
					return true;
				}else{
					alert("Operación cancelada");
					return false;
				}

			}
		</script>	
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
								<option><?php echo $_SESSION['nombre']." ".$_SESSION['apellidoPaterno']." ".$_SESSION['apellidoMaterno']; ?></option>
								<option>Cerrar Sesion</option>
							</select>
						</form>
					</div>
				</div>
			</div>
		</header>

		<main class="seccion contenedor">
			<div class="buscador">
				<p>Fecha de Registro: <?php generarDatosFecha(); ?></p>
			</div>
			<div class="seccion">
				<form action="Funciones/registarExpediente-medico.php" autocomplete="off" id="registro" onsubmit="confirmarEnvio()" method="POST">
					<div class="division">
						<p>
							Primer nombre y apellidos <br>
							<input class="respuesta" type="text" required minlength="2" name="nombre"><br>
							Fecha de Nacimiento <br>
							<input class="respuesta" type="date" name="fechaNac"><br>
							Género <br>
							<input class="respuesta" type="text" required minlength="2" name="genero"><br>
							Correo Electrónico<br>
							<input class="respuesta" type="email" name="email"><br>
							Teléfono<br>
							<input class="respuesta" type="tel" name="tel"><br>
						</p>
					</div>
					<div class="division">
						<p>
							Alergias <br>
							<input class="respuesta" type="text" value="" name="alergias"><br>
							Antecedentes HeredoFamiliares <br>
							<input class="respuesta" type="text" name="antHF"><br>
							Antecedentes personales patológicos<br>
							<input class="respuesta" type="text" name="antPP"><br>
							Peso (Kg)<br>
							<input class="respuesta" type="text" name="peso"><br>
							Estatura (cm)<br>
							<input class="respuesta" type="text" name="estatura"><br>
						</p>
					</div>
					<div class="division">
						<p>
							Presion Arterial<br>
							<input class="respuesta" type="text" name="presion"><br>
							Frecuencia cardiaca<br>
							<input class="respuesta" type="text" name="frecuencia"><br>
							Frecuencia respiratoria<br>
							<input class="respuesta" type="text" id="" name="frecresp"><br>
							Temperatura<br>
							<input class="respuesta" type="text" name="temperatura"><br>
							Motivo de consulta<br>
							<input class="respuesta" type="text" name="motivo">

							<input name="guardar" class="btn" type="submit" value="Guardar">
						</p>
					</div>
				</form>
			</div>

		</main>

	</body>


</html>