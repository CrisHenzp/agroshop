<?php ob_start();
include('header.php');
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
?>
<br><br><br><br><br><br><br><br><br>

<h3>Gracias por tu compra</h3>
<br><br>

<br>

<a href="historial.compra.php" class="btn btn-primary" ><b>Ver historial</b></a>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php ob_end_flush();
include('footer.php'); ?>