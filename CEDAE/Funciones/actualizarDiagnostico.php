<?php 
    include_once('conexion.php');
    session_start();
    //Se almacenan las variables para un manejo mas sencillo
    $id = $_SESSION['idDiagnostico'];
    $fecha = $_GET['fecha'];
    $topografia = $_GET['topografia'];
    $morfologia = $_GET['morfologia'];
    $pielanexos = $_GET['piel'];
    $diagnostico = $_GET['diagnostico'];
    $cie = $_GET['cie'];
    $descripcion = $_GET['descripcion'];
    $tratamiento = $_GET['tratamiento'];
    $notaCobro = $_GET['notaCobro'];

    $query = mysqli_query($conection, "UPDATE diagnostico SET topografia = '$topografia', morfologia = '$morfologia', pielAnexos = '$pielanexos', diagnostico = '$diagnostico', fechaHora = '$fecha',cie = '$cie', descripcion = '$descripcion', tratamiento = '$tratamiento', notaCobro = '$notaCobro' , diagnosticada = 1 WHERE idDiagnostico = '$id'");
    if($query == true){
        ?>
        <script language = "JavaScript"> alert("Se han actualizado los campos"); </script>
        <?php
        header('location: ../diagnosticoHecho.php');
    }else{
        ?>
        <script language = "JavaScript"> alert("Se han actualizado los campos"); </script>
        <?php
        header('location: ../diagnosticoHecho.php');
    }
?>