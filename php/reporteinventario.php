<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reporteInventario.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM inventario");
?>
<table>
    <thead>
        <tr>
        <th>fecha</th>
                <th>ID de producto</th>
                <th>categoria</th>
                <th>tipo de producto</th>
                <th>nombre de producto</th>
                <th>descripcion de producto</th>
                <th>talla</th>
                <th>unidad de medida</th>
                <th>precio</th>
                <th>cantidad actual</th>
                <th>entrada</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
            <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['ID_producto']; ?></td>
                    <td><?php echo $row['Categoria']; ?></td>
                    <td><?php echo $row['Tipo_de_producto']; ?></td>
                    <td><?php echo $row['Nombre_producto']; ?></td>
                    <td><?php echo $row['Descripcion_de_producto']; ?></td>
                    <td><?php echo $row['Talla']; ?></td>
                    <td><?php echo $row['unidad_de_medida']; ?></td>
                    <td><?php echo $row['Precio']; ?></td>
                    <td><?php echo $row['cantidad_actual']; ?></td>
                    <td><?php echo $row['Entrada']; ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
