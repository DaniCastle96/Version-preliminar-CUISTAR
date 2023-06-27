<?php
include_once ('conexion.php');

$cargo= 2;
$nombre= $_POST["nombre"];
$apellido= $_POST["apellido"];
$contraseña= $_POST["contraseña"];
$correo= $_POST["correo"];


$sql = "INSERT INTO usuarios(id_cargo, nombre, apellido, contraseña, correo) VALUES ('$cargo','$nombre', '$apellido','$contraseña', '$correo')";

if($conexion->query($sql)===TRUE){
    echo"\n Datos ingresados";
    header("location:../html/InterfazLOGIN.html");
}else{
    echo"No se ingresaron los datos".$conn->error;
}
?> 