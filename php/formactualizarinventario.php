<?php
include_once("conexion.php");

$idProducto = $_GET["id"];
$inventario = "SELECT * FROM productos WHERE id = '$idProducto'";
$resultado = mysqli_query($conexion, $inventario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/StyleINVENTARIO.css?1.0">
  <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
  <title>Actualizar Inventario</title>
</head>
<body>
<div class="edit">
  <section class="form-admin">
  <img src="../img/iconomascotas.png" alt="logo" width="90" style="display: block; margin: 0 auto 10px;"/>
  <h1 style="text-align: center;">Actualizar Producto</h1> <br><br>
    
    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <form class="container" action="actualizarinventario.php" enctype="multipart/form-data" method="POST">
    
      
      
      <input type="hidden" name="id" id="fecha"  value="<?php echo $row['id'] ?? ''; ?>" readonly >

      <label for="Nombre">Nombre Producto:</label>
      <input type="text" name="nombre_producto" id="fecha"  value="<?php echo $row['nombre_producto'] ?? ''; ?>" >
      <label for="Descripcion">Descripcion:</label>
      <input type="text" name="descripcion" id="fecha"  value="<?php echo $row['descripcion'] ?? ''; ?>" >
      
      <label for="precio">Precio:</label>
      <input type="text" name="precio" id="fecha"  value="<?php echo $row['precio'] ?? ''; ?>" >
      <label for="imagen">Nombre Imagen:</label>
      <input type="file" name="imagen" id="fecha"  value="<?php echo $row['imagen'] ?? ''; ?>" >
    <?php } ?>

    <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" id="fecha"  value="<?php echo $row['fecha'] ?? ''; ?>" >
    <input class="botons" value="ACTUALIZAR" type="submit">
    </form>
    

    
    <a href="../html/InterfazINVENTARIO.php?id_proveedor=<?php echo $idProducto; ?>"><input class="botons" type="reset" value="Cancelar"></a>
  </section>
  </div>
</body>
</html>
