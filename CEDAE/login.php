<?php 
include 'Funciones/Funciones.php';
$alert = '';

if(!empty($_SESSION['active'])){
	header('location: panelMedico.php');
}else{
	if(!empty($_POST)){
		if(empty($_POST['usuario']) || empty($_POST['clave'])){
			$alert = "Uno de los campos está vacío";
		}else{
			require_once "Funciones/conexion.php";
			$user = $_POST['usuario'];
			$pass = $_POST['clave'];
			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE nombreUsuario = '$user' AND clave = '$pass'");
			$result = mysqli_num_rows($query);
			if($result > 0){
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['rol'] = $data['tipoUsuario'];
				$_SESSION['idUsuario'] = $data['idUsuario'];

				if($_SESSION['rol'] == 0){			//Administrador
					echo "Aun no disponible";		
				}
				if($_SESSION['rol'] == 1){			//Medico 
					header('location: panelMedico.php');
				}elseif($_SESSION['rol'] == 2){		//Medico Auxiliar
					header('location: panelMedicoAuxiliar.php');
				}elseif($_SESSION['rol'] == 3){		//Paciente
					header('location: panelPaciente.php');
				}elseif($_SESSION['rol'] == 4){		//Recepcionista
					header('location: panelRecepcion.php');
				}elseif($_SESSION['rol'] == 5){		//Farmacia
					header('location: panelFarmacia.php');
				} 		

			}else{
				$alert = 'El usuario o la clave son incorrectos';
				session_destroy();
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	 <link rel="stylesheet" href="css/normalize.css">
	 <link rel="stylesheet" href="css/login.css">
</head>
<body>

	<header class="site-header">
		<div class="contenedor">
			<div class="barra">
				<a href="pantallaInicial.php"><img src="img/logotipo.png" alt="Logo"></a>
			</div>
		</div>
	</header>

	<main class="seccion">
		<div class="contenedor-panel">
			<form action="" method="post" autocomplete="off">
				<h1>Iniciar Sesión</h1>
				<p id="mensaje"> <?php echo $alert;?> </p>
				<input type="text" name="usuario" class="campo user" placeholder="Usuario">
				<input type="password" name="clave" class="campo pass" placeholder="Contraseña">
				<a href="#">¿Olvidaste tu usuario o contraseña?</a><br><br>
				<input type="submit" value="Ingresar" id="boton">
			</form>
		</div>
	</main>
</body>
</html>