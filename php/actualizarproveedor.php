<?php
include_once('conexion.php');

$id_proveedor = $_POST["id_proveedor"];
$nombre = $_POST["nombre"] ;
$direccion = $_POST["direccion"];
$fijo = $_POST["fijo"];
$celular = $_POST["celular"];
$ciudad = $_POST["ciudad" ];
$producto = $_POST["producto"];
$correo = $_POST["correo"];
$fecha = $_POST["fecha"];

$actualizar = "UPDATE lista_proveedores SET  id_proveedor='$id_proveedor', nombre='$nombre', direccion='$direccion', fijo='$fijo', celular='$celular', ciudad='$ciudad', producto='$producto', correo='$correo', fecha='$fecha' WHERE id_proveedor='$id_proveedor'";
$resultado = mysqli_query($conexion, $actualizar);

if ($resultado == 1) {
    header("location:../html/InterfazPROVEDORES.php");
} else {
    echo "<script>alert('error');window.history.go(-1);</script>";
}
?>
