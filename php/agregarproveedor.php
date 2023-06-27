<?php
include_once ('conexion.php');

$nombre = $_POST["nombre"];
$direccion =$_POST ["direccion"];
$fijo = $_POST["fijo"];
$celular = $_POST["celular"];
$ciudad = $_POST["ciudad"];
$producto = $_POST["producto"];
$correo  = $_POST["correo"];
$fecha = $_POST["fecha"];


$sql = "INSERT INTO lista_proveedores( nombre, direccion, fijo, celular, ciudad, producto, correo, fecha) VALUES ('$nombre', '$direccion','$fijo', '$celular','$ciudad', '$producto', '$correo', '$fecha')";

if($conexion->query($sql)===TRUE){
    echo"\n Datos ingresados";
    header("location:../html/InterfazPROVEDORES.php");
}else{
    echo"No se ingresaron los datos".$conn->error;
}

?> 
