<?php
include_once ('conexion.php');

$nombre = $_POST["nombre"];
$categoria =$_POST ["categoria"];
$raza = $_POST["raza"];
$genero = $_POST["genero"];
$edad = $_POST["edad"];
$peso = $_POST["peso"];
$estatura  = $_POST["estatura"];
$correo = $_POST["correo"];

$conexion->select_db("cuistar");
$sql = "INSERT INTO mascotas( nombre, categoria, raza, genero, edad, peso, estatura, correo) VALUES ('$nombre', '$categoria','$raza', '$genero','$edad', '$peso', '$estatura', '$correo')";

if($conexion->query($sql)===TRUE){
    echo"\n Datos ingresados";
    header("Location: ../html/InterfazLISTAMASCOTAS.php");
}else{
    echo"No se ingresaron los datos".$conn->error;
}

?> 
