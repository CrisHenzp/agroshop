<?php session_start();
include_once 'config/config.php';

$id_pedido = $_POST['id_pedido'];
$observacion = $_POST['observacion'];
$id_usuario= $_SESSION['id_usuario'];
$estado = 1;

$query = "INSERT INTO observacion (obs_descripcion,id_usuario, id_pedido, obs_estado) VALUES ('$observacion', '$id_usuario', '$id_pedido', '$estado')";
$resultado = mysqli_query($conexion, $query);

if($resultado) {
    // La observación se guardó correctamente
    header('Location: historial.compra.php');
} else {
    // Hubo un error al guardar la observación
    echo "Error al guardar la observación: " . mysqli_error($conexion);
}
?>