<?php
include_once('conexion.php');

if (isset($_POST['id'])) {
    $idProducto = $_POST['id'];

    $nombreProducto = $_POST['nombre_producto'];
    $descripcionProducto = $_POST['descripcion'];
    $entradas = $_POST['entradas'];
    $categoria = $_POST['categoria'];
    $tipo_producto = $_POST['tipoproducto'];
    $talla = $_POST['talla'];
    $unidad_medida = $_POST['unidadMedida'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagenNombre = $_FILES['imagen']['name'];
        $imagenTipo = $_FILES['imagen']['type'];
        $imagenTamaño = $_FILES['imagen']['size'];
        $imagenTemporal = $_FILES['imagen']['tmp_name'];

        if (!empty($imagenNombre)) {
            if ($imagenTipo == 'image/jpeg' || $imagenTipo == 'image/png') {
                $imagenNombreUnico = uniqid('imagen_') . '.' . pathinfo($imagenNombre, PATHINFO_EXTENSION);

                $carpetaDestino = '../img/';
                $rutaImagen = $carpetaDestino . $imagenNombreUnico;
                move_uploaded_file($imagenTemporal, $rutaImagen);

                $sql = "UPDATE productos SET nombre_producto = '$nombreProducto', descripcion = '$descripcionProducto', entradas = '$entradas', categoria = '$categoria', tipo_producto = '$tipo_producto', talla = '$talla', unidad_medida = '$unidad_medida', precio = '$precio', imagen = '$rutaImagen', fecha = '$fecha' WHERE id = '$idProducto'";

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
            $sql = "UPDATE productos SET nombre_producto = '$nombreProducto', descripcion = '$descripcionProducto', entradas = '$entradas', categoria = '$categoria', tipo_producto = '$tipo_producto', talla = '$talla', unidad_medida = '$unidad_medida', precio = '$precio', fecha = '$fecha' WHERE id = '$idProducto'";

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
