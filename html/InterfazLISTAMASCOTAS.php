<?php
include_once("../php/conexion.php");

$macotas = "SELECT * FROM mascotas";

// Código para consultar mascotas
if (isset($_POST["enviar"])) {
    $busqueda = $_POST["busqueda"];
    $datos = "SELECT * FROM mascotas WHERE id_mascota LIKE '%$busqueda%'";
} else {
    $datos = "SELECT * FROM mascotas";
}
$resultado = mysqli_query($conexion, $datos);

// Código para eliminar mascota
if (isset($_POST["eliminar"])) {
    $idEliminar = $_POST["eliminar"];

    $eliminar = "DELETE FROM mascotas WHERE id_mascota = '$idEliminar'";
    if(mysqli_query($conexion, $eliminar)){
        header("Location: ../html/InterfazLISTAMASCOTAS.php");
        exit();
    } else {
        echo "Error al eliminar la mascota: " . mysqli_error($conexion);
    }
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CrudPQRS.css?1.0">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>CUISTAR</title>
</head>
<body>
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
            <div class="caja2">
                <nav>
                   
                    <a href="../php/CrudPQRS.php">PQRS</a>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <main>
        <div class="container-flex">
            <div class="caja2-2">
                <table class="tabla">
                    <div class="caja2-2">
                        <caption>Mascotas
                            <form action="" method="POST">
                                <input placeholder="Buscar Mascota" type="text" name="busqueda">
                                <input class="botons" type="submit" name="enviar" value="Buscar">
                            </form>
                        </caption>
                        <thead>
                            <tr>
                                <th>Id Mascota</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Raza</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Peso</th>
                                <th>Estatura</th>
                                <th>Correo</th>
                                <th></th>
                                <th></th>
                                
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                                <th data-label="Atender">
                                    <a href="../html/InterfazREGMpqrs.html">
                                        <button type="submit">
                                            <img src="../img/agregar.png" alt="icono">
                                        </button>
                                    </a>
                                </th>
                                <th data-label="Atender">
                                    <a href="../php/reportemascotas.php">
                                        <button type="submit">
                                            <img src="../img/descargar.png" alt="icono">
                                        </button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $row["id_mascota"]; ?></td>
                                <td><?php echo $row["nombre"]; ?></td>
                                <td><?php echo $row["categoria"]; ?></td>
                                <td><?php echo $row["raza"]; ?></td>
                                <td><?php echo $row["genero"]; ?></td>
                                <td><?php echo $row["edad"]; ?></td>
                                <td><?php echo $row["peso"]; ?></td>
                                <td><?php echo $row["estatura"]; ?></td>
                                <td><?php echo $row["correo"]; ?></td>
                                <td></td>
                                <td></td>
                                
                               
                                <td data-label="Atender">
                                    <a href="../php/InterfazACTUMASCOTA.php?id_mascota=<?php echo $row["id_mascota"]; ?>">
                                        <button type="submit">
                                            <img src="../img/abrir-documento.png" alt="icono">
                                        </button>
                                    </a>
                                </td>
                                <td data-label="Eliminar">
                                    <form action="" method="POST">
                                        <input type="hidden" name="eliminar" value="<?php echo $row["id_mascota"]; ?>">
                                        <button type="submit">
                                            <img src="../img/eliminar.png" alt="icono">
                                        </button>
                                        <td></td>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </main>
    <br>
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h4 class="T-F">Info: Cuistar@gmail.com</h4>
        </div>
    </footer>
</body>
</html>
