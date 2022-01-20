<?php 
include 'Funciones/Funciones.php';
require_once 'Funciones/conexion.php';
if(isset($_GET['selector'])){
	header('location: Funciones/cerrarSesion.php');
}
if(isset($_GET['buscarl'])){

}
$_SESSION['idVenta'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Venta</title>
	 <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	 <link rel="stylesheet" href="CSS/normalize.css">
	 <link rel="stylesheet" href="CSS/ventas.css">
	 <link rel="stylesheet" href="CSS/estiloticket.css" media="print">
</head>
<body>

	<header class="site-header">
		<div class="contenedor">
			<div class="barra">
				<a href="panelFarmacia.php"><img src="img/logotipo.png" alt="Logo"></a>
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
	
	<main class="seccion-contenedor">
		<div class="contenedor">
		    <div class="medicamento">
                    <p>
                    <input placeholder="Buscar medicamentos" id="caja_busqueda" type="text" name="busquedamedicamento" size="30rem">
                    </p>
                    <div class="tabla">

                    </div>
            </div>

		    
		    <div class="listaVenta">
                <p><b>LISTA DE VENTA</b></p>              
                    <div class="tabla2"> 
                        
                    </div>
        
            </div>
            
		    <div class="botones">
		    <p class="finalizar"><input style="margin-top: 3rem;" type="button" value="FINALIZAR VENTA" onclick="window.print()"></p>
            </div>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/peticion.js"></script>
	</main>
<footer class="footer-site"></footer>
</body>
</html>