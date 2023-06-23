<?php
include_once("../php/conexion.php");

if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM inventario WHERE ID_producto LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM inventario";
}
$resultado = mysqli_query($conexion, $datos);

if (isset($_GET["eliminar"])) {
    $idEliminar = $_GET["eliminar"];

    $eliminar = "DELETE FROM inventario WHERE ID_producto = '$idEliminar'";
    if(mysqli_query($conexion, $eliminar)){
        header("Location: ../html/InterfazINVENTARIO.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/StyleINVENTARIO.css?1.0">
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
                <input placeholder="Buscar Producto" type="text" name="busqueda">
                <input class="botons" type="submit" name="enviar" value="Buscar">
            </form>
           
        </div>
        <div class="menu">
            <a href="../php/reporteinventario.php">Descargar reporte</a>
        </div>
        <div class="menu">
                <nav>
                    <a href="indexADMIN.HTML">VOLVER</a>
                   </nav></div>
        
        
    </header>

    <div class="registro">
        <a href="InterfazAGREINVENTARIO.html">Nuevo</a>
    </div>

    <table class="syled-table">
        <thead>
            <tr>
         <tr>
                <th>fecha</th>
                <th>ID de producto</th>
                <th>categoria</th>
                <th>tipo de producto</th>
                <th>nombre de producto</th>
                <th>descripcion de producto</th>
                <th>talla</th>
                <th>unidad de medida</th>
                <th>precio</th>
                <th>cantidad actual</th>
                <th>entrada</th>
                
                <th>Acciones</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['ID_producto']; ?></td>
                    <td><?php echo $row['Categoria']; ?></td>
                    <td><?php echo $row['Tipo_de_producto']; ?></td>
                    <td><?php echo $row['Nombre_producto']; ?></td>
                    <td><?php echo $row['Descripcion_de_producto']; ?></td>
                    <td><?php echo $row['Talla']; ?></td>
                    <td><?php echo $row['unidad_de_medida']; ?></td>
                    <td><?php echo $row['Precio']; ?></td>
                    <td><?php echo $row['cantidad_actual']; ?></td>
                    <td><?php echo $row['Entrada']; ?></td>
                    
                    <td>
                        <div class='editar'><a href='../php/formactualizarinventario.php?id=<?php echo $row['ID_producto']; ?>'><ion-icon name='create-outline'></ion-icon></a></div>
                        <div class='eliminar'><a href='../php/elimarinventario.php?id=<?php echo $row['ID_producto']; ?>'><ion-icon name='trash-outline'></ion-icon></a></div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
