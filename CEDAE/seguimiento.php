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
	<title>Seguimiento</title>
	 <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	 <link rel="stylesheet" href="CSS/normalize.css">
	 <link rel="stylesheet" href="CSS/seguimiento.css">
	 <link rel="stylesheet" href="CSS/seguimiento-print.css" media="print">
	 <script language = "JavaScript">
			function confirmarEnvio(){
				var resultado = confirm("¿Deseas almacenar este seguimiento?");
				if(resultado == true){
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
				<a href="panelMedico.php"><img src="img/logotipo.png" alt="Logo"></a>
				<h1>Realizar Seguimiento</h1>
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
		<div class="btn-return">
				<a href="diagnosticoHecho.php">&lt;&lt; Regresar</a>
		</div>
		<form action="Funciones/generarSeguimiento.php" onsubmit="confirmarEnvio()" method="get">
			<div class="datosPersonales">
				<h3>Datos del paciente</h3>
				<p>Nombre: <input type="text" name="nombre" readonly value="<?php obtenerNombre($_SESSION['idPaciente'], $conection)?>"></p>
				<p>Fecha de Nacimiento: <input type="text" readonly value="<?php obtenerFechaNac($_SESSION['idPaciente'],$conection); ?>"></p>
				<p>Género: <input type="text" readonly value="<?php obtenerGenero($_SESSION['idPaciente'], $conection); ?>"></p>
				<p>Télefono: <input type="tel" readonly value="<?php obtenerTelefono($_SESSION['idPaciente'],$conection);?>"></p>
				<p>Correo Electrónico: <input readonly type="email" value="<?php obtenerCorreo($_SESSION['idPaciente'], $conection);?>"></p>
			</div>

			<div class="consulta-medica">
				<h3>Consulta médica de seguimiento</h3>
				<p>Fecha y Hora: <input type="text" readonly name="fechaHora" value="<?php generarDatosFecha() ?>"> </p>
				<p>Clínica: <input readonly type="text" name="clinica" value="<?php obtenerClinica($_SESSION['idUsuario'], $conection); ?>"></p>
				<p>Motivo de consulta: <input type="text" name="motivo" size="80rem"> </p>
			</div>

			<div class="Padecimiento">
				<h3>Padecimiento Actual</h3>
				<p>Padecimiento:</p>
				<textarea name="padecimiento" cols="130" rows="7"></textarea>
			</div>

			<div class="contenedor-expediente">
				<h3>Examen físico</h3>
				<div class="examen-fisico">
					<div class="seccion-exam">
					<h2>Signos vitales</h2>
						<p>Temperatura: <input type="text" name="temperatura" size="10"></p>
						<p>Frecuencia cardiaca: <input type="text" name="frecuncia-cardiaca" size="10"></p>
						<p>Frecuencia respiratoria: <input type="text" name="frecuncia-respiratoria" size="10"></p>
						<p>Presión arterial: <input type="text" name="presion-arterial" size="10"></p>
						<p>Saturación de oxígeno: <input type="text" name="saturacion" size="10"></p>
					</div>
					<div class="seccion-exam">
						<h2>Datos antropométricos</h2>
							<p>Altura: <input type="text" name="altura" size="10"> </p>
							<p>Peso: <input type="text" name="peso" size="10"> </p>
							<p>IMC: <input type="text" name="imc" size="10"> </p>

					</div>

				</div>
				<p>Examen físico </p>
					<textarea name="examenFisico" id="" cols="110" rows="10"></textarea>
				<div class="evaluacion">
					<h3>Evaluación</h3>
						<p id="evaluacion">Impresión diagnóstica: <input type="text" name="exam" size="80" ></p>
				</div>

				<div class="observaciones">
					<h3>Observaciones</h3>
						<p id="observacion">Notas: <input type="text" name="notas" size="50" ></p>

				</div>
					<p class="botones"s>
						<input type="submit" value="Guardar" >
					</p>

			</div>
		</form>
	</main>

	<footer class="footer-site seccion"></footer>

</body>
</html>