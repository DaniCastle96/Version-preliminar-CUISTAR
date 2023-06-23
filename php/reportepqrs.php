<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reportePqrs.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM solicitudes");
?>
<table>
    <thead>
        <tr>
        <th>Id Solicitud</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo Electrónico</th>
                        <th>Tipo</th>
                        <th>Creación</th>
                        <th>Estado</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row["nombre"]?></td>
            <td><?php echo $row["apellido"]?></td>
            <td><?php echo $row["correo"]?></td>
            <td><?php echo $row["tipo"]?></td>
            <td><?php echo $row["creacion"]?></td>
            <td><?php echo $row["estado"]?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
