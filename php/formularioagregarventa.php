<?php
include_once("conexion.php");

$idProducto = $_GET["id"];
$productos = "SELECT * FROM productos WHERE id = '$idProducto'";
$resultado = mysqli_query($conexion, $productos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/StyleINVENTARIO.css?1.0">
  <title>Realizar Compra</title>
</head>
<body>
<div class="edit">
  <section class="form-admin">
  <div style="text-align: center;">
  <img src="../img/iconomascotas.png" alt="logo" width="90" style="display: block; margin: 0 auto 10px;"/>
  <h1 style="text-align: center;">Realizar Compra</h1> <br><br>
</div>

    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <form class="container" action="agregarventa.php" method="POST">
    
      
      <label for="id">ID:</label>
      <input type="text" name="id" value="<?php echo $row['id'] ?? ''; ?>"readonly required>
      <label for="id">Ingrese su nombre:</label>
      <input type="text" name="nombre_cliente" value="<?php echo $row['nombre_cliente'] ?? ''; ?>"required>   
      <label for="id">Ingrese su Direccion:</label>
      <input type="text" name="direccion" value="<?php echo $row['direccion'] ?? ''; ?>"required>  
      <label for="id">Ingrese Numero de celular</Center>:</label>
      <input type="number" name="celular" value="<?php echo $row['celular'] ?? ''; ?>"required>
      <label for="id">Ingrese su Correo:</label>
      <input type="text" name="correo" value="<?php echo $row['correo'] ?? ''; ?>"required>
      <label for="id">Ingrese Cantidad:</label>
      <input type="number" name="cantidad" value="<?php echo $row['cantidad'] ?? ''; ?>"required>
      <label for="id">Ingrese Fecha de Pedido:</label>
      <input type="date" name="fecha" value="<?php echo $row['fecha'] ?? ''; ?>"required>
      <label for="id">Producto:</label>
      <input type="text" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?? ''; ?>"readonly required>
      <label for="id">Descripcion:</label>
      <input type="text" name="descripcion" value="<?php echo $row['descripcion'] ?? ''; ?>"readonly required>
      <label for="categoria">Tipo de pago:</label>
      <select name="tipo_pago" required>
        <option disabled selected value="">Tipo de Pago</option>
        <option value="datafono" <?php echo $row['tipo_pago'] == 'datafono' ? 'selected' : ''; ?>>Datafono</option>
        <option value="efectivo" <?php echo $row['tipo_pago'] == 'efectivo' ? 'selected' : ''; ?>>Efectivo</option>
      </select>
      <label for="precio">Precio Unitario:</label>
      <input type="text" name="precio" value="<?php echo $row['precio'] ?? ''; ?>"readonly required>
      
      
    <?php } ?>
    
    <input class="botons" value="Comprar" type="submit">
    </form>
    
    <a href="../Inicio.php"><input class="botons" type="reset" value="Cancelar"></a>
  </section>
  </div>
</body>
</html>
