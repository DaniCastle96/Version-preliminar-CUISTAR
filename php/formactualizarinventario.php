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
    

      
      <input type="hidden" name="id"  value="<?php echo $row['id'] ?? ''; ?>" readonly >

      <label for="Nombre">Nombre Producto:</label>
     
      <input type="text" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?? ''; ?>">

      <label for="Descripcion">Descripcion:</label>
      <input type="text" name="descripcion" "  value="<?php echo $row['descripcion'] ?? ''; ?>" >
      <label for="entradas">Entrada:</label>
      <input type="number" name="entradas"   value="<?php echo $row['entradas'] ?? ''; ?>">

      <label for="categoria">Categoría:</label>
<select name="categoria">
  <option disabled selected value="">Categoría</option>
  <option value="Perro" <?php echo $row['categoria'] == 'Perro' ? 'selected' : ''; ?>>Perro</option>
  <option value="Gato" <?php echo $row['categoria'] == 'Gato' ? 'selected' : ''; ?>>Gato</option>
</select>
<label for="tipoProducto">Tipo de Producto:</label>
      <select name="tipoproducto" >
        <option disabled selected value="">Tipo de producto</option>
        <option value="ComidaGato" <?php echo $row['tipo_producto'] == 'ComidaGato' ? 'selected' : ''; ?>>Comida para gatos</option>
        <option value="ComidaPerro" <?php echo $row['tipo_producto'] == 'ComidaPerro' ? 'selected' : ''; ?>>Comida para perros</option>
        <option value="Juguetes" <?php echo $row['tipo_producto'] == 'Juguetes' ? 'selected' : ''; ?>>Juguetes</option>
        <option value="Medicamentos" <?php echo $row['tipo_producto'] == 'Medicamentos' ? 'selected' : ''; ?>>Medicamentos</option>
        <option value="Accesorio" <?php echo $row['tipo_producto'] == 'Accesorio' ? 'selected' : ''; ?>>Accesorio</option>
        <option value="Ropa" <?php echo $row['tipo_producto'] == 'Ropa' ? 'selected' : ''; ?>>Ropa</option>
      </select>
      <label for="talla">Talla:</label>
      <select name="talla">
        <option disabled selected value="">Talla</option>
        <option value="S" <?php echo $row['talla'] == 'S' ? 'selected' : ''; ?>>S</option>
        <option value="M" <?php echo $row['talla'] == 'M' ? 'selected' : ''; ?>>M</option>
        <option value="L" <?php echo $row['talla'] == 'L' ? 'selected' : ''; ?>>L</option>
        <option value="NoAplica" <?php echo $row['talla'] == 'NoAplica' ? 'selected' : ''; ?>>No aplica</option>
      </select>
      <label for="unidadMedida">Unidad de Medida:</label>
      <select name="unidadMedida" >
        <option disabled selected value="">Unidad de medida</option>
        <option value="KL" <?php echo $row['unidad_medida'] == 'KL' ? 'selected' : ''; ?>>KL</option>
        <option value="Lb" <?php echo $row['unidad_medida'] == 'Lb' ? 'selected' : ''; ?>>Lb</option>
        <option value="NoAplica" <?php echo $row['unidad_medida'] == 'NoAplica' ? 'selected' : ''; ?>>No aplica</option>
      </select>
      
      <label for="precio">Precio:</label>
      <input type="text" name="precio"  value="<?php echo $row['precio'] ?? ''; ?>" >

              <label for="imagen">Nombre Imagen:</label>
        <input type="file" name="imagen">
        <?php if (!empty($row['imagen'])): ?>
          <span><?php echo $row['imagen']; ?></span>
        <?php else: ?>
          <span>Sin archivos seleccionados</span>
        <?php endif; ?>


   

    <label for="fecha">Fecha:</label>
      <input type="date" name="fecha"   value="<?php echo $row['fecha'] ?? ''; ?>" >
    <input class="botons" value="ACTUALIZAR" type="submit">
    </form>
     <?php } ?>

    
    <a href="../html/InterfazINVENTARIO.php?id_proveedor=<?php echo $idProducto; ?>"><input class="botons" type="reset" value="Cancelar"></a>
  </section>
  </div>
</body>
</html>
