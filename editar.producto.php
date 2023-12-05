<?php ob_start();
include('header.php');
include_once 'config/config.php';
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
$id_usuario = $_SESSION['id_usuario'];

$query = "SELECT id_tipousuario FROM usuario WHERE id_usuario = $id_usuario";
$result = mysqli_query($conexion, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $tipo_usu = $row['id_tipousuario'];
}

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    $query = "SELECT * FROM producto WHERE id_producto = $id_producto";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $pro_imagen = $row['pro_imagen'];
        $pro_nombre = $row['pro_nombre'];
        $pro_descripcion = $row['pro_descripcion'];
        $pro_precio = $row['pro_precio'];
        $pro_stock = $row['pro_stock'];
        $pro_tipo = $row['pro_tipo'];
        $pro_estado = $row['pro_estado'];
        $id_usuario = $row['id_usuario'];
        $id_unit = $row['id_unit'];
        $id_tipoproducto = $row['id_tipoproducto'];
    }
} ?>
<div class="row" style="margin-bottom:15%">
    <div class="card card-body formulario-producto ml-5 mr-5" style="text-align:left;font-weight:bold">
        <h3 style="text-align:center;">Editar producto: </h3>
        <hr>
        <form action="editar.producto.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col">
                    <label style="margin-top:1%">Nombre del fruto</label>
                    <input type="text" name="pro_nombre" class="form-control" value="<?php echo $pro_nombre; ?>"
                        placeholder="Ej. Naranja de sangre" />
                </div>
            </div>
            <div class="form-group col">
                <label style="margin-top:1%">Descripción</label>
                <input type="text" name="pro_descripcion" class="form-control" value="<?php echo $pro_descripcion; ?>"
                    placeholder="Ej. Naranja de sangre" />
            </div>
            <div class="row">
                <div class="form-group col">
                    <label style="margin-top:1%">Precio</label>
                    <input type="number" name="pro_precio" class="form-control" value="<?php echo $pro_precio; ?>"
                        placeholder="Ej.$10000" required>
                </div>
                <div class="form-group col">
                    <label style="margin-top:1%">Cantidad (kg)</label>
                    <input type="number" name="pro_stock" class="form-control " value="<?php echo $pro_stock; ?>"
                        placeholder="Ej.100 (kg)" required>
                </div>
                <div class="form-group col">
                    <label style="margin-top:1%">Imagen</label>
                    <input type="file" name="pro_imagen" class="form-control " value="<?php echo $pro_imagen; ?>">
                </div>
            </div>
            <button type="submit" name="actualizar">Actualizar Producto</button>
        </form>
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
<?php
if (isset($_POST['actualizar'])) {
    $id_producto = $_GET['id'];
    $pro_nombre = isset($_POST['pro_nombre']) ? $_POST['pro_nombre'] : '';
    $pro_descripcion = isset($_POST['pro_descripcion']) ? $_POST['pro_descripcion'] : '';
    $pro_precio = isset($_POST['pro_precio']) ? $_POST['pro_precio'] : '';
    $pro_stock = isset($_POST['pro_stock']) ? $_POST['pro_stock'] : '';

    // Manejo de la subida de la imagen
    if (isset($_FILES['pro_imagen']) && $_FILES['pro_imagen']['error'] == 0) {
        // Aquí debes agregar el código para manejar la subida de la imagen
        // Por ejemplo, puedes mover el archivo subido a una carpeta de imágenes en tu servidor
        $pro_imagen = $_FILES['pro_imagen']['name'];
        move_uploaded_file($_FILES['pro_imagen']['tmp_name'], "imagenes/" . $pro_imagen);
    } else {
        // Si no se subió ninguna imagen, puedes mantener la imagen actual o manejar el error como prefieras
        $pro_imagen = $row['pro_imagen'];
    }

    $query = "UPDATE producto set pro_nombre = '$pro_nombre', pro_descripcion = '$pro_descripcion', pro_precio = '$pro_precio', pro_stock = '$pro_stock', pro_imagen = '$pro_imagen' WHERE id_producto=$id_producto";

    if (mysqli_query($conexion, $query)) {
        if ($tipo_usu == 1) {
            header('Location: datos.productos.php');
            exit;
        } elseif ($tipo_usu == 2) {
            header('Location: crear.producto.php');
            exit;
        } elseif ($tipo_usu == 3) {
            header('Location: crear.producto.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    }
}
ob_end_flush();
include('footer.php'); ?>