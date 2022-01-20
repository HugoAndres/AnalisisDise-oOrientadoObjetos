<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['idReceta'])){
    $_SESSION['idReceta'] = $_GET['idReceta'];
}
if(isset($_POST['verificar'])){
    verificarAlmacen($_POST['nombreMedicina'], $conection);
    unset($_POST['verificar']);
}
if(isset($_POST['agregar'])){
    agregarMedicamento($_SESSION['idReceta'],$_POST['nombreMedicina'], $_POST['intervalo'], $_POST['cantidad'], $_POST['duracion'], $_POST['notas'], $conection);
}
?>
<html>
	<head>
		<title>Generar Receta</title>
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/receta.css">
        <link rel="stylesheet" type="text/css" href="css/receta-print.css" media="print">
    </head>
    <body>
		<header class="site-header">
			<div class="contenedor">
				<div class="barra">
					<a href="panelMedico.php"><img src="img/logotipo.png" alt="Logo">
						</a>
						<h1>Receta Individual</h1>
					<div class="encabezado">
						<div class="enc1"><p>Fecha: <?php obtenerFechaRec($_SESSION['idReceta'], $conection); ?></p></div>
                        <div class="enc2"><p>Número de receta: <?php echo $_SESSION['idReceta']; ?></p></div>
                        <div class="enc3"><p>CEDAE SATELITE</p></div>
                        <div class="enc4"> <p>No. Expediente: <?php echo $_SESSION['idHistorial']; ?></p></div>
					</div>
				</div>
			</div>
		</header>

        <main class="Cuerpo contenedor">
            <div class="btn-return">
				<a href="visualizarExpediente.php">&lt;&lt; Regresar</a>
			</div>
            <form action="" method="POST">
                <div class="datos">
                    <table>
                        <tr>
                            <th>Nombre del Paciente: </th>
                            <th><input type="text" name="nombrePaciente" readonly value="<?php obtenerSoloNombre($_SESSION['idPaciente'],$conection); ?>"></th>
                            <th><input type="text" name="apellidoPaterno" readonly value="<?php obtenerSoloApellidoPat($_SESSION['idPaciente'], $conection); ?>"></th>
                            <th><input type="text" name="apellidoMaterno" readonly value="<?php obtenerSoloApellidoMat($_SESSION['idPaciente'], $conection); ?>" ></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Primer Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                        </tr>
                        <tr>
                            <th>Alergias: <?php obtenerAlergias($_SESSION['idHistorial'], $conection) ?> </th>
                        </tr>
                    </table>
                </div>
                <div class="datos2">
                    <table>
                        <tr>
                            <th>Nombre Medicamento</th>
                            <th>Intervalo</th>
                            <th>Cantidad</th>
                            <th>Duración</th>
                            <th>Notas</th>
                        </tr>
                        <?php obtenerTratamientos($_SESSION['idReceta'], $conection); ?>
                    </table>
                </div>

                <div class="datos3">

                    <div class="d001">
                        <p>Medicamento: <input type="text" name="nombreMedicina" placeholder="Ej. Paracetamol">  <input type="submit" name="verificar" value="Verificar Disponibilidad"></p>
                        <p>Intervalo: <input type="text" name="intervalo" placeholder="Ej. Cada 6 horas"></p>
                        <p>Cantidad: <input type="text" name="cantidad" placeholder="1 Pildora"><br><br></p>
                    </div>
                    <div class="d003">
                        <p>Duración: <input type="text" name="duracion" placeholder="Días"></p>
                        <p>Notas: <input type="text" name="notas" placeholder="Notas"></p>
                        <input type="submit" name="agregar" value="Agregar">
                    </div>
                </div>
            </form>   
        </main>


    <footer style="position: absolute; bottom: 0;" class="footer-site seccion">
        <p>Elaborado por: Dr(a). <?php obtenerMedicoRec($_SESSION['idReceta'],$conection); ?> </p>
    </footer>
	</body>
</html>