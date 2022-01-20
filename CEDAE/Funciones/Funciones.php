<?php 
session_start();

function obtenerDatos($id, $conection, $usuario){
    $query = mysqli_query($conection, "SELECT * FROM $usuario WHERE idUsuario = '$id'");
    $result = mysqli_num_rows($query);
    if($result > 0){
        $valores = mysqli_fetch_array($query);
        $_SESSION['nombre'] = $valores['nombre'];
        $_SESSION['apellidoPaterno'] = $valores['apellidoPaterno'];
        $_SESSION['apellidoMaterno'] = $valores['apellidoMaterno'];
    }else{
        echo "Error en la busqueda";
    }
}

function obtenederDatosPaciente($id, $conection, $usuario){
    $query = mysqli_query($conection, "SELECT * FROM $usuario WHERE idUsuario = '$id'");
    $result = mysqli_num_rows($query);
    if($result > 0){
        $valores = mysqli_fetch_array($query);
        $_SESSION['idPaciente'] = $valores['idPaciente'];
        $_SESSION['nombre'] = $valores['nombre'];
        $_SESSION['apellidoPaterno'] = $valores['apellidoPaterno'];
        $_SESSION['apellidoMaterno'] = $valores['apellidoMaterno'];
    }else{
        echo "Error en la busqueda";
    }
}

function obtenerExpedientes($conection){
    $query = mysqli_query($conection, "SELECT *FROM historialclinico");
    $result =  mysqli_num_rows($query);
    if($result > 0){
        echo "<h2> Hay $result expediente(s) por mostrar </h2>";
            while($row = mysqli_fetch_array($query)){
                $idHistorial = $row['idHistorial'];
                $query2 = mysqli_query($conection,"SELECT idPaciente FROM historialclinico WHERE idHistorial = $idHistorial");
                $result = mysqli_fetch_row($query2);
                $idPaciente = $result[0];
                $query3 = mysqli_query($conection,"SELECT nombre, apellidoPaterno, apellidoMaterno, fechaRegistro FROM paciente WHERE idPaciente = $idPaciente");
                $result = mysqli_fetch_row($query3);
                $nombreCom = $result[0]." ".$result[1]." ".$result[2];
                $fechareg = $result[3];
                echo '<div class = "cuadro-expediente">';?>
                <?php 
                echo '<div class = "idExpediente">'; 
                echo "<p>Numero de expediente: ".$idHistorial."</p>";
                echo "</div>";
                ?>
                <div class="Informacion">
                    <a href="visualizarExpediente.php?idHistorial=<?php echo "$idHistorial";?>&idPaciente=<?php echo "$idPaciente" ?>"><?php echo $nombreCom ?></a><br>
                    <h3><?php echo "Fecha de registro: ". $fechareg; ?></h3>
                </div>
                <?php
                echo "</div>";
            }
    }else{
        echo "<h2> Aún no se han generado expedientes </h2>";
    }
}
function obtenerMedicamentosCaducando($conection){
    $query = mysqli_query($conection, "SELECT *FROM unidades");
    $tiempo = getdate();
    $fechadia = gregoriantojd($tiempo['mon'],$tiempo['mday'],$tiempo['year']);
    while($result = mysqli_fetch_row($query)){
        $fechaproducto = explode("-",$result[2]);
        $fechaprodgreg =gregoriantojd($fechaproducto[1],$fechaproducto[2],$fechaproducto[0]);
        if(($fechaprodgreg-$fechadia) <= 119){
            echo '<tr>
            <td>'.$result[4].'</td>
            <td>'.$result[5].'</td>
            <td>'.$result[2].'</td>        
        </tr>';
        }
    }
}

function obtenerConsultas($idHistorial, $conection){
    $query = mysqli_query($conection, "SELECT *FROM diagnostico WHERE idHistorial = '$idHistorial' ORDER BY  idDiagnostico DESC ");
    while($result = mysqli_fetch_array($query)){
        echo '<div class = "cuadro-consulta">';?>
        <h4>Motivo de consulta:  <?php echo $result['motivoConsulta']; ?></h4>
        <?php
        if($result['diagnosticada'] == 0){
            ?>
            <a href="diagnostico.php?idDiagnostico=<?php echo "$result[idDiagnostico];"?>">Realizar Diagnostico</a>
            <?php
        }else{
            ?>
            <a href="diagnosticoHecho.php?idDiagnostico=<?php echo "$result[idDiagnostico]"?>">Visualizar Diagnostico</a>
            <?php
        } 
        echo "</div>";
    }
}

