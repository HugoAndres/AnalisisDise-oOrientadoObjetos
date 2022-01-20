<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['idPaciente'],$_GET['idHistorial'])){
    $_SESSION['idPaciente'] = $_GET['idPaciente'];
    $_SESSION['idHistorial'] = $_GET['idHistorial'];
}
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
?>

<html>
	<head>
		<title>Expediente Clinico</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/visualizarExpediente.css">
		
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
    
    <main class="contenedor">
        <p id="folio">Número de Expediente: <?php echo  $_SESSION['idHistorial']; ?></p>
        <form action="Funciones/actualizarInfo.php" class="Cuerpo" method="POST">
            <h3>Datos Personales</h3>
            <div class="formulario">
                <div class="col">
                     Primer nombre y apellidos<br>
                    <input type="text" name="nombre" value="<?php obtenerNombre($_SESSION['idPaciente'], $conection); ?>"><br>
                    <br>Fecha de Nacimiento<br>
                    <input type="date" name="fechanac" value="<?php obtenerFechaNac($_SESSION['idPaciente'], $conection);?>""><br>
                </div>
                <div class="col">
                    Género<br>
                    <input type="text" name="genero" value="<?php obtenerGenero($_SESSION['idPaciente'], $conection);?>"><br>
                    <br>Peso (Kg)<br>
                    <input type="text" name="peso" value="<?php obtenerPeso($_SESSION['idHistorial'], $conection);?>"><br>
                </div>
                <div class="col">
                    Estatura (cm)<br>
                    <input type="text" name="estatura" value="<?php obtenerEstatura($_SESSION['idHistorial'], $conection);?>"><br>
                    <br>Correo Electrónico<br>
                    <input type="email" name="email" value="<?php obtenerCorreo($_SESSION['idPaciente'], $conection);?>"><br>
                </div>
                 <div class="col">
                     Teléfono<br>
                    <input type="tel"  name="tel" value="<?php obtenerTelefono($_SESSION['idPaciente'], $conection);?>"><br>
                 </div>
            </div>

            <h3>Historial Clínico</h3>
            <div class="cuerpo2">
               <div class="col2">
                    Alergias <br>
                    <textarea rows="5" cols="40" name="alergias"><?php obtenerAlergias($_SESSION['idHistorial'], $conection);?></textarea><br>
                </div>
                <div class="col2">
                    Antecedentes Heredofamiliares<br>
                    <textarea rows="5" cols="40" type="text"  name="heredofam"><?php obtenerAntHeredo($_SESSION['idHistorial'], $conection);?></textarea><br>
                </div>
                <div class="col2">
                    Antecedentes Personales Patolológicos<br>
                    <textarea rows="5" cols="40"  name="personalpat"><?php obtenerAntPP($_SESSION['idHistorial'], $conection);?></textarea><br>
                </div>
            </div>
            <div class="consulta">
            <a href="altaExpediente-medico-consulta" style="text-decoration: none; padding: 1rem; background-color: #8BF7FF; color:black;">Realizar nueva consulta</a>
            </div>
            <div class="boton">
            <input type="submit" name="guardar" value="Guardar" class="btn">;
            </div>
            <div>
                <h3>Historial de visitas</h3>
                <?php obtenerConsultas($_SESSION['idHistorial'], $conection);?>
            </div>

        </form>
    </main>
    <footer class="footer-site seccion"></footer>
	</body>
</html>