<?php
include_once('conexion.php');

if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

  
    $fecha = $_POST['fecha'];
    $categoria = $_POST['categoria'];
    $tipoProducto = $_POST['tipoProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $talla = $_POST['talla'];
    $unidadMedida = $_POST['unidadMedida'];
    $precio = $_POST['precio'];
    $cantidadActual = $_POST['cantidadActual'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];

    $sql = "UPDATE inventario SET Fecha = '$fecha', Categoria = '$categoria', Tipo_de_producto = '$tipoProducto', Nombre_producto = '$nombreProducto', Descripcion_de_producto = '$descripcionProducto', Talla = '$talla', unidad_de_medida = '$unidadMedida', Precio = '$precio', cantidad_actual = '$cantidadActual', Entrada = '$entrada', Salida = '$salida' WHERE ID_producto = '$idProducto'";

    if ($conexion->query($sql) === TRUE) {
        echo "Producto actualizado exitosamente";
        header("Location:../html/InterfazINVENTARIO.php");/*para que no se vaya a el Not found*/
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
} else {
    echo "No se envió el ID del producto.";
}

$conexion->close();
?>