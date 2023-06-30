<?php
include_once("../php/conexion.php");
$lista_proveedores = "SELECT * FROM lista_proveedores";

// Código para consultar proveedores

if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM lista_proveedores WHERE id_proveedor LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR producto LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM lista_proveedores";
}
$resultado = mysqli_query($conexion, $datos);

// Código para eliminar proveedores
if (isset($_GET["eliminar"])) {
    $idEliminar = $_GET["eliminar"];

    $eliminar = "DELETE FROM lista_proveedores WHERE id_proveedor = '$idEliminar'";
    if(mysqli_query($conexion, $eliminar)){
        header("Location: ../html/InterfazPROVEDORES.php");
        exit();
    } else {
        echo "Error al eliminar el proveedor: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <link rel="stylesheet" href="../css/StylesPROVEDORES.css?1.1">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <title>PROVEEDORES</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="contenedor1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
            <div class="contenedor2">
                <nav>
                    <a href="indexADMIN.php">VOLVER</a>
                   
                </nav>
            </div>
        </div>
    </header>

    <br><br><br>

    <main>
        <div class="container">
            <div class="caja2-2">
                <div class="buscar">
                    <form class="buscar1" action="" method="POST">
                        <input placeholder="Buscar Proveedor" type="text" name="busqueda">
                        <input class="botons"  type="submit" name="enviar" value="Buscar">
                    </form>
                    <div class="reporte">
                    <a href="../php/reporteproveedor.php">
                                        <input class="botons" style="color: rgb(255, 255, 255); background-color: #0e2d71d5" type="submit" value="Reporte"></a></div>
                </div>
                <table class="tabla">
                    <thead>
                        <tr class="superior">
                            <th>ID_PROVEEDOR</th>
                            <th>NOMBRE</th>
                            <th>DIRECCION</th>
                            <th>TEL-FIJO</th>
                            <th>TEL-CELULAR</th>
                            <th>CORREO</th>
                            <th>CIUDAD</th>
                            <th>PRODUCTO</th>
                            <th>FECHA</th>
                            <th>ACCIONES </th>
                           <th> <a href="./InterfazAGREGARPROV.html">
                                    <input style="color: white; background-color: #008000" type="submit" value="AGREGAR"></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $row["id_proveedor"]; ?></td>
                                <td><?php echo $row["nombre"]; ?></td>
                                <td><?php echo $row["direccion"]; ?></td>
                                <td><?php echo $row["fijo"]; ?></td>
                                <td><?php echo $row["celular"]; ?></td>
                                <td><?php echo $row["correo"]; ?></td>
                                <td><?php echo $row["ciudad"]; ?></td>
                                <td><?php echo $row["producto"]; ?></td>
                                <td><?php echo $row["fecha"]; ?></td>
                                <td>
                                    <a href="../php/formactualizarproveedores.php?id_proveedor=<?php echo $row["id_proveedor"]; ?>">
                                        <input class="botons" style="color: black; background-color: #ffcc00" type="submit" value="ACTUALIZAR">
                                    </a></td> 
                                    <td>
                                    <a href="?eliminar=<?php echo $row["id_proveedor"]; ?>">
                                        <input class="botons" style="color: black; background-color: #f54021" type="submit" value="ELIMINAR">
                                    </a>
                                </td>      
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h3>Info: Cuistar@gmail.com</h3>
        </div>
    </footer>
</body>
</html>
