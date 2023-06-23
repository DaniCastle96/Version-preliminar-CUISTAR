<?php
include_once("../php/conexion.php");

$inventario = "SELECT * FROM ordenes";

if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM ordenes WHERE id LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM ordenes";
}
$resultado = mysqli_query($conexion, $datos);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ordenes WHERE id = $id";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location:../html/InterfazORDENES.php");
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
    <link rel="stylesheet" href="../css/StyleVentas.css">
    
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
            <a href="../php/reporteorden.php">Descargar reporte </a>
        </div>
      
        <div class="menu">
            <a href="InterfazVENTAS.php">volver </a>
        </div>
    </header>

    <table class="syled-table">
        <thead>
            <tr>
                <th>Numero de Orden</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Direccion</th>
                <th>correo</th>
                <th>Telefono</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Tipo de Pago</th>  
                <th>Precio Unitario</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
      
            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['cliente']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['celular']; ?></td>
                    <td><?php echo $row['producto']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['tipo_pago']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    
                    <td>
                        <div class='editar'><a href='../php/actualizarorden.php?id=<?php echo $row['id']; ?>'><ion-icon name='create-outline'></ion-icon></a></div>
                        <div class='eliminar'><a href='?id=<?php echo $row['id']; ?>'>
                        <ion-icon name='trash-outline'></ion-icon></a>
                    </td>
                    </td>
                </tr>
            <?php } ?>
       
    </table>
</body>
</html>