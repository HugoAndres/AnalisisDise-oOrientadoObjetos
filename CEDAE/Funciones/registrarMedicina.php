<?php
        include_once('conexion.php');
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $precio = $_POST['precio'];
        $piezas = $_POST['piezas'];
        $presentacion = $_POST['presentacion'];
        $codigoBarras = $_POST['codigobarras'];
        $nombreImg = $_FILES['imagen']['name'];
        $tipoImg = $_FILES['imagen']['type'];
        $tipoImg = $_FILES['imagen']['size'];
        $carpeta_destino =$_SERVER['DOCUMENT_ROOT']."/ADOO/imgProductos/";
        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombreImg);

        $query4 = mysqli_query($conection, "SELECT *FROM medicamento WHERE codigoBarras = '$codigoBarras'");
        $resultados = mysqli_fetch_row($query4);
        if($resultados > 0){
                while($piezas != 0){
                        $query2 = mysqli_query($conection, "INSERT INTO unidades(codigoBarras, fechaCaducidad, precio, nombre, presentacion) VALUES('$codigoBarras', '$fecha','$precio', '$nombre', '$presentacion')");
                        $piezas = $piezas-1;
                }
                echo json_encode("Succes1");

        }else{
                $query2 = mysqli_query($conection, "INSERT INTO medicamento(codigoBarras, nombre, presentacion, direccionImg) VALUES ('$codigoBarras', '$nombre', '$presentacion', '$nombreImg')");
                if($query2 == true){
                        while($piezas != 0){
                                $query3 = mysqli_query($conection, "INSERT INTO unidades(codigoBarras, fechaCaducidad, precio, nombre, presentacion) VALUES('$codigoBarras', '$fecha', '$precio', '$nombre', '$presentacion')");
                                $piezas = $piezas-1;
                        }
                        echo json_encode("Succes2");
                }else{
                        echo json_encode("Error");
                }
        }
        
    
?>

