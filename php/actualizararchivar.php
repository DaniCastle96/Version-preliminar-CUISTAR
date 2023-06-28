<?php
include_once("conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $asunto = $_POST['asunto'];

    
    $atender = "UPDATE solicitudes_archivadas SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', estado = '$estado', asunto = '$asunto' WHERE id = '$id'";
    $resultado = mysqli_query($conexion,$atender);

    if($resultado == 1) {
        header("Location: CrudPQRS.php");
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
$conexion->close();
?>
