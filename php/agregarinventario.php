<?php
include_once('conexion.php');
var_dump($_FILES['imagen']);

$nombreProducto = $_POST['nombre_producto'];
$descripcionProducto = $_POST['descripcion'];
$entradas = $_POST['entradas'];
$categoria = $_POST['categoria'];
$tipo_producto = $_POST['tipoProducto'];
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
      // Guardar la imagen en una carpeta
      $carpetaDestino = '../img/';
      $rutaImagen = $carpetaDestino . $imagenNombre;
      move_uploaded_file($imagenTemporal, $rutaImagen);

      // Insertar los datos en la tabla
      $sql = "INSERT INTO productos (nombre_producto, descripcion, entradas, categoria, tipo_producto, talla, unidad_medida, precio, imagen, fecha) VALUES ('$nombreProducto', '$descripcionProducto', '$entradas', '$categoria', '$tipo_producto', '$talla', '$unidad_medida', '$precio', '$rutaImagen', '$fecha')";

      if ($conexion->query($sql) === TRUE) {
        echo "Datos ingresados";
        header("Location: ../html/InterfazINVENTARIO.php");
        exit;
      } else {
        echo "No se ingresaron los datos: " . $conexion->error;
      }
    } else {
      echo "Formato de imagen no válido. Solo se permiten archivos JPEG y PNG.";
    }
  } else {
    echo "No se ha seleccionado ninguna imagen.";
  }
}
?>
