<?php
include_once('conexion.php');

    $id = $_POST['id'];
    $cliente= $_POST['nombre_cliente'];
    $direccion= $_POST['direccion'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $cantidad = $_POST['cantidad'];
    $fecha= $_POST['fecha'];
    $producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $pago = $_POST['tipo_pago'];
    $precio = $_POST['precio'];
   
    $conexion->select_db("cuistar");
    $sql = "INSERT INTO ventas (nombre_cliente,direccion,celular,correo, cantidad, fecha, nombre_producto, descripcion,tipo_pago,precio) VALUES ('$cliente', '$direccion','$celular', '$correo','$cantidad', '$fecha', '$producto', '$descripcion','$pago','$precio')";
    
    if($conexion->query($sql)===TRUE){
        echo"\n Datos ingresados";
        header("location:../inicio.php");
    }else{
        echo"No se ingresaron los datos".$conn->error;
    }
    
    ?> 
    