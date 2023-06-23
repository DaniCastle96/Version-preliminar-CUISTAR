<?php
include_once("conexion.php");

if (isset($_POST['archivar'])) {
    $id = $_POST['id'];
    
    // Obtener los datos de la solicitud a archivar
    $sql_select = "SELECT * FROM solicitudes WHERE id = $id";
    $resultado_select = $conexion->query($sql_select);
    $solicitud = $resultado_select->fetch_assoc();
    
    // Insertar los datos en la tabla de solicitudes_archivadas
    $sql_insert = "INSERT INTO solicitudes_archivadas (id, nombre, apellido, correo, tipo, creacion, estado) 
                   VALUES ('{$solicitud['id']}', '{$solicitud['nombre']}', '{$solicitud['apellido']}', '{$solicitud['correo']}', '{$solicitud['tipo']}', '{$solicitud['creacion']}', '{$solicitud['estado']}')";
    $resultado_insert = $conexion->query($sql_insert);
    
    if ($resultado_insert) {
        // Eliminar la solicitud de la tabla de solicitudes
        $sql_delete = "DELETE FROM solicitudes WHERE id = $id";
        $resultado_delete = $conexion->query($sql_delete);
        
        if ($resultado_delete) {
            header("location:../php/CrudPQRS.php");
        } else {
            echo "Error al eliminar la solicitud: " . $conexion->error;
        }
    } else {
        echo "Error al archivar la solicitud: " . $conexion->error;
    }
}
?>
