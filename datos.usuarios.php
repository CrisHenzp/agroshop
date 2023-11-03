<?php include_once 'config/config.php'; ?>

<?php include('header.php');

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}

// Comprobar si el usuario es un administrador
if ($_SESSION['tipo_usuario'] != 1) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
} else if ($_SESSION['tipo_usuario'] == 2) {
    header('Location: index.php');

} else if ($_SESSION['tipo_usuario'] == 3) {
    header('Location: index.php');

} else if ($_SESSION['tipo_usuario'] == 4) {
    header('Location: index.php');
    exit;
}
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="row">
    <div class="col-md-4">
        <!-- MESSAGES -->

        <!-- add usuarios form-->
        <div class="card card-body">
            <form action="crud/save.usu.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nombre_2" class="form-control" placeholder="Nombre" required>
                    <br>
                    <input type="text" name="apellido_2" class="form-control" placeholder="Apellido" required>
                    <br>
                    <input type="text" name="email_2" class="form-control" placeholder="Correo electronico" required>
                    <br>
                    <input type="text" name="usuario_2" class="form-control" placeholder="Usuario" required>
                    <br>
                    <input type="text" name="telefono_2" class="form-control" placeholder="Telefono" required>
                    <br>
                    <input type="text" name="direccion_2" class="form-control" placeholder="Direccion" required>
                    <br>
                    <select name="tipo_usuario_2">
                        <option value="2" name="2">Productor</option>
                        <option value="3" name="3">Comerciante</option>
                        <option value="4" name="4">Cliente</option>
                    </select>
                </div>
                <button class="btn btn-success btn-block" type="submit" value="Guardar" name="Guardar">Guardar</button>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Tipo de usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * FROM usuario WHERE usu_estado = 1";
                $result_usuarios = mysqli_query($conexion, $query);

                while ($row = mysqli_fetch_assoc($result_usuarios)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['usu_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_apellido']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_email']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_usuario']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_telefono']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_direccion']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_tipousuario']; ?>
                        </td>

                        <td>
                            <a href="crud/edit.php?id=<?php echo $row['id_usuario'] ?>" class="btn btn-primary">
                                <i class="fas fa-marker"></i> Editar
                            </a>
                            <a href="crud/borrar.usuario.php?id=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i> Borrar
                            </a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php include('footer.php'); ?>