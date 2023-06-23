<?php
include_once("conexion.php");

$id_mascota = $_GET["id_mascota"]?? "";
$mascotas = "SELECT * FROM mascotas WHERE id_mascota = '$id_mascota'";
$resultado = mysqli_query($conexion, $mascotas);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/styleREGMPQRS.css">
  <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <title>Registrar Mascota</title>
</head>
<body>
  
  <section class="form-admin">
  <div style="display: flex; align-items: center; margin-left: 50px; margin-top: 10px; margin-bottom: 20px;">
      <img src="../img/iconomascotas.png" alt="logo" width="60" style="vertical-align: middle; margin-right: 10px;"/>
      <h4 class="titulorespuesta" style="margin: 0;">Actualizar Mascota</h4>
    </div>
</div><br>
<div style="margin-bottom: 20px;">
 
</div>

    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <form action="../php/actualizamascota.php" method="POST">
        <input class="controls" type="text" value="<?php echo $row["id_mascota"]; ?>" name="id_mascota" readonly>
        <input class="controls" type="text" value="<?php echo $row["nombre"]; ?>" required name="nombre" placeholder="Nombre Mascota">

        <select name="categoria" aria-required="true">
          <option disabled>Categoria</option>
          <option value="Perro" <?php if ($row["categoria"] == "Perro") echo "selected"; ?>>Perro</option>
          <option value="Gato" <?php if ($row["categoria"] == "Gato") echo "selected"; ?>>Gato</option>
        </select>

        <select name="genero" aria-required="true">
          <option disabled>Genero</option>
          <option value="MACHO" <?php if ($row["genero"] == "MACHO") echo "selected"; ?>>Macho</option>
          <option value="HEMBRA" <?php if ($row["genero"] == "HEMBRA") echo "selected"; ?>>Hembra</option>
        </select>

        <input class="controls" type="text" value="<?php echo $row["raza"]; ?>" required name="raza" placeholder="Raza">

        <select name="edad" required>
          <option disabled selected>Edad</option>
          <option value="1" <?php if ($row["edad"] == "1") echo "selected"; ?>>Menos de 1 año</option>
          <option value="2" <?php if ($row["edad"] == "2") echo "selected"; ?>>1 - 2 años</option>
          <option value="3" <?php if ($row["edad"] == "3") echo "selected"; ?>>3 - 5 años</option>
          <option value="4" <?php if ($row["edad"] == "4") echo "selected"; ?>>Más de 5 años</option>
        </select>

       
      

        <select name="peso" required>
          <option disabled selected>Peso</option>
          <option value="5" <?php if ($row["peso"] == "5") echo "selected"; ?>>Menos de 5 kg</option>
          <option value="6" <?php if ($row["peso"] == "6") echo "selected"; ?>>5 - 10 kg</option>
          <option value="7" <?php if ($row["peso"] == "7") echo "selected"; ?>>10 - 20 kg</option>
          <option value="8" <?php if ($row["peso"] == "8") echo "selected"; ?>>Más de 20 kg</option>
        </select>


      
        <select name="estatura" required>
          <option disabled selected>Estatura</option>
          <option value="9" <?php if ($row["estatura"] == "9") echo "selected"; ?>>Menor a 30 cm</option>
          <option value="10" <?php if ($row["estatura"] == "10") echo "selected"; ?>>30 - 60 cm</option>
          <option value="11" <?php if ($row["estatura"] == "11") echo "selected"; ?>>60 - 90 cm</option>
          <option value="12" <?php if ($row["estatura"] == "12") echo "selected"; ?>>Mayor a 90 cm</option>
        </select>

        <input class="controls" type="email" required placeholder="Correo" value="<?php echo $row["correo"]; ?>" name="correo" >
   
        <?php } ?>
    <input class="botons" type="submit" value="Actualizar">
    </form>
    <a href="../html/InterfazLISTAMASCOTAS.php">
      <input class="botons" type="reset" value="Volver">
    </a>
  </section>

</body>
</html>
