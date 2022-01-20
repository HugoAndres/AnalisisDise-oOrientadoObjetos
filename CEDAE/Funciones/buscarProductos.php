<?php  
    $mysqli = new mysqli("localhost", "root", "","cedae");
    $salida = "";
    $query = "SELECT *FROM unidades ORDER BY fechaCaducidad";
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT idUnidad, nombre, presentacion, fechaCaducidad, precio FROM unidades WHERE nombre LIKE '%".$q."%'";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        $salida .= "<table class= 'tabla_datos'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Presentacion</th>
                                <th>Fecha de caducidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>";
        while($fila = $resultado->fetch_assoc()){
            $salida.="<tr>
                        <td> ".$fila['nombre']."</td>
                        <td> ".$fila['presentacion']."</td>
                        <td>".$fila['fechaCaducidad']."</td>
                        <td> $".$fila['precio']."</td>
                        <td><a href='agregaraCuenta.php?idproducto=$fila[idUnidad]'>Agregar</a></td> 
                      </tr>";

        }
        $salida.="</tbody></table>";


    }else{
        $salida.="No hay datos";
    }
    echo $salida;
?>