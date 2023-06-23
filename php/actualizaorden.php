<?php
include_once('conexion.php');

$id = $_POST['id'];
$fecha = $_POST['fecha'];
$cliente = $_POST['nombre_cliente'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$producto = $_POST['nombre_producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$pago = $_POST['tipo_pago'];

$actualizar = "UPDATE ordenes SET id='$id', fecha='$fecha', cliente='$cliente', direccion='$direccion', correo='$correo', celular='$celular', producto='$producto', precio='$precio', cantidad='$cantidad', tipo_pago='$pago' WHERE id='$id'";

if (mysqli_query($conexion, $actualizar)) {
    echo "Datos actualizados";
    header("location:../html/InterfazORDENES.php");
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
