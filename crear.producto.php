<?php include('header.php');
include_once 'config/config.php';
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

?>

<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<script>

    // Mostrar la alerta solo si el parámetro de consulta 'guardado' está presente en la URL
    window.onload = function () {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('guardado')) {
            swal("¡Producto guardado!", "Tu producto ha sido guardado exitosamente.", "success");
        }
    }

</script>

<div class="comerciante-menu card-body">
    <h2>Menu de Comerciante</h2>
    <div class="formulario-producto">
        <form action="guardar_producto.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nombre_pro" placeholder="Nombre del producto" required>
            <textarea name="descripcion_pro" placeholder="Descripción del producto" required></textarea>
            <select name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="1">Manzanas</option>
                <option value="2">Plátano</option>
                <option value="3">Kiwi</option>
                <option value="4">Frutillas</option>
                <option value="5">Sandía</option>
                <option value="6">Naranja</option>
                <option value="7">Naranja</option>
                <option value="8">Naranja</option>
                <option value="9">Naranja</option>
                <option value="10">Naranja</option>
            </select>
            <input type="number" name="precio_pro" placeholder="Precio" required>
            <input type="number" name="stock_pro" placeholder="Stock" required>
            <input type="file" name="pro_imgen" required>
            <button type="submit" name="submit">Guardar Producto</button>
        </form>
    </div>
    <div class="tabla-productos">
        <h2>Listar mis productos</h2>
        <div>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                <?php $query = "SELECT * FROM producto WHERE pro_estado = 1 ";
                $resultado_productos = mysqli_query($conexion, $query);

                while ($producto = mysqli_fetch_assoc($resultado_productos)) { ?>
                    <tr>
                        <td><img src="<?php echo $producto['pro_imagen']; ?>" width="50" height="50"></td>
                        <td>
                            <?php echo $producto['pro_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_categoria']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_precio']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_stock']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_estado']; ?>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary"><i class="fas fa-marker"></i> Editar</a>
                            <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i> Borrar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>






<h2>Listar mis productos</h2>

<br><br><br><br><br><br><br>


<style>
    .formulario-producto,
    .tabla-productos {
        float: left;
        width: 45%;
        margin: 2.5%;
    }

    .formulario-producto input,
    .formulario-producto textarea {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .formulario-producto button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .formulario-producto button:hover {
        opacity: 0.8;
    }

    table {
        margin-left: auto;
        margin-right: auto;

        border-collapse: collapse;
        border-spacing: 0;
        width: 70%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: center;
        padding: 16px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .formulario-producto select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .formulario-producto select option {
        padding: 12px 20px;
    }
</style>


<?php include('footer.php'); ?>