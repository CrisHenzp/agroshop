<?php ob_start();
include('header.php');
include_once 'config/config.php';

// Comprobar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
// Comprobar si el usuario es un administrador
if($_SESSION['tipo_usuario'] != 1) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$totalFinal = 0;
$sql = "SELECT a.pdd_nombre, SUM(a.pdd_cantidad) AS cantidad2, a.pdd_precio, a.pdd_total, b.id_producto
FROM pedidodatos a
INNER JOIN producto b ON a.id_producto = b.id_producto 
GROUP BY a.pdd_nombre
ORDER BY b.id_producto
";
$resultado = mysqli_query($conexion, $sql);
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<br>
<div class="col-md-10 card card-body mb-5" style="margin:auto;padding:auto;">
    <h2 class="text-center mb-4">Informe de Ventas</h2>
    <div class="container mt-4 row">
        <!-- Tabla de Ventas -->
        <div class="col">
            <div style="overflow-x:auto;">
                <table class="table borderless table-striped ">
                    <thead>
                        <tr>
                            <th>ID producto</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($producto = mysqli_fetch_assoc($resultado)) {
                            $totalf = $producto['cantidad2'] * $producto['pdd_precio'];
                            echo "<tr>";
                            echo "<td>".$producto['id_producto']."</td>";
                            echo "<td>".$producto['pdd_nombre']."</td>";
                            echo "<td>".$producto['cantidad2']."</td>";
                            echo "<td>$".number_format($producto['pdd_precio'], 0, ',', '.')."</td>";
                            echo "<td>$".number_format($totalf, 0, ',', '.')."</td>";
                            echo "</tr>";
                            $totalFinal += $totalf;
                        } ?>
                        <!-- Agrega más filas según sea necesario -->
                    </tbody>
                    <tfoot>
                        <?php
                        // Verificar si hay resultados antes de mostrar el total final
                        if($totalFinal !== null) {
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td colspan='3'>Total Final</td>";
                            echo "<td>$".number_format($totalFinal, 0, ',', '.')."</td>";
                            echo "</tr>";
                        } else {
                            // Si no hay resultados, mostrar un mensaje o realizar alguna acción apropiada
                            echo "<tr><td colspan='4'>No hay productos</td></tr>";
                        }
                        ?>
                    </tfoot>
                </table>
            </div>
            <a href="factura/invoice4.php" class="btn btn-primary btn-block"><b>Informe</b></a>
        </div>
        <?php
        $busqueda = "SELECT a.pro_nombre, SUM(b.pdd_cantidad) as cantidad
        FROM producto a 
        INNER JOIN pedidodatos b ON b.id_producto = a.id_producto
        GROUP BY a.pro_nombre
        ORDER BY b.id_producto";

        $resultado = mysqli_query($conexion, $busqueda);

        $datosProductos = [];
        while($producto = mysqli_fetch_assoc($resultado)) {
            $datosProductos[] = [$producto['pro_nombre'], $producto['cantidad']];
        }

        // Convertir los datos a un formato que pueda ser utilizado en JavaScript
        $labels = [];
        $data = [];

        foreach($datosProductos as $producto) {
            $labels[] = $producto[0]; // Nombre del producto
            $data[] = $producto[1];   // Cantidad del producto
        }
        ?>
        <div class="col">
            <canvas id="graficoVentas" width="auto" height="auto"></canvas>
        </div>

        <!-- Script para el Gráfico -->
        <script>
            // Datos de ejemplo para el gráfico
            var datosVentas = {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Ventas por Producto',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                        // Agrega más colores según sea necesario
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                        // Agrega más colores según sea necesario
                    ],
                    borderWidth: 1
                }]
            };

            // Obtener el contexto del lienzo
            var contexto = document.getElementById('graficoVentas').getContext('2d');

            // Crear el gráfico de barras
            var graficoVentas = new Chart(contexto, {
                type: 'bar',
                data: datosVentas,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</div>

<?php ob_end_flush();
include('footer.php'); ?>