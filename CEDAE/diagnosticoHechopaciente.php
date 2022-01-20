<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['idDiagnostico'])){
    $_SESSION['idDiagnostico'] = $_GET['idDiagnostico'];
}
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Diagnóstico</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/diagnostico.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/diagnostico_print.css" media="print">

		<script language = "JavaScript">
			function confirmarEnvio(){
				var resultado = confirm("¿Seguro que desea modificar los datos?");
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
			<div class="btn-return">
				<a href="visualizarExpediente-paciente.php">&lt;&lt; Regresar</a>
			</div>
			<p>Motivo de consulta: <?php obtenerMotivoConsulta($_SESSION['idDiagnostico'], $conection); ?></p>
			<form action="Funciones/actualizarDiagnostico.php" onsubmit="confirmarEnvio()">
				<div class="seccion-dia">
					<div class="fecha">
						<label for="fecha">Fecha: </label>
						<input type="text" name="fecha" size="30" readonly value="<?php obtenerFechaDiag($_SESSION['idDiagnostico'], $conection); ?>">
					</div>
					<div class="medico">
						<label for="doctor">Atendió:</label>
						<input type="text" name="doctor" size="35" value="Dr(a). <?php echo $_SESSION['nombre']." ".$_SESSION['apellidoPaterno']." ".$_SESSION['apellidoMaterno'];?>" readonly>

					</div>
				</div>

				<div class="seccion-diagnostico">
					<div>
						<table>
							<tr>
								<td>Peso (Kg)</td>
								<td>Estatura (cm)</td>
								<td>Presión Arterial(mmhg)</td>
								<td>Frecuencia cardiaca (lpm)</td>
							</tr>
							<tr>
								<td><input type="text" name="peso" size="15" value="<?php obtenerPesodiag($_SESSION['idDiagnostico'],$conection); ?>"></td>
								<td><input type="text" name="estatura" size="15" value="<?php obtenerEstaturadiag($_SESSION['idDiagnostico'],$conection); ?>"></td>
								<td><input type="text" name="presionA" size="15" value="<?php obtenerPresionartdiag($_SESSION['idDiagnostico'],$conection); ?>"></td>
								<td><input type="text" name="frecuencia" size="15" value="<?php obtenerFrecuenciacardiag($_SESSION['idDiagnostico'],$conection); ?>" ></td>
							</tr>
							<tr>
								<td>Frecuencia resp. (rpm)</td>
								<td>Temperatura (°C)</td>
							</tr>
							<tr>
								<td><input type="text" name="frecuenciaR" size="15" value="<?php obtenerFrecuenciarespdiag($_SESSION['idDiagnostico'],$conection); ?>"></td>
								<td><input type="text" name="temp" size="15" value="<?php obtenerTemperaturadiag($_SESSION['idDiagnostico'],$conection); ?>"></td>
							</tr>
						</table>
						<table>
							<tr>
								<td>Topografía</td>
							</tr>
							<tr>
								<td><input type="text" name="topografia" size="70" value="<?php obtenerTopografia($_SESSION['idDiagnostico'],$conection); ?>"></td>
							</tr>
							<tr>
								<td>Morfología</td>
							</tr>
							<tr>
								<td>
									<textarea name="morfologia" id="morfologia" cols="80" rows="7"><?php obtenerMorfologia($_SESSION['idDiagnostico'],$conection); ?></textarea>
								</td>
							</tr>
							<tr>
								<td>Piel y Anexos</td>
							</tr>
							<tr>
								<td><input type="text" name="piel" size="30" value="<?php obtenerPielAnexos($_SESSION['idDiagnostico'],$conection); ?>"></td>
							</tr>
						</table>
					</div>
					<div class="imagen">
							<img src="img/cuerpo.jpg" alt="Imagen cuerpo">
					</div>
				</div>
				<div class="diagnostico">
						<table>
							<tr>
								<td>Diagnóstico</td>
								<td>CIE</td>
								<td>Descripción</td>
							</tr>
							<tr>
								<td><input type="text" name="diagnostico" size="50" value="<?php obtenerDiagnostico($_SESSION['idDiagnostico'],$conection); ?>"></td>
								<td><input type="text" name="cie" size="30" value="<?php obtenerCIE($_SESSION['idDiagnostico'],$conection); ?>" ></td>
								<td><input type="text" name="descripcion" size="30" value="<?php obtenerDescripcion($_SESSION['idDiagnostico'],$conection); ?>" ></td>
							</tr>
						</table>
						<label for="tratamiento">Protocolo de tratamiento</label><br>
						<textarea name="tratamiento" cols="100" rows="10"><?php obtenerTratamiento($_SESSION['idDiagnostico'], $conection); ?></textarea><br><br>
						<label for="tratamiento">Nota de cobro</label><br>
						<input type="text" name="notaCobro" size="70" value="<?php obtenerNotaCobro($_SESSION['idDiagnostico'], $conection); ?>"><br>
				</div>
			</form>
			<?php obtenerRecetas($_SESSION['idDiagnostico'], $conection); ?>
			<div class="funciones">
				<button class="btn" id="btn_Imprimir" onclick="window.print()">Imprimir</button>
			</div>
		</main>
		<footer class="footer-site seccion"></footer>
	</body>
</html>