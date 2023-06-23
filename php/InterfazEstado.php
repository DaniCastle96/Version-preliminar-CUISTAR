<?php
include_once("conexion.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InterfasEstado.css?1.5">
    <!----Anexos----->
    <link rel="shortcut icon" href="../img/iconomascotas.png"type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>CUISTAR</title>
</head>
<body>
    <!----Encabezado----->
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
            <div class="caja2">
                    <nav>
                        <a href="../Inicio.php">Inicio</a>
                        <a href="../html/Error404.html">Escribenos</a>
                        <a href="InterfasPQRS.php">Solicitud(PQRS)</a>
                        <a href="../html/Error500.html">Calificar servicio</a>
                    </nav>
            </div>
        </div>
    </header>
    <br>
    <main>
    <!----Consultar--estado---->
    <div class="container-flex">
        <div class="caja2-2">
        <form action="InterfazEstado.php" method="POST">
        <label>Numero de documento:</label>
        <input type="text" placeholder="Escriba su numero de documento" name="busqueda" >
        <button type="submit" name="enviar"value="Buscar">Buscar</button>
        </form>
            <table class="tabla">
                <caption>Estados Solicitudes</caption>
                <?php
                $sql = "SELECT * FROM solicitudes;";
               echo " <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo Electronico</th>
                        <th>Tipo</th>
                        <th>Creacion</th>
                        <th>Estado</th>
                    </tr>
            </thead>";
        if(isset($_POST["enviar"])){
        $busqueda = $_POST["busqueda"];
        $consulta =$conexion -> query ("SELECT *FROM solicitudes WHERE documento LIKE '%$busqueda'");
        while ($row = $consulta -> fetch_array()){
            $documento = $row["documento"];
            $nombre = $row["nombre"];
            $apellido = $row["apellido"];
            $correo = $row["correo"];
            $tipo = $row["tipo"];
            $creacion = $row["creacion"];
            $estado = $row["estado"];
         
            
            echo " <tbody>
            <tr>
            <td> $nombre</td>
            <td> $apellido</td>
            <td> $correo</td>
            <td> $tipo</td>
            <td> $creacion</td>
            <td> $estado</td>
            </tr>
            </tbody>";
        }
    }else{
        echo"";
      }         
?>
            </table>
        </div>
    </main>
    <br>
    <!----Pie-de-pagina----->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h3>Info: Cuistar@gmail.com</h3>
        </div>
    </footer>
</body>
</html>