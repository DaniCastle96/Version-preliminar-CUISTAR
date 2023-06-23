<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reporteMascotas.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM mascotas");
?>
<table>
    <thead>
        <tr>
         <th>Id Mascota</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Raza</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Peso</th>
                                <th>Estatura</th>
                                <th>Correo</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
            <td><?php echo $row["id_mascota"]; ?></td>
                                <td><?php echo $row["nombre"]; ?></td>
                                <td><?php echo $row["categoria"]; ?></td>
                                <td><?php echo $row["raza"]; ?></td>
                                <td><?php echo $row["genero"]; ?></td>
                                <td><?php echo $row["edad"]; ?></td>
                                <td><?php echo $row["peso"]; ?></td>
                                <td><?php echo $row["estatura"]; ?></td>
                                <td><?php echo $row["correo"]; ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
