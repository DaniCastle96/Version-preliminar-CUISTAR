<?php
include_once("../php/conexion.php");
$usuario=$_POST['correo'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$consulta="SELECT*FROM usuarios where correo='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:../html/indexADMIN.html");

}else
if($filas['id_cargo']==2){ //cliente
    header("location:../Inicio.html");
}
else{
    ?>
    <?php
     header("location:../html/InterfazLOGIN.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);