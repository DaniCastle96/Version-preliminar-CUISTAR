<?php
include_once("../php/conexion.php");

if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM productos WHERE id LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM productos";
}
$resultado = mysqli_query($conexion, $datos);

if (isset($_GET["eliminar"])) {
    $idEliminar = $_GET["eliminar"];

    $eliminar = "DELETE FROM productos WHERE id = '$idEliminar'";
    if(mysqli_query($conexion, $eliminar)){
      
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
    <link rel="stylesheet" href="../css/StyleINVENTARIO.css?1.2">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <nav>
                <a href="../php/reporteinventario.php"><button type="submit">Descargar reporte</button></a>
                <a href="indexADMIN.php"><button type="submit" >VOLVER</button></a>
            </nav>
        </div>
    </header>

    <div class="registro">
        <a href="InterfazAGREINVENTARIO.html"><button type="submit">Nuevo</button></a>
    </div>
    <div class="conta">
        <div class="inventario">
            <h1>Inventario</h1>
        </div>

        <table class="syled-table">
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Entradas</th>
                    <th>Categoria</th>
                    <th>Tipo Producto</th>
                    <th>Talla</th>
                    <th>Unidad Medida</th>
                    <th>Precio</th> 
                    <th>Nombre Imagen</th>
                    <th>Fecha</th>
                   
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['entradas']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['tipo_producto']; ?></td>
                        <td><?php echo $row['talla']; ?></td>
                        <td><?php echo $row['unidad_medida']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['imagen']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td>
                            <div class='editar'>
                                <a href='../php/formactualizarinventario.php?id=<?php echo $row['id']; ?>'>
                                    <ion-icon name='create-outline'></ion-icon>
                                </a>
                            </div>
                            <div class='eliminar'>
                                <a href='InterfazINVENTARIO.php?eliminar=<?php echo $row['id']; ?>' ">
                                    <ion-icon name='trash-outline'></ion-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
