<?php ob_start();
include('header.php');
include_once 'config/config.php';
// Comprobar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}

if($_SESSION['tipo_usuario'] == 4) {
    header('Location: index.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$tipousu = $_SESSION['tipo_usuario'];

$query = "SELECT a.*, b.usu_nombre, b.usu_apellido, c.obs_descripcion
FROM pedido a 
INNER JOIN usuario b ON a.id_usuario = b.id_usuario
LEFT JOIN observacion c ON a.id_pedido = c.id_pedido
LEFT JOIN pedidodatos d ON a.ped_ref = d.pdd_ref
LEFT JOIN producto e ON e.id_producto = d.id_producto
WHERE d.id_producto = e.id_producto AND e.id_usuario = $id_usuario
ORDER BY a.id_pedido";
$resultado_pedido = mysqli_query($conexion, $query);
?>

<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<br><br>
<div class="col-md-10 card card-body " style="margin:auto;padding:auto;margin-bottom:15%">
    <h2>Historial de pedidos</h2>
    <br>
    <div style="overflow-x:auto;">
        <table class="table borderless table-striped col-md-12">
            <tr WIDTH="auto" HEIGHT="auto">
                <th>ID pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Comprador</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Acciones</th>
            </tr>
            <?php while($pedido = mysqli_fetch_assoc($resultado_pedido)) { ?>
                <tr>
                    <td>
                        <?php echo $pedido['id_pedido']; ?>
                    </td>
                    <td>
                        <?php echo $pedido['ped_fecha']; ?>
                    </td>
                    <td>
                        <?php echo number_format($pedido['ped_totalf'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?php echo $pedido['usu_nombre'].' '.$pedido['usu_apellido']; ?>
                    </td>
                    <td>
                        <?php  if($pedido['ped_estadop'] == 1){
                            echo 'En proceso';
                        } elseif($pedido['ped_estadop'] == 2){
                            echo 'Enviado';
                        } elseif($pedido['ped_estadop'] == 3){
                            echo 'Entragado';
                        }else{ 
                            echo 'Cancelado';
                        }
                        ; ?>
                    </td>
                    <td>
                        <?php echo $pedido['obs_descripcion']; ?>
                    </td>
                    <td>
                        <a class="btn btn-small"
                            onclick="location.href='factura/invoice5.php?dat=<?php echo $pedido['ped_ref']; ?>'"><i
                                class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    function cambiarEstado(idPedido, nuevoEstado) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actualizar_estado.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Estado actualizado correctamente');
            }
        }
        xhr.send('idPedido=' + idPedido + '&nuevoEstado=' + nuevoEstado);
    }
</script>
<?php ob_end_flush();
include('footer.php'); ?>