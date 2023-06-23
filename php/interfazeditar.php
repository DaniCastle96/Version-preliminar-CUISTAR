<?php
include_once("conexion.php");
$id = $_GET['id'] ?? "";
$solicitudes = "SELECT * FROM solicitudes WHERE id = '$id'";
$resultado = mysqli_query($conexion, $solicitudes);

while ($row = mysqli_fetch_assoc($resultado)) {
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $correo = $row['correo'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CrudPQRS.css?1.2">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <title>Modificar</title>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
        </div>
        <br>
    </header>
    <div class="container-flex-R">
        <div clas="responder">
        
        <div style="display: flex; align-items: center; margin-left: 50px; margin-top: 20px;">
  <img src="../img/iconomascotas.png" alt="logo" width="60" style="margin-right: 10px;"/>
  <h2 class="titulorespuesta" style="margin: 0;">Modificar Registro</h2>
</div>



</div><br><br>


            <form action="atender.php" method="POST" clas="formulario">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" required readonly>
                <br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required readonly>
                <br>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required readonly>
                <br>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required readonly>
                <br>
                <label for="tipo">Estado:</label>
                <select name="estado" required>
                    <option disabled selected>Elija una opción...</option>
                    <option value="En tramite">En trámite</option>
                    <option value="Tramitado">Tramitado</option>
                    <option value="En espera">En espera</option>
                </select>
                <br>
                <button class="Enviar" type="submit" value="Modificar" name="modificar">Modificar</button>
            </form>
        </div>
    </div>
    <br>
    <!-- Pie de página -->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h4 class="T-F">Info: Cuistar@gmail.com</h4>
        </div>
    </footer>
    <!-- Anexo js -->
</body>
</html>


