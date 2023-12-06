<?php ob_start();
include('header.php');
include_once 'config/config.php';

if (!isset($_SESSION['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
}

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for ($i = 0; $i < 5; $i++) {
    $password .= substr($str, rand(0, 64), 1);
}
$ref = $password;
foreach ($_SESSION['carrito'] as $producto) {
    $id_producto = $producto['id_producto'];
    $pro_nombre = $producto['pro_nombre'];
    $pro_precio = $producto['pro_precio'];
    $cantidad = $producto['cantidad'];
    $total = $producto['pro_precio'] * $producto['cantidad'];
    $estado = 1;
    $sql = "INSERT INTO pedidodatos (pdd_ref, id_producto, pdd_nombre, pdd_precio, pdd_cantidad, pdd_total, pdd_estado) VALUES ('$ref', '$id_producto', '$pro_nombre', '$pro_precio', '$cantidad',  '$total', '$estado')";
    $result = mysqli_query($conexion, $sql);

}

// Después de ejecutar la primera consulta de inserción
if ($result) {
    $id_usuario = $_SESSION['id_usuario'];
    $pedestado = 1;
    $totalf = $_SESSION['totalf'];
    $fecha = date('Y-m-d H:i:s');
    $token = filter_input(INPUT_POST, 'token_ws');
    $estado = 1;
    // Ahora puedes usar $id_pedidodatos en tu segunda consulta de inserción
    $sql2 = "INSERT INTO pedido (ped_ref, id_usuario, ped_estadop ,ped_totalf, ped_fecha, ped_token, ped_estado) VALUES ('$ref', '$id_usuario', '$pedestado', '$totalf', '$fecha', '$token', '$estado')";
    $result2 = mysqli_query($conexion, $sql2);

    foreach ($_SESSION['carrito'] as $producto) {
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];

        // Consulta para obtener la cantidad actual en stock
        $sql_stock = "SELECT pro_stock FROM producto WHERE id_producto = '$id_producto'";
        $result_stock = mysqli_query($conexion, $sql_stock);
        $row = mysqli_fetch_assoc($result_stock);
        $stock_actual = $row['pro_stock'];

        // Descontar la cantidad comprada del stock actual
        $nuevo_stock = $stock_actual - $cantidad;

        // Actualizar la cantidad en stock en la base de datos
        $sql_update = "UPDATE producto SET pro_stock = '$nuevo_stock' WHERE id_producto = '$id_producto'";
        $result_update = mysqli_query($conexion, $sql_update);
    }
}


$_SESSION['carrito'] = array();
?>
<style>
.container{   
  display: grid;
    place-content: center;
    height: 300px;
}
.cargando{
    width: 120px;
    height: 30px;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    justify-content: space-between;
  margin: 0 auto; 
}
.texto-cargando{ 
  padding-top:20px
}
.cargando span{
    font-size: 20px;
    text-transform: uppercase;
}
.pelotas {
    width: 30px;
    height: 30px;
    background-color: #3c6a36;
    animation: salto .5s alternate
    infinite;
  border-radius: 50%  
}
.pelotas:nth-child(2) {
    animation-delay: .18s;
}
.pelotas:nth-child(3) {
    animation-delay: .37s;
}
@keyframes salto {
    from {
        transform: scaleX(1.25);
    }
    to{
        transform: 
        translateY(-50px) scaleX(1);
    }
}
</style>
<div class="container">
  <div class="cargando">
    <div class="pelotas"></div>
    <div class="pelotas"></div>
    <div class="pelotas"></div>
    <span class="texto-cargando">Cargando...</span>
  </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        setTimeout(function () {
            window.location = "finish.php";
        }, 1000);
    }
</script>
<?php ob_end_flush();
include('footer.php'); ?>