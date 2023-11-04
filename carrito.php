<?php include('header.php'); ?>

<div class="container">
  <h1>Carrito de compras</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['carrito'] as $producto): ?>
        <tr>
          <td><img style="width: 108px; height: 100px;" src="<?php echo $producto['pro_imagen']; ?>" alt="" /></td>
          <td><?php echo $producto['pro_nombre']; ?></td>
          <td>$<?php echo $producto['pro_precio']; ?></td>
          <td>1</td> <!-- Asume que la cantidad de cada producto es 1 -->
          <td>$<?php echo $producto['pro_precio']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="text-right">
    <h4>Total: $<?php echo number_format($totalPrecio, 2); ?></h4>
    <a href="checkout.php" class="btn btn-primary">Proceder al pago</a>
  </div>
</div>

<?php include('footer.php'); ?>