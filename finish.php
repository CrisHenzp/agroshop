<?php include('header.php');
include_once 'config/config.php';

if (isset($_SESSION['transaction_data'])) {
    $transaction_data = $_SESSION['transaction_data'];

}
$token = $_SESSION['transaction_data']->token;

foreach ($_SESSION['carrito'] as $producto) {
    $id_producto = $producto['id_producto'];
    $pro_nombre = $producto['pro_nombre'];
    $pro_precio = $producto['pro_precio'];
    $cantidad = $producto['cantidad'];
    $id_usuario = $_SESSION['id_usuario'];
    $total = $producto['pro_precio'] * $producto['cantidad'];
    $fecha = date('Y-m-d H:i:s');
    $token = $_SESSION['transaction_data']->token;
    $estado = 1;
    $sql = "INSERT INTO pedido (id_producto, ped_nombre, ped_precio, ped_cantidad, id_usuario, ped_total, ped_fecha, ped_token, ped_estado) VALUES ('$id_producto', '$pro_nombre', '$pro_precio', '$cantidad', '$id_usuario', '$total', '$fecha', '$token', '$estado')";
}

$_SESSION['carrito'] = array();
?>
<br><br><br><br><br><br><br><br><br>

<?php
echo 'Gracias por tu compra';
?>

<br><br>
<?php

echo 'Transaccion Realizada <a href="factura/invoice.php">Ver Factura</a>';
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php include('footer.php'); ?>