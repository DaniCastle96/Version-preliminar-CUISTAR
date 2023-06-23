<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reporteOrdenVenta.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM ordenes");
?>
<table>
    <thead>
        <tr>
        <th>Numero de Orden</th>
                <th>Fecha</th>
                <th>Direccion</th>
                <th>correo</th>
                <th>Telefono</th>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>total</th>
                <th>Tipo de Pago</th>
                <th>precio</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
            <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['cliente']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['celular']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['producto']; ?></td>
                    <td><?php echo $row['tipo_pago']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
