<?php
include_once("conexion.php");
$id = $_GET['id'] ?? "";
$solicitudes = "SELECT * FROM solicitudes WHERE id = '$id'";
$resultado = mysqli_query($conexion, $solicitudes);

while ($row = mysqli_fetch_assoc($resultado)) {
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $correo = $row['correo'];
    $asunto = $row['asunto'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CrudPQRS.css?1.4">
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
        <div class="responder">
        
            <div class="titulo-respuesta">
                
                <h2 class="titulorespuesta"><img src="../img/iconomascotas.png" alt="logo" width="60" style="margin-right: 10px;"/>Atender</h2>
            </div>
        </div>
        <br>
        <br>
        <form action="atender.php" method="POST" class="formulario">
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
            <label for="asunto">Asunto:</label>
            <textarea name="asunto" id="asunto" cols="40" rows="10" required readonly><?php echo $asunto ?></textarea>
            <br>
            <label for="estado">Estado:</label>
            <select name="estado" required>
                <option disabled selected>Elija una opción...</option>
                <option value="En tramite">En trámite</option>
                <option value="Tramitado">Tramitado</option>
                <option value="En espera">En espera</option>
            </select>
            <br>
        <form action="enviar_correo.php" method="POST" class="formulario">
        <input type="hidden" name="correo_destino" value="<?php echo $correo; ?>">
        <label for="respuesta">Respuesta:</label>
        <textarea name="respuesta" id="respuesta" cols="30" rows="10" required></textarea>
    <br>
    <button class="Enviar" type="submit" value="Enviar" name="enviar">Enviar respuesta</button>
</form>

    </div>
    <br>
    <!-- Pie de página -->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos

            