<?php
include_once("../php/conexion.php");
$usuario = $_POST['correo'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$consulta = "SELECT * FROM usuarios WHERE correo='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 1) { // administrador
    setcookie('administrador', $filas['nombre']. ' ' . $filas['apellido'], time() + 16 * 20, '/');
    header("location: ../html/IndexADMIN.php");
    exit;
} else if ($filas['id_cargo'] == 2) { // cliente
    setcookie('cliente', $filas['nombre'] . ' ' . $filas['apellido'], time() + 16 * 20, '/');

    header("location: ../Iniciocliente.php");
    exit;
} else {
    header("location: ../html/InterfazLOGIN.html");
    exit;
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
