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

$conexion->select_db("cuistar");
$sql = "INSERT INTO ordenes (id, fecha, cliente, direccion, correo, celular, producto, precio, cantidad, tipo_pago) VALUES ('$id', '$fecha', '$cliente', '$direccion', '$correo', '$celular', '$producto', '$precio', '$cantidad', '$pago')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos ingresados";
    header("location:../html/InterfazORDENES.php");
} else {
    echo "No se ingresaron los datos" . $conexion->error;
}
?>
