<?php include('header.php');

?>
<br>
<div class="container">
  <h2>Carrito de compras</h2>
  <br><br><br><br>
  <table class="table">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['carrito'] as $producto): ?>
        <tr>
          <td><img style="width: 108px; height: 100px;" src="<?php echo $producto['pro_imagen']; ?>" alt="" /></td>
          <td>
            <?php echo $producto['pro_nombre']; ?>
          </td>
          <td>$
            <?php echo $producto['pro_precio']; ?>
          </td>
          <td>1</td> <!-- Asume que la cantidad de cada producto es 1 -->
          <td>$
            <?php echo $producto['pro_precio']; ?>
          </td>
          <td>
            <div class="table-cart-stepper row">
              <div class="col-1 ">
                <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
              </div>
              <div class="col-1">
                <a href="" style="color:#F07155;" class="btn col-2" title="Eliminar">
                  <i class="fa fa-trash fa-lg"></i>
                </a>
              </div>
            </div>

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="text-right">
    <h4>Total: $
      <?php echo number_format($totalPrecio, 2); ?>
    </h4>
    <form name="brouterForm" id="brouterForm" action="checkout.php" method="POST">
      <input type="submit" value="submit">
      
    </form>
    <button href="checkout.php"> aaa</button>
  </div>
</div>
<br><br><br><br><br><br><br>
<?php include('footer.php'); ?>