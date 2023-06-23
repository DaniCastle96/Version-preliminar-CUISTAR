<?php
include_once("conexion.php");

if(isset($_POST['eliminar'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM solicitudes WHERE id = '$id'";
    
    if($conexion->query($sql) === TRUE){
        header("Location: CrudPQRS.php");
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}
$conexion->close();
?>
