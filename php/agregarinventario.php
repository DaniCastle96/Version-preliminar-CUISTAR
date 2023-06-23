<?php
include_once ('conexion.php');

$fecha = $_POST['fecha'];
$categoria = $_POST['categoria'];
$tipoProducto = $_POST['tipoProducto'];
$nombreProducto = $_POST['nombreProducto'];
$descripcionProducto = $_POST['descripcionProducto'];
$talla = $_POST['talla'];
$unidadMedida = $_POST['unidadMedida'];
$precio = $_POST['precio'];
$cantidadActual = $_POST['cantidadActual'];
/*  $entrada = $_POST['entrada'];
$salida = $_POST['salida'];*/

$conexion->select_db("cuistar");
$sql = "INSERT INTO inventario (Fecha, Categoria, Tipo_de_producto, Nombre_producto, Descripcion_de_producto, Talla, unidad_de_medida, Precio, cantidad_actual)
            VALUES ('$fecha', '$categoria', '$tipoProducto', '$nombreProducto', '$descripcionProducto', '$talla', '$unidadMedida', '$precio', '$cantidadActual')";

if($conexion->query($sql)===TRUE){
    echo"\n Datos ingresados";
    header("location:../html/InterfazINVENTARIO.php");
}else{
    echo"No se ingresaron los datos".$conn->error;
}

?> 
    
