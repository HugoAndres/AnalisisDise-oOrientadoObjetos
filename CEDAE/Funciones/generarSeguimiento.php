<?php
    session_start();
    include_once('conexion.php');

    $idDiagnostico = $_SESSION['idDiagnostico'];
    $fechaHora = $_GET['fechaHora'];
    $idMedico = $_SESSION['idUsuario'];
    $clinica = $_GET['clinica'];
    $motivoConsulta = $_GET['motivo'];
    $padecimiento = $_GET['padecimiento'];
    $temperatura = $_GET['temperatura'];
    $frecuenciaCar = $_GET['frecuncia-cardiaca'];
    $frecuenciaRes = $_GET['frecuncia-respiratoria'];
    $presionArt = $_GET['presion-arterial'];
    $saturacionOxigeno = $_GET['saturacion'];
    $altura = $_GET['altura'];
    $peso = $_GET['peso'];
    $imc = $_GET['imc'];
    $examenFisico = $_GET['examenFisico'];
    $impresionDiag = $_GET['exam'];
    $notas = $_GET['notas'];

    $query = mysqli_query($conection, "INSERT INTO seguimiento(idDiagnostico, fechaHora, clinica, motivoConsulta, Padecimiento, temperatura, frecuenciaCar, frecuenciaRes, presionArterial, saturacionOxigeno, altura, peso, IMC, examenFisico, impresionDiag, notas) VALUES ('$idDiagnostico', '$fechaHora', '$clinica', '$motivoConsulta', '$padecimiento', '$temperatura', '$frecuenciaCar', '$frecuenciaRes', '$presionArt', '$saturacionOxigeno', '$altura', '$peso', '$imc', '$examenFisico', '$impresionDiag', '$notas')");
    if($query == true){
        header('location: ../diagnosticoHecho.php');
    }else{
        echo "Error";
    }
    
    
?>