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

<div class="row mb-5" style="margin:auto;height: auto">
        <div class="card card-body col-4 formulario-producto" style="margin-left:1%">
            <h3>Crear nuevo producto</h3>
                <hr>
            <form action="guardar_producto.php" method="post" enctype="multipart/form-data">
                <div class="form-group" style="text-align:left;font-weight:bold">
                    <label style="margin-top:1%">Nombre del fruto</label>
                    <input  type="text" name="nombre_pro" class="form-control" placeholder="Ej. Naranja de sangre" />
                    <label style="margin-top:1%">Descripción</label>
                    <textarea  type="text" name="descripcion_pro" class="form-control" placeholder="Ej. Las Naranjas de sangre 
                    tienen pocas semillas y son muy tiernas. Además, tienen un sabor más ácido y un tamaño inferior al de la naranja común"></textarea>
                    <label style="margin-top:1%">Categoria</label>
                    <select name="categoria" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        <option value="1">Frutas</option>
                        <option value="2">Verduras</option>
                        <option value="3">Tuberculos</option>
                        <option value="4">Granos</option>
            </select>
                <label style="margin-top:1%">Precio</label>
                <input type="number" name="precio_pro" placeholder="Ej.$10000" required>
                <label style="margin-top:1%">Cantidad (kg)</label>
                <input type="number" name="stock_pro" placeholder="Ej.100 (kg)" required>
                <label style="margin-top:1%">Imagen</label>
                <input type="file" class="form-control" name="pro_imgen" required>
            <button type="submit" name="submit">Guardar Producto</button>
                </form>
            </div>
    </div>


    <div class="tabla-productos card card-body mb-5" style="margin:2%">
        <h3>Mis productos</h3>
        <hr>
        <br>
        <div>
            
            <table class="table borderless table-striped">
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
                        <td class="btn">
                            <a href="editar.producto.php"  style="color:green" class="btn col-2 " title="Editar producto">
                            <i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a href="" style="color:#F07155;"class="btn col-2" title="Eliminar producto de la existencia">
                            <i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>



<style>
    .formulario-producto,
    .tabla-productos {
        float: left;
        width: 60%;
        margin: 0.5%;
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