<?php include_once 'config/config.php'; ?>

<?php include('header.php'); ?>

<div class="tabla-productos card card-body mb-5" style="margin:2% width:auto; height: auto; ">
    <h3>Administrar de productos</h3>
    <hr>
    <br>
    <div>
        <table class="table borderless table-striped">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Propietario</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
            <?php $query = "SELECT a.*, b.usu_nombre AS nombre, b.usu_apellido AS apellido 
            FROM producto a
            INNER JOIN usuario b ON a.id_usuario = b.id_usuario
            WHERE pro_estado = 1 
            ORDER BY a.id_producto";
            $resultado_productos = mysqli_query($conexion, $query);

            while ($producto = mysqli_fetch_assoc($resultado_productos)) { ?>
                <tr>
                    <td>
                        <?php echo $producto['id_producto']; ?>
                    </td>
                    <td><img src="<?php echo $producto['pro_imagen']; ?>" width="50" height="50">
                    </td>
                    <td>
                        <?php echo $producto['pro_nombre']; ?>
                    </td>
                    <td>
                        <?php echo $producto['pro_descripcion']; ?>
                    </td>
                    <td>
                        <?php echo $producto['nombre'] . ' ' . $producto['apellido']; ?>
                    </td>
                    <td>
                        <?php if ($producto['pro_estado'] == 1) {
                            echo "activo";
                        } else {
                            echo "inactivo";
                        }
                        ; ?>
                    </td>
                    <td class="btn">
                        <a href="editar.producto.php?id=<?php echo $producto['id_producto']; ?>" style="color:green"
                            class="btn col-2 " title="Editar producto">
                            <i class="fa fa-pencil-square-o fa-lg"></i></a>
                        <a href="eliminar_producto.php?id=<?php echo $producto['id_producto']; ?>" style="color:#F07155;"
                            class="btn col-2" title="Eliminar producto de la existencia">
                            <i class="fa fa-trash fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include('footer.php'); ?>