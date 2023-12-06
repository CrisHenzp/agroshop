<?php ob_start();
include('header.php');
include_once 'config/config.php';

// Comprobar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}

// Comprobar si el usuario es un administrador
if($_SESSION['tipo_usuario'] != 1) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
}

$query = "SELECT a.*, b.usu_nombre AS nombre, b.usu_apellido AS apellido 
           FROM producto a
           INNER JOIN usuario b ON a.id_usuario = b.id_usuario
           WHERE pro_estado = 1 
           ORDER BY a.id_producto";
$resultado_productos = mysqli_query($conexion, $query);
?>

<div class="tabla-productos card card-body" style="margin:4%; width:auto; height: auto; ">
    <h3>Administrar de productos</h3>
    <hr>
    <br>
    <div>
        <div style="overflow-x:auto;">
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
                <?php while($producto = mysqli_fetch_assoc($resultado_productos)) { ?>
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
                            <?php echo $producto['nombre'].' '.$producto['apellido']; ?>
                        </td>
                        <td>
                            <?php if($producto['pro_estado'] == 1) {
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
                            <a href="eliminar_producto.php?id=<?php echo $producto['id_producto']; ?>"
                                style="color:#F07155;" class="btn col-2" title="Eliminar producto de la existencia">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php ob_end_flush();
include('footer.php'); ?>