<?php
include_once('conexion.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename=reporteProveedores.xls");

$resultado = mysqli_query($conexion, "SELECT * FROM lista_proveedores");
?>
<table>
    <thead>
        <tr>
            <th>ID_PROVEEDOR</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>TEL-FIJO</th>
            <th>TEL-CELULAR</th>
            <th>CORREO</th>
            <th>CIUDAD</th>
            <th>PRODUCTO</th>
            <th>FECHA</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row["id_proveedor"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["direccion"]; ?></td>
                <td><?php echo $row["fijo"]; ?></td>
                <td><?php echo $row["celular"]; ?></td>
                <td><?php echo $row["correo"]; ?></td>
                <td><?php echo $row["ciudad"]; ?></td>
                <td><?php echo $row["producto"]; ?></td>
                <td><?php echo $row["fecha"]; ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
