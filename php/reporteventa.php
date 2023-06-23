<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reporteVenta.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM ventas");
?>
<table>
    <thead>
        <tr>
        <th>Id</th>
                <th>nombre_cliente</th>
                <th>direccion</th>
                <th>correo</th>
                <th>celular</th>
                <th>cantidad</th>
                <th>fecha</th>
                <th>nombre_producto</th>
                <th>descripcion</th>
                <th>tipo_pago</th>
                <th>precio</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
            <   <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre_cliente']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['celular']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['nombre_producto']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['tipo_pago']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
