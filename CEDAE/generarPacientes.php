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
	    <link rel="stylesheet" href="css/buscarPacienteSC.css">
	</head>
	<body onload="mostrarClientes()">
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
					<p>
						<input autocomplete="OFF" type="text" name="buscarpaciente" placeholder="Buscar con nombre" class="text" onkeyup ="buscarUsuario(this.value);">
					</p>
			</div>

			<div class="seccionpacientes">
				
			</div>
		</main>
		<footer class="footer-site seccion"></footer>

		<script type="text/javascript">
			var resultado = document.querySelector(".seccionpacientes");

			function mostrarClientes(){
				var xmlhttp;
				if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				}else{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
						resultado.innerHTML = xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET", "Funciones/obtenerPacientesSC.php", true);
				xmlhttp.send();
			}

			function buscarUsuario(nombre){
				var xmlhttp;
				if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				}else{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
						resultado.innerHTML = xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET", "Funciones/obtenerPacientesSC.php?nombre=" + nombre, true);
				xmlhttp.send();

			}

			

			function eliminarUsuario(usuarioID){
				var respuesta = confirm("¿Estás seguro de querer eliminar al paciente?");

				if(respuesta == true){
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState === 4 && this.status === 200){
							mostrarClientes();
						}
					}
					xmlhttp.open("GET", "Funciones/obtenerPacientesSC.php?usuarioIDEliminado=" + usuarioID);
					xmlhttp.send();
					window.update();
				}
			}

			function generarCuenta(usuarioID){
				var respuesta =  confirm("¿Seguro que desea generar la cuenta del paciente?");
				var xmlhttp;

				if(respuesta == true){
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function(){
						if(this.readyState === 4 && this.status === 200){
							mostrarClientes();
						}
					}
					xmlhttp.open("GET", "Funciones/obtenerPacientesSC.php?usuariocuenta=" + usuarioID);
					xmlhttp.send();
				}
			}

		</script>
	</body>
</html>	