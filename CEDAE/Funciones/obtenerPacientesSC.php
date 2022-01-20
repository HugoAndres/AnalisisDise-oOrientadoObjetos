<?php 
require "conexion.php";

if(isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
    $table = "";
    $paciente = mysqli_real_escape_string($conection, $nombre);
    $resultado = mysqli_query($conection, "SELECT *FROM paciente WHERE nombre LIKE '%".$paciente."%' OR apellidoPaterno LIKE '%".$paciente."%'");
    $table .= '<div class = "container">';
    $table .= '<table><thead><tr><th>Nombre</th><th>Fecha de registro</th><th>Generar cuenta</th><th>Eliminar paciente</th></tr></thead>';
    while($fila = mysqli_fetch_assoc($resultado)){
        $table .= '<tr>';
        $table .= '<td>'. $fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno'].'</td>';
        $table .= '<td>'. $fila['fechaRegistro'].'</td>';
        $table .= '<td><input id="'.$fila['idPaciente'].'" type = "button" onclick = "generarCuenta('.$fila['idPaciente'].')" value = "Generar cuenta" class = "btn btn-green"></td>';
        $table .= '<td><input id="'.$fila['idPaciente'].'" type = "button" onclick = "eliminarUsuario('.$fila['idPaciente'].')" value = "Eliminar paciente" class = "btn btn-red"></td>';
        $table .= '</tr>';
    }        
    $table .= '</table>';
    echo $table;
    mysqli_close($conection);
}else{
    mostrarUsuarios();
}
    function mostrarUsuarios(){
        require "conexion.php";
        $table = "";
        $resultado = mysqli_query($conection, "SELECT *FROM paciente WHERE confirmado = 0");
        $table .= '<div class = "container">';
        $table .= '<table><thead><tr><th>Nombre</th><th>Fecha de registro</th><th>Generar cuenta</th><th>Eliminar paciente</th></tr></thead>';
        while($fila = mysqli_fetch_assoc($resultado)){
            $table .= '<tr>';
            $table .= '<td>'. $fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno'].'</td>';
            $table .= '<td>'. $fila['fechaRegistro'].'</td>';
            $table .= '<td><input id="'.$fila['idPaciente'].'" onclick = "generarCuenta('.$fila['idPaciente'].')" type = "button" value = "Generar cuenta" class = "btn btn-green"></td>';
            $table .= '<td><input id="'.$fila['idPaciente'].'" onclick = "eliminarUsuario('.$fila['idPaciente'].')" type = "button" value = "Eliminar paciente" class = "btn btn-red"></td>';
            $table .= '</tr>';
        }
        $table .= '</table>';
        echo $table;
    
        mysqli_close($conection);
    }
    if(isset($_GET['usuariocuenta'])){
        $id = $_GET['usuariocuenta'];
        $query = mysqli_query($conection, "SELECT apellidoPaterno, apellidoMaterno FROM paciente WHERE idPaciente = '$id'");
        $result = mysqli_fetch_row($query);
        $usuario = $result[0].$result[1].rand(10,100);
        $password = "1234";
        $query = mysqli_query($conection, "INSERT iNTO usuario(nombreUsuario,clave,tipoUsuario) VALUES ('$usuario', $password, 3)");
        $query = mysqli_query($conection, "SELECT idUsuario FROM usuario ORDER BY idUsuario DESC LIMIT 1");
        $result = mysqli_fetch_row($query);
        $idUser = $result[0];
        $query = mysqli_query($conection,"UPDATE paciente SET idUsuario = '$idUser', confirmado = 1 WHERE idPaciente = '$id'");
        mysqli_close($conection);
    }

    if(isset($_GET['usuarioIDEliminado'])){
        $id = $_GET['usuarioIDEliminado'];
        $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente = '$id'");
        $result = mysqli_fetch_row($resultado);
        $idhistorial = $result[0];
        $query = mysqli_query($conection, "DELETE FROM diagnostico WHERE idHistorial = '$idhistorial'");
        $query = mysqli_query($conection, "DELETE FROM historialclinico WHERE idPaciente = '$id'");
        $query = mysqli_query($conection, "DELETE FROM paciente WHERE idPaciente = '$id'");
        mysqli_close($conection);
    }

?>
