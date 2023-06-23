<?php
include_once('conexion.php');

if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    $sql = "DELETE FROM inventario WHERE ID_producto = $idProducto";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "No se envió el ID del producto a eliminar";
}

header("Location:../html/InterfazINVENTARIO.php");
exit();
?>