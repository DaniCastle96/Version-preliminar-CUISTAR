    <?php
    include_once("conexion.php");
    $sql = "SELECT * FROM solicitudes";
    if(isset($_POST["enviar"])){
        $busqueda = $_POST["busqueda"];
        $consulta =$conexion -> query ("SELECT *FROM solicitudes WHERE nombre LIKE '%$busqueda'");
        while ($row = $consulta -> fetch_array()){
            
            $nombre = $row["nombre"];
            $apellido = $row["apellido"];
            $correo = $row["correo"];
            $tipo = $row["tipo"];
            $creacion = $row["creacion"];
           
            echo " <tbody>
            <tr>

            <td> $Nombre</td>
            <td> $Apellido</td>
            <td> $Correo</td>
            <td> $Tipo</td>
            <td> $Creacion</td>
            </tr>
            </tbody>";
        }
    }else{
        echo"No se encontro ningun registro.";
      }
    ?>
</body>
</html>













