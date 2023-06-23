<?php
include_once("conexion.php");

$tipo = $_POST['tipo'];
$documento = $_POST['documento'];
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$archivo = $_POST['archivo'];
$estado = $_POST['estado'];

$sql = "INSERT INTO solicitudes (tipo, nombre, apellido, correo, asunto, archivo, estado, documento) 
        VALUES ('$tipo', '$nombres', '$apellidos', '$correo', '$asunto', '$archivo', '$estado', '$documento')";

if ($conexion->query($sql) === TRUE) {
    header("Location: InterfasPQRS.php");
   
} else {
    echo "No se pudieron registrar los datos: " . $conn->error;
}

$conn->close();
?>

