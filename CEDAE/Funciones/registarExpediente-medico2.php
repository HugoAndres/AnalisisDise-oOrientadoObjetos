<?php 
    include_once('conexion.php');
    //Datos del paciente 
    $hoy = getdate();
    $fechahoy = $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];
    $nombre = explode(" ", $_POST['nombre']);
    $email = $_POST['email'];
    $fechanac = $_POST['fechaNac'];
    $genero = $_POST['genero'];
    $telefono = $_POST['tel'];
    //Datos para la tabla de historial
    $alergias = $_POST['alergias'];
    $anthf = $_POST['antHF'];
    $antpp = $_POST['antPP'];

    //Datos del diagnostico
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $presion  =$_POST['presion'];
    $freccar = $_POST['frecuencia'];
    $frecres = $_POST['frecresp'];
    $temperatura = $_POST['temperatura'];
    $motivo = $_POST['motivo'];


    $query = mysqli_query($conection,"SELECT * FROM paciente where nombre = '$nombre[0]' AND apellidoPaterno = '$nombre[1]' AND apellidoMaterno = '$nombre[2]'");
    $result = mysqli_num_rows($query);

    if($result > 0){
        $data = mysqli_fetch_array($query);
        $idPaciente = $data['idPaciente'];
        $query = mysqli_query($conection, "UPDATE paciente SET nombre = '$nombre[0]', apellidoPaterno = '$nombre[1]', apellidoMaterno = '$nombre[2]', fechaNac = '$fechanac',fechaRegistro = '$fechahoy' ,email = '$email', telefono = '$telefono', genero = '$genero' WHERE idPaciente ='$idPaciente'");
        if($query == true){
            //Se verifica la posible existencia del historial Clinico
            $query = mysqli_query($conection, "SELECT *FROM historialclinico WHERE idPaciente = '$idPaciente'");
            $result = mysqli_num_rows($query);
            if($result > 0){
                $query = mysqli_query($conection, "UPDATE historialclinico SET antecedentesPatologicos = '$antpp', alergias = '$alergias', antecedentesHeredofamiliares = '$anthf' WHERE idPaciente = '$idPaciente'");
                if($query == true){
                    $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente ='$idPaciente'");
                    if($query == true){
                        $result = mysqli_fetch_row($query);
                        $idHistorial = $result[0];
                        $query = mysqli_query($conection, "INSERT INTO diagnostico (idHistorial, peso, estatura, presionArterial, frecuenciaCardiaca, frecuenciaRespiratoria, temperatura, motivoConsulta) VALUES ('$idHistorial', '$peso', '$estatura', '$presion', '$freccar', '$frecres', '$temperatura', '$motivo')");
                        if($query == true){
                            ?> <script>alert("Se han almacenado los datos correctamente")</script><?php
                            header('location: ../visualizarExpediente.php');
                        }
                    }
                }
            }else{  //Si el historial no existe se crea.
                $query = mysqli_query($conection, "INSERT INTO historialclinico (idPaciente, antecedentesPatologicos, alergias, antecedentesHeredofamiliares) VALUES ('$idPaciente', '$antpp', '$alergias', '$anthf')");
                if($query == true){
                    $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente ='$idPaciente'");
                    if($query == true){
                        $result = mysqli_fetch_row($query);
                        $idHistorial = $result[0];
                        $query = mysqli_query($conection, "INSERT INTO diagnostico (idHistorial, peso, estatura, presionArterial, frecuenciaCardiaca, frecuenciaRespiratoria, temperatura, motivoConsulta) VALUES ('$idHistorial', '$peso', '$estatura', '$presion', '$freccar', '$frecres', '$temperatura', '$motivo')");
                        if($query == true){
                            ?> <script>alert("Se han almacenado los datos correctamente")</script><?php
                            header('location: ../visualizarExpediente.php');
                        }
                    }
                }
            }

        }
    }else{
        $query = mysqli_query($conection,"INSERT INTO paciente (nombre,apellidoPaterno,apellidoMaterno,email,telefono,fechaNac,genero,fechaRegistro) VALUES ('$nombre[0]', '$nombre[1]', '$nombre[2]', '$email', '$telefono','$fechanac','$genero','$fechahoy')");
        if($query == true){
            $query = mysqli_query($conection,"SELECT * FROM paciente where nombre = '$nombre[0]' AND apellidoPaterno = '$nombre[1]' AND apellidoMaterno = '$nombre[2]'");
            $result = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);
            $idPaciente = $data['idPaciente'];
            $query = mysqli_query($conection, "SELECT *FROM historialclinico WHERE idPaciente = '$idPaciente'");
            $result = mysqli_num_rows($query);
            if($result > 0){
                $query = mysqli_query($conection, "UPDATE historialclinico SET antecedentesPatologicos = '$antpp', alergias = '$alergias', antecedentesHeredofamiliares = '$anthf' WHERE idPaciente = '$idPaciente'");
                if($query == true){
                    $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente ='$idPaciente'");
                    if($query == true){
                        $result = mysqli_fetch_row($query);
                        $idHistorial = $result[0];
                        $query = mysqli_query($conection, "INSERT INTO diagnostico (idHistorial, peso, estatura, presionArterial, frecuenciaCardiaca, frecuenciaRespiratoria, temperatura, motivoConsulta) VALUES ('$idHistorial', '$peso', '$estatura', '$presion', '$freccar', '$frecres', '$temperatura', '$motivo')");
                        if($query == true){
                            ?> <script>alert("Se han almacenado los datos correctamente")</script><?php
                            header('location: ../visualizarExpediente.php');
                        }
                    }
                }
            }else{  //Si el historial no existe se crea.
                $query = mysqli_query($conection, "INSERT INTO historialclinico (idPaciente, antecedentesPatologicos, alergias, antecedentesHeredofamiliares) VALUES ('$idPaciente', '$antpp', '$alergias', '$anthf')");
                if($query == true){
                    $query = mysqli_query($conection, "SELECT idHistorial FROM historialclinico WHERE idPaciente ='$idPaciente'");
                    if($query == true){
                        $result = mysqli_fetch_row($query);
                        $idHistorial = $result[0];
                        $query = mysqli_query($conection, "INSERT INTO diagnostico (idHistorial, peso, estatura, presionArterial, frecuenciaCardiaca, frecuenciaRespiratoria, temperatura, motivoConsulta) VALUES ('$idHistorial', '$peso', '$estatura', '$presion', '$freccar', '$frecres', '$temperatura', '$motivo')");
                        if($query == true){
                            ?> <script>alert("Se han almacenado los datos correctamente")</script><?php
                            header('location: ../visualizarExpediente.php');
                        }else{
                            echo "Error";
                        }
                    }else{
                        echo "Error";
                    }
                }else{
                    echo "Error";
                }
            }
        }else{
            echo "Error";
        }
    }
?>