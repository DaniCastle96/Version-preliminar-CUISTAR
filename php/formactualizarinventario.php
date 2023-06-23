<?php
include_once("conexion.php");

$idProducto = $_GET["id"];
$inventario = "SELECT * FROM inventario WHERE ID_producto = '$idProducto'";
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
    <form class="container" action="actualizarinventario.php" method="POST">
    
      
      <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" id="fecha"  value="<?php echo $row['Fecha'] ?? ''; ?>">

      
      <label for="categoria">Categoría:</label>
      <select name="categoria" >
        <option disabled selected value="">Categoría</option>
        <option value="Perro" <?php echo $row['Categoria'] == 'Perro' ? 'selected' : ''; ?>>Perro</option>
        <option value="Gato" <?php echo $row['Categoria'] == 'Gato' ? 'selected' : ''; ?>>Gato</option>
      </select>
      
      <label for="tipoProducto">Tipo de Producto:</label>
      <select name="tipoProducto" >
        <option disabled selected value="">Tipo de producto</option>
        <option value="ComidaGato" <?php echo $row['Tipo_de_producto'] == 'ComidaGato' ? 'selected' : ''; ?>>Comida para gatos</option>
        <option value="ComidaPerro" <?php echo $row['Tipo_de_producto'] == 'ComidaPerro' ? 'selected' : ''; ?>>Comida para perros</option>
        <option value="Juguetes" <?php echo $row['Tipo_de_producto'] == 'Juguetes' ? 'selected' : ''; ?>>Juguetes</option>
        <option value="Medicamentos" <?php echo $row['Tipo_de_producto'] == 'Medicamentos' ? 'selected' : ''; ?>>Medicamentos</option>
        <option value="Accesorio" <?php echo $row['Tipo_de_producto'] == 'Accesorio' ? 'selected' : ''; ?>>Accesorio</option>
        <option value="Ropa" <?php echo $row['Tipo_de_producto'] == 'Ropa' ? 'selected' : ''; ?>>Ropa</option>
      </select>
      
      <label for="nombreProducto">Nombre del Producto:</label>
      <input type="text" name="nombreProducto" value="<?php echo $row['Nombre_producto'] ?? ''; ?>">
      
      <label for="descripcionProducto">Descripción del Producto:</label>
      <textarea name="descripcionProducto" rows="5"><?php echo $row['Descripcion_de_producto']; ?></textarea>
      <label for="talla">Talla:</label>
      <select name="talla">
        <option disabled selected value="">Talla</option>
        <option value="S" <?php echo $row['Talla'] == 'S' ? 'selected' : ''; ?>>S</option>
        <option value="M" <?php echo $row['Talla'] == 'M' ? 'selected' : ''; ?>>M</option>
        <option value="L" <?php echo $row['Talla'] == 'L' ? 'selected' : ''; ?>>L</option>
        <option value="NoAplica" <?php echo $row['Talla'] == 'NoAplica' ? 'selected' : ''; ?>>No aplica</option>
      </select>
      
      <label for="unidadMedida">Unidad de Medida:</label>
      <select name="unidadMedida" >
        <option disabled selected value="">Unidad de medida</option>
        <option value="KL" <?php echo $row['unidad_de_medida'] == 'KL' ? 'selected' : ''; ?>>KL</option>
        <option value="Lb" <?php echo $row['unidad_de_medida'] == 'Lb' ? 'selected' : ''; ?>>Lb</option>
        <option value="NoAplica" <?php echo $row['unidad_de_medida'] == 'NoAplica' ? 'selected' : ''; ?>>No aplica</option>
      </select>
      
      <label for="precio">Precio:</label>
      <input type="number" name="precio" id="precio"  value="<?php echo $row['Precio'] ?? ''; ?>">
      
      <label for="cantidadActual">Cantidad Actual:</label>
      <input type="number" name="cantidadActual" id="cantidadActual"  value="<?php echo $row['cantidad_actual'] ?? ''; ?>">
      
      <label for="entrada">Entrada:</label>
      <input type="number" name="entrada" id="entrada"  value="<?php echo $row['Entrada'] ?? ''; ?>">
      <input type="hidden" id="idProducto"  value="<?php echo $idProducto;?>"name="idProducto">
      
    <?php } ?>
    
    <input class="botons" value="ACTUALIZAR" type="submit">
    </form>
    
    <a href="../html/InterfazINVENTARIO.php?id_proveedor=<?php echo $idProducto; ?>"><input class="botons" type="reset" value="Cancelar"></a>
  </section>
  </div>
</body>
</html>
