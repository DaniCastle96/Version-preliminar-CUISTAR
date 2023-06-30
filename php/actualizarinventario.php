<?php
include_once('conexion.php');

if (isset($_POST['id'])) {
    $idProducto = $_POST['id'];

    // Validar y sanitizar los datos ingresados por el usuario
    $nombreProducto = $_POST['nombre_producto'];
    $descripcionProducto = $_POST['descripcion'];
    $entradas = $_POST['entrada'];
    $categoria = $_POST['categoria'];
    $tipo_producto = $_POST['tipoproducto'];
    $talla = $_POST['talla'];
    $unidad_medida = $_POST['unidadMedida'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener la información del archivo
        $imagenNombre = $_FILES['imagen']['name'];
        $imagenTipo = $_FILES['imagen']['type'];
        $imagenTamaño = $_FILES['imagen']['size'];
        $imagenTemporal = $_FILES['imagen']['tmp_name'];

        // Comprobar que se haya seleccionado un archivo
        if (!empty($imagenNombre)) {
            // Verificar el tipo de archivo (opcional)
            if ($imagenTipo == 'image/jpeg' || $imagenTipo == 'image/png') {
                // Generar un nombre único para la imagen
                $imagenNombreUnico = uniqid('imagen_') . '.' . pathinfo($imagenNombre, PATHINFO_EXTENSION);

                // Guardar la imagen en una carpeta
                $carpetaDestino = '../img/';
                $rutaImagen = $carpetaDestino . $imagenNombreUnico;
                move_uploaded_file($imagenTemporal, $rutaImagen);

                // Construir la consulta SQL con la cláusula WHERE para actualizar un solo registro
                $sql = "UPDATE productos SET nombre_producto = '$nombreProducto', descripcion = '$descripcionProducto',entradas ='$entradas',categoria='$categoria',tipo_producto='$tipo_producto',talla='$talla',unidad_medida='$unidad_medida', precio = '$precio', imagen = '$rutaImagen', fecha = '$fecha' WHERE id = '$idProducto'";

                if ($conexion->query($sql) === TRUE) {
                    echo "Producto actualizado exitosamente";
                    header("Location:../html/InterfazINVENTARIO.php");
                    exit();
                } else {
                    echo "Error al actualizar el producto: " . $conexion->error;
                }
            } else {
                echo "El tipo de archivo no es válido. Se permiten solo imágenes JPEG o PNG.";
            }
        } else {
            // Construir la consulta SQL sin la columna de imagen
            $sql = "UPDATE productos SET nombre_producto = '$nombreProducto', descripcion = '$descripcionProducto', precio = '$precio', fecha = '$fecha' WHERE id = '$idProducto'";

            if ($conexion->query($sql) === TRUE) {
                echo "Producto actualizado exitosamente";
                header("Location:../html/InterfazINVENTARIO.php");
                exit();
            } else {
                echo "Error al actualizar el producto: " . $conexion->error;
            }
        }
    } else {
        echo "No se envió el formulario.";
    }
} else {
    echo "No se envió el ID del producto.";
}

$conexion->close();
?>
