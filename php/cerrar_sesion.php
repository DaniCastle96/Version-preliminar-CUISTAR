<?php
session_start();
session_destroy();
// Redirecciona a la página de inicio de sesión u otra página
header("Location: ../inicio.php");
exit;
?>
