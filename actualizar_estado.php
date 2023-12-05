<?php
include_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idPedido']) && isset($_POST['nuevoEstado'])) {
        $idPedido = $_POST['idPedido'];
        $nuevoEstado = $_POST['nuevoEstado'];

        $sql = "UPDATE pedido SET ped_estadop = ? WHERE id_pedido = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ii', $nuevoEstado, $idPedido);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo 'Estado actualizado correctamente';
        } else {
            echo 'Error al actualizar el estado';
        }

        $stmt->close();
    } else {
        echo 'No se recibieron los datos necesarios';
    }
} else {
    echo 'Método de solicitud no válido';
}

$conexion->close();
?>

?>