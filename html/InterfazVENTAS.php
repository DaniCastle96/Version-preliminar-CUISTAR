<?php
include_once("../php/conexion.php");
$inventario = "SELECT * FROM ventas";
// Código para consultar inventario

if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM ventas WHERE id LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM ventas";
}
$resultado = mysqli_query($conexion, $datos);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ventas WHERE id = $id";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location:../html/InterfazVENTAS.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/StyleVentas.css?1.0">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header>
        <a class="logo" target="_blank">
            <img src="../img/iconomascotas.png" alt="logo" />
            <h2 class="Nombre Empresa">CUISTAR</h2>
        </a>
        <div class='barra-de-busqueda'>
            <form action="" method="POST">
                <input placeholder="Buscar producto" type="text" name="busqueda">
                <input class="botons" type="submit" name="enviar" value="Buscar">
            </form>
        </div>
        <div class="menu">
                <nav>
                    <a href="../php/reporteinventario.php"><button type="submit">Descargar reporte</button></a>
                    <a href="InterfazORDENES.php"><button type="submit" >Ordenes de Ventas</button></a>
                    <a href="indexADMIN.HTML"><button type="submit" >VOLVER</button></a>
                </nav>
            </div>
    </header>
    <div class="container">
    <div class="ventas">
        <h1>Ventas </h1></div>
    <table class="syled-table">
        <thead>
            <tr>
                
                <th>Id</th>
                <th>nombre_cliente</th>
                <th>direccion</th>
                <th>correo</th>
                <th>celular</th>
                <th>cantidad</th>
                <th>fecha</th>
                <th>nombre_producto</th>
                <th>descripcion</th>
                <th>tipo_pago</th>
                <th>precio</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
      
            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre_cliente']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['celular']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['nombre_producto']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['tipo_pago']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    
                    <td>
                        <div class='editar'><a href='../php/formularioordendeventa.php?id=<?php echo $row['id']; ?>'><ion-icon name="send-outline"></ion-icon></a></div>
                        
                        <div class='eliminar'><a href='?id=<?php echo $row['id']; ?>'><ion-icon name='trash-outline'></ion-icon></a></div>
                        
                      
                    </td>
                </tr>
            <?php } ?>
       
    </table>
</div>
</body>

</html>