<?php
include_once("conexion.php");

$id_proveedor = $_GET["id_proveedor"] ?? "";
$lista_proveedores = "SELECT * FROM lista_proveedores WHERE id_proveedor = '$id_proveedor'";
$resultado = mysqli_query($conexion, $lista_proveedores);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/StyleFORMPROV.css">
  
  <title>Actualizar Proveedor</title>
</head>
<body>
  <section class="form-admin">
  <div style="display: flex; align-items: center; margin-left: 50px; margin-top: 10px; margin-bottom: 20px;">
  <img src="../img/iconomascotas.png" alt="logo" width="60" style="vertical-align: middle; margin-right: 10px;"/>
  <h4 style="margin: 0;">Actualizar Proveedor</h4>
</div><br>

    
    
  <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <form class="container" action="actualizarproveedor.php" method="POST">
        
    <input class="controls" type="text" value="<?php echo $row["id_proveedor"]; ?>" name="id_proveedor" readonly>

      <input class="controls" type="text" value="<?php echo $row["nombre"]; ?>" name="nombre">
      <input class="controls" type="text" value="<?php echo $row["direccion"]; ?>" name="direccion">
      <input class="controls" type="text" value="<?php echo $row["fijo"]; ?>" name="fijo">
      <input class="controls" type="text" value="<?php echo $row["celular"]; ?>" name="celular">
      <input class="controls" type="text" value="<?php echo $row["correo"]; ?>" name="correo">
      <input class="controls" type="text" value="<?php echo $row["ciudad"]; ?>" name="ciudad">
      <input class="controls" type="text" value="<?php echo $row["producto"]; ?>" name="producto">
      <input class="controls" type="text" value="<?php echo $row["fecha"]; ?>" name="fecha">
               
    <?php } ?>
    
    <input class="botons" value="ACTUALIZAR" type="submit">
    </form>
    
    <a href="../html/InterfazPROVEDORES.php?id_proveedor=<?php echo $id_proveedor; ?>"><input class="botons" value="CANCELAR" type="button"></a>
  
  </section>

</body>
</html>