function obtenerConsultaspaciente($idHistorial, $conection){
    $query = mysqli_query($conection, "SELECT *FROM diagnostico WHERE idHistorial = '$idHistorial' ORDER BY  idDiagnostico DESC ");
    while($result = mysqli_fetch_array($query)){
        echo '<div class = "cuadro-consulta">';?>
        <h4>Motivo de consulta:  <?php echo $result['motivoConsulta']; ?></h4>
        <?php
        if($result['diagnosticada'] == 0){
            ?>
            <p>El diágnostico no se ha realizado</p>
            <?php
        }else{
            ?>
            <a href="diagnosticoHechopaciente.php?idDiagnostico=<?php echo "$result[idDiagnostico]"?>">Visualizar Diagnostico</a>
            <?php
        } 
        echo "</div>";
    } 
}

function obtenerRecetas($id, $conection){
    $query = mysqli_query($conection, "SELECT *FROM receta WHERE idDiagnostico = '$id'");
    $i = 1;
    while($result1 = mysqli_fetch_array($query)){
        $idreceta = $result1['idReceta'];
        ?>
            <div class="recuadro-receta">
                <h2>Receta #<?php echo $i; ?></h2>
                <?php 

                ?>
                <a href="receta.php?idReceta=<?php echo $idreceta?>">Editar/Visualizar</a>
                <a href="Funciones/Eliminareceta.php?idReceta=<?php echo $idreceta?>">Eliminar</a>
            </div>
        <?php
        $i++;
    }
}

function obtenerTratamientos($id,$conection){
    $query = mysqli_query($conection, "SELECT *FROM tratamiento WHERE idReceta = '$id'");
    while ($result = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $result['nombreMedicamento']; ?></td>
            <td><?php echo $result['intervalo']; ?></td>
            <td><?php echo $result['cantidad']; ?></td>
            <td><?php echo $result['duracion']; ?></td>
            <td><?php echo $result['notas']; ?></td>
        </tr>
        <?php
    }
}

function obtenerOpcionesmedico($conection){
    $query = mysqli_query($conection, "SELECT *FROM medico");
    while($result = mysqli_fetch_row($query)){
        $opc = "";
        $opc .= '<option value="">';
        $opc .= $result[2]." ".$result[3]." ".$result[4];
        $opc .= '</option>';
        echo $opc;
    }
}

function verificarAlmacen($nombre, $conection){
    $query = mysqli_query($conection, "SELECT stock FROM medicamento WHERE nombre = '$nombre'");
    $result = mysqli_fetch_row($query);
    if($result[0] > 0){
        ?>
        <script language = "JavaScript"> alert("El medicamento se encuentra disponible en Farmacia"); </script>
        <?php
    }else{
        ?>
        <script language = "JavaScript"> alert("No se dipone del medicamento en este momento"); </script>
        <?php
    }  
}

function agregarMedicamento($idReceta, $nombre, $intervalo, $cantidad, $duracion, $notas, $conection){
    $query = mysqli_query($conection, "INSERT INTO tratamiento(idReceta, nombreMedicamento, intervalo, cantidad, duracion, notas) VALUES ('$idReceta', '$nombre', '$intervalo', '$cantidad', '$duracion', '$notas')");
    if($query == true){
        header('location: receta.php');
    }else{
        echo "Error";
    }
}

function obtenerNombre($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT nombre, apellidoPaterno, apellidoMaterno FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['nombre']." ".$result['apellidoPaterno']." ".$result['apellidoMaterno'];
}
function obtenerSoloNombre($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT nombre FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['nombre'];
}

function obtenerMedicoRec($idReceta,$conection){
    $query = mysqli_query($conection, "SELECT nombreMedico FROM receta WHERE idReceta = '$idReceta'");
    $result = mysqli_fetch_row($query);
    echo $result[0];
}

function obtenerSoloApellidoPat($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT apellidoPaterno FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['apellidoPaterno'];
}
function obtenerSoloApellidoMat($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT apellidoMaterno FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['apellidoMaterno'];
}
function obtenerGenero($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT genero FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['genero'];
}
function obtenerFechaNac($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT fechaNac FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['fechaNac'];
}
function obtenerCorreo($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT email FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['email'];
}
function obtenerTelefono($idPaciente,$conection){
    $query = mysqli_query($conection, "SELECT telefono FROM paciente WHERE idPaciente = '$idPaciente'");
    $result = mysqli_fetch_array($query);
    echo $result['telefono'];
}
function obtenerEstatura($idHistorial,$conection){
    $query = mysqli_query($conection, "SELECT estatura FROM diagnostico WHERE idHistorial = '$idHistorial' ORDER BY idDiagnostico DESC LIMIT 1");
    $result = mysqli_fetch_array($query);
    echo $result['estatura'];
}
function obtenerPeso($idHistorial,$conection){
    $query = mysqli_query($conection, "SELECT peso FROM diagnostico WHERE idHistorial = '$idHistorial' ORDER BY idDiagnostico DESC LIMIT 1");
    $result = mysqli_fetch_array($query);
    echo $result['peso'];
}

