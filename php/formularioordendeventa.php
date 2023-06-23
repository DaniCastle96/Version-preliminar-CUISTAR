<?php
include_once("conexion.php");

$idProducto = $_GET["id"];
$productos = "SELECT * FROM ventas WHERE id = '$idProducto'";
$resultado = mysqli_query($conexion, $productos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/StyleFORMULARIOoreden.css?1.0">
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
            <div class="caja3">
                    <nav>
                        <a href="../Inicio.php">Inicio</a>
                        <a href="../html/Error404.html">Contacto</a>
                        <a href="../html/Error404.html">Registro</a>
                    </nav>
            </div>
        </div>
    </header>
    <br>
  <div class="container">
 <h2> <img src="../img/iconomascotas.png" alt="logo" width="60" style="vertical-align: middle; margin-right: 10px;"/>Orden de Venta</h2>
    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <form method="post" action="agregarordenventa.php">
      <div class="form-group">
        <label for="numero-orden">Número de Orden:</label>
        <input type="text" name="id" value="<?php echo $row['id'] ?? ''; ?>"readonly required>
    
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $row['fecha'] ?? ''; ?>"required>
     
        <label for="cliente">Cliente:</label>
        <input type="text" name="nombre_cliente" value="<?php echo $row['nombre_cliente'] ?? ''; ?>"required readonly>   
    
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $row['direccion'] ?? ''; ?>"required readonly >  
     
        <label for="email">Correo Electrónico:</label>
        <input type="text" name="correo" value="<?php echo $row['correo'] ?? ''; ?>"required readonly >
    
        <label for="telefono">Teléfono:</label>
        <input type="number" name="celular" value="<?php echo $row['celular'] ?? ''; ?>"required readonly >
     
        <label for="producto">Producto:</label>
        <input type="text" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?? ''; ?>"readonly required>

        <label for="precio-unitario">Precio Unitario:</label>
        <input type="text" name="precio" value="<?php echo $row['precio'] ?? ''; ?>"readonly required>
      
        <label for="cantidad">Cantidad:</label>
        
        <input type="number" name="cantidad" value="<?php echo $row['cantidad'] ?? ''; ?>"required oninput="calcularTotal()" readonly >
     
        <label for="total">Total:</label>
        <span class="total" id="total"></span>
        <label for="total">Tipo de Pago:</label>
        <select name="tipo_pago" required readonly >
        <option disabled selected value="" readonly >Tipo de Pago</option>
        <option value="datafono"  <?php echo $row['tipo_pago'] == 'datafono' ? 'selected' : ''; ?>>Datafono</option>
        <option value="efectivo" <?php echo $row['tipo_pago'] == 'efectivo' ? 'selected' : ''; ?>>Efectivo</option>
      </select>
      <?php } ?>
        <input type="submit" value="Crear Orden">
    </div>
    </form>
    <!--------------------------------------Anexo--js-------------------------------------->
      <script>
        function calcularTotal() {
          var cantidad = parseInt(document.getElementById('cantidad').value);
          var precioUnitario = parseInt(document.getElementById('precio-unitario').value);
          var total = cantidad * precioUnitario;
          document.getElementById('total').textContent = total.toFixed(2);
        }
      </script>
    </body>
    </html>