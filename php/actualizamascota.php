<?php
include_once('conexion.php');

$id_mascota = $_POST["id_mascota"];
$nombre = $_POST["nombre"];
$categoria = $_POST["categoria"];
$raza = $_POST["raza"];
$genero = $_POST["genero"];
$edad = $_POST["edad"];
$peso = $_POST["peso"];
$estatura = $_POST["estatura"];
$correo = $_POST["correo"];

$actualizar = "UPDATE mascotas SET id_mascota='$id_mascota',nombre='$nombre', categoria='$categoria', raza='$raza', genero='$genero', edad='$edad', peso='$peso', estatura='$estatura', correo='$correo' WHERE id_mascota='$id_mascota'";
$resultado = mysqli_query($conexion, $actualizar);

if ($resultado) {
    header("Location: ../html/InterfazLISTAMASCOTAS.php");
    exit();
} else {
    echo "<script>alert('Error al actualizar la mascota'); window.history.go(-1);</script>";
    exit();
}
?>