//Funciones para la obtención de los datos del historialClinico
function obtenerAlergias($idHistorial,$conection){
    $query = mysqli_query($conection, "SELECT alergias FROM historialClinico WHERE idHistorial = '$idHistorial'");
    $result = mysqli_fetch_array($query);
    echo $result['alergias'];
}
function obtenerAntHeredo($idHistorial, $conection){
    $query = mysqli_query($conection, "SELECT antecedentesHeredofamiliares FROM historialclinico WHERE idHistorial = '$idHistorial'");
    $result = mysqli_fetch_array($query);
    echo $result['antecedentesHeredofamiliares'];
}
function obtenerAntPP($idHistorial,$conection){
    $query = mysqli_query($conection, "SELECT antecedentesPatologicos FROM historialclinico WHERE idHistorial = '$idHistorial'");
    $result = mysqli_fetch_array($query);
    echo $result['antecedentesPatologicos'];
}

function obtenerClinica($idMedico, $conection){
    $query = mysqli_query($conection, "SELECT idClinica FROM medico WHERE idMedico = '$idMedico'");
    $result = mysqli_fetch_row($query);
    $idConsulta = $result[0];   //Consultorio del médico
    $query = mysqli_query($conection, "SELECT sucursal FROM sucursal WHERE idSucursal = '$idConsulta'"); 
    $result = mysqli_fetch_row($query);
    $nombreClinica = $result[0];
    echo $nombreClinica;
}
//Funciones para la obtención de los datos de la consulta
function generarDatosFecha(){
    date_default_timezone_set("America/Mexico_City");	
    $hoy = getdate();
    setlocale(LC_ALL,"es_MX");
    $fechahoy = $hoy['mday']."/".$hoy['mon']."/".$hoy['year']."     ".date("h").":".date("i").date("a");
    echo $fechahoy;
}
function obtenerPesoDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT peso FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['peso'];
}
function obtenerEstaturaDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT estatura FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['estatura'];
}
function obtenerPresionartDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT presionArterial FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['presionArterial'];
}
function obtenerFrecuenciacarDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT frecuenciaCardiaca FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['frecuenciaCardiaca'];
}
function obtenerFrecuenciarespDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT frecuenciaRespiratoria FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['frecuenciaRespiratoria'];
}
function obtenerTemperaturaDiag($id, $conection){
    $query = mysqli_query($conection, "SELECT temperatura FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['temperatura'];
}
function obtenerMorfologia($id,$conection){
    $query = mysqli_query($conection, "SELECT morfologia FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['morfologia'];
}
function obtenerTopografia($id,$conection){
    $query = mysqli_query($conection, "SELECT topografia FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['topografia'];
}
function obtenerPielAnexos($id,$conection){
    $query = mysqli_query($conection, "SELECT pielAnexos FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['pielAnexos'];
}
function obtenerDiagnostico($id,$conection){
    $query = mysqli_query($conection, "SELECT diagnostico FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['diagnostico'];
}
function obtenerCIE($id,$conection){
    $query = mysqli_query($conection, "SELECT cie FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['cie'];
}
function obtenerDescripcion($id,$conection){
    $query = mysqli_query($conection, "SELECT descripcion FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['descripcion'];
}
function obtenerTratamiento($id, $conection){
    $query = mysqli_query($conection, "SELECT tratamiento FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['tratamiento'];
}
function obtenerNotaCobro($id,$conection){
    $query = mysqli_query($conection, "SELECT notaCobro FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['notaCobro'];
}
function obtenerFechaDiag($id,$conection){
    $query = mysqli_query($conection, "SELECT fechaHora FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['fechaHora'];
}
function obtenerMotivoConsulta($id,$conection){
    $query = mysqli_query($conection, "SELECT motivoConsulta FROM diagnostico WHERE idDiagnostico = '$id'");
    $result = mysqli_fetch_array($query);
    echo $result['motivoConsulta'];
}
function obtenerFechaRec($id,$conection){
    $query = mysqli_query($conection, "SELECT fecha FROM receta WHERE idReceta = '$id'");
    $result = mysqli_fetch_row($query);
    echo $result[0];
}
function obtenerNumExpediente($idPaciente, $conection){
    $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente = '$idPaciente'" );
    $result = mysqli_fetch_row($query);
    $_SESSION['idHistorial'] = $result[0];
    echo $result[0];
}
?>