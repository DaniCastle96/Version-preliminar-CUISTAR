<?php include_once("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CrudPQRS.css">
    <!----Anexos----->
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
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
                    <a href="../html/InterfazLISTAMASCOTAS.php">Mascotas</a>
                    <a href="../html/indexADMIN.html">Volver</a>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <main>
        <!----Tabla----->
        <div class="container-flex">
            <div class="caja2-2">
                <table class="tabla">
                    <caption>Solicitudes PQRS</caption>
                    <thead>
                        <tr>
                            <th>Id Solicitud</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo Electronico</th>
                            <th>Tipo</th>
                            <th>Creacion</th>
                            <th>Estado</th>
                            <th>Atender</th>
                            <th>Archivar</th>
                            <th>Eliminar</th>
                            <th data-label="Atender">
                                <a href="reportepqrs.php">
                                    <button type="submit">
                                        <img src="../img/descargar.png" alt="icono">
                                    </button>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM solicitudes;";
                        if ($respuesta = $conexion->query($sql)) {
                            while ($row = $respuesta->fetch_assoc()) {
                                $id = $row["id"];
                                $nombre = $row["nombre"];
                                $apellido = $row["apellido"];
                                $correo = $row["correo"];
                                $tipo = $row["tipo"];
                                $creacion = $row["creacion"];
                                $estado = $row["estado"];
                                ?> 
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row["nombre"] ?></td>
                                    <td><?php echo $row["apellido"] ?></td>
                                    <td><?php echo $row["correo"] ?></td>
                                    <td><?php echo $row["tipo"] ?></td>
                                    <td><?php echo $row["creacion"] ?></td>
                                    <td><?php echo $row["estado"] ?></td>
                                    <td>
                                        <?php echo "<a href='interfazeditar.php?id=" . $row['id'] . "'><button type='submit' name='atender'><img src='../img/abrir-documento.png' alt='icono'></button></a>"; ?>
                                    </td>
                                    <td>
                                        <form action="archivar.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <button type="submit" name="archivar"><img src="../img/archivar.png" alt="icono"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo "<form action='eliminar.php' method='POST'>
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' name='eliminar'><img src='../img/eliminar.png' alt='icono'></button>"; ?>
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php }
                            $respuesta->free();
                        } else {
                            echo "Error al ejecutar la consulta: " . $conexion->error;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="container-flex">
            <div class="caja2-2">
                <table class="tabla">
                    <caption>Archivados</caption>
                    <thead>
                        <tr>
                            <th>Id Solicitud</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo Electronico</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Atender</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_archivados = "SELECT * FROM solicitudes_archivadas;";
                        if ($respuesta_archivados = $conexion->query($sql_archivados)) {
                            while ($row_archivados = $respuesta_archivados->fetch_assoc()) {
                                $id = $row_archivados['id']; // Asignar el valor del ID a la variable $id
                                ?>
                                <tr>
                                    <td data-label="Id Solicitud"><?php echo $row_archivados['id'] ?></td>
                                    <td data-label="Nombres"><?php echo $row_archivados["nombre"] ?></td>
                                    <td data-label="Apellidos"><?php echo $row_archivados["apellido"] ?></td>
                                    <td data-label="Correo Electronico"><?php echo $row_archivados["correo"] ?></td>
                                    <td data-label="Tipo"><?php echo $row_archivados["tipo"] ?></td>
                                    <td data-label="Estado"><?php echo $row_archivados["estado"] ?></td>
                                    <td data-label="Atender">
                                    <a href="formactuarchivar.php?id=<?php echo $id ?>"> <button type="submit"value="<?php echo $id ?>"><img src="../img/abrir-documento.png" alt="icono"></button></a>

                                      
                                    

                                    </td>
                                    <td>
                                        <form action="eliminarchivados.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <button type="submit" name="eliminar"><img src="../img/eliminar.png" alt="icono"></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                            $respuesta_archivados->free();
                        } else {
                            echo "Error al ejecutar la consulta: " . $conexion->error;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <br>
    <!----Pie-de-pagina----->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h4 class="T-F">Info: CuistarAdmin@hotmail.com</h4>
            <h4 class="T-F">Soporte: CuistarSoporte@hotmail.com</h4>
        </div>
    </footer>
</body>
</html>
