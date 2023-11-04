<?php include('header.php'); 

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }

$active_facturas = "";
$active_productos = "";
$active_clientes = "";
$active_usuarios = "";
$active_perfil = "active";
$title = "Perfil";

?>
<div class="container">
    <div class="row">
        <form method="post" id="perfil">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad">
                <div class="panel panel-success"><br>
                    <h2 class="panel-title">
                        <center>
                            <font size="5"><i class='glyphicon glyphicon-user'></i>PERFIL</font>
                        </center>
                    </h2>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td class='col-md-3'>Nombres:</td>
                                            <td><input type="text" class="form-control input-sm" name="nombre"
                                                    value="<?php echo $row[''] ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Apellido:</td>
                                            <td><input type="text" class="form-control input-sm" name="apellido"
                                                    value="<?php echo $row[''] ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Correo electrónico:</td>
                                            <td><input type="email" class="form-control input-sm" name="correo"
                                                    value="<?php echo $row[''] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Usuario:</td>
                                            <td><input type="text" class="form-control input-sm" required name="usuario"
                                                    value="<?php echo $row[''] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Telefono:</td>
                                            <td><input type="text" class="form-control input-sm" required
                                                    name="telefono" value="<?php echo $row[''] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Direccion:</td>
                                            <td><input type="text" class="form-control input-sm" name="direccion"
                                                    value="<?php echo $row[""]; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Comuna:</td>
                                            <td><input type="text" class="form-control input-sm" name="comuna"
                                                    value="<?php echo $row[""]; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td>Region:</td>
                                            <td><input type="text" class="form-control input-sm" name="region"
                                                    value="<?php echo $row[""]; ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i>
                            Actualizar Datos</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<br><br><br><br>
<?php
include("footer.php");
?>