<?php

include('header.php');
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
  // Si el usuario no ha iniciado sesión, redirigir a la página de registro
  header('Location: registrar.php');
  exit();
}
ini_set('memory_limit', '-1');
include_once 'config/config.php';

$consulta = "SELECT * FROM producto a 
  inner join usuario b on a.id_usuario = b.id_usuario
  inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
  WHERE a.id_tipoproducto = 1 and b.id_tipousuario = 2 and a.pro_estado = 1";
$resultado = mysqli_query($conexion, $consulta);

$consulta2 = "SELECT * FROM producto a 
  inner join usuario b on a.id_usuario = b.id_usuario
  inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
  WHERE a.id_tipoproducto = 2 and b.id_tipousuario in (3,4) and a.pro_estado = 1";
$resultado2 = mysqli_query($conexion, $consulta2);

$consulta3 = "SELECT * FROM producto a 
  inner join usuario b on a.id_usuario = b.id_usuario
  inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
  WHERE a.pro_estado = 1";
$resultado3 = mysqli_query($conexion, $consulta3);


$productos1 = array(); // Array para almacenar los resultados de la primera consulta
$productos2 = array(); // Array para almacenar los resultados de la segunda consulta
$productos3 = array(); // Array para almacenar los resultados de la tercera consulta

// Agregar todos los resultados a las matrices de productos correspondientes
while ($productoadmin = mysqli_fetch_assoc($resultado)) {
  $productos1[] = $productoadmin;
}
while ($productoadmin2 = mysqli_fetch_assoc($resultado2)) {
  $productos2[] = $productoadmin2;
}
while ($productoadmin3 = mysqli_fetch_assoc($resultado3)) {
  $productos3[] = $productoadmin3;
}
?>

<?php
$id_usuario = $_SESSION["id_usuario"];
$consulta4 = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' ";
$resultado4 = mysqli_query($conexion, $consulta4);
$usuario4 = mysqli_fetch_assoc($resultado4);
if ($usuario4['id_tipousuario'] == 2 || $usuario4['id_tipousuario'] == 3) {
  foreach ($productos1 as $producto) {
    ?>
    <h3>productos de productores</h3>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="card filterDiv">
            
            <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
              <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits" style="max-width: 100%; height: 250px;">
              <h4>
                <?php echo $producto['pro_nombre']; ?>
              </h4>
              <p class="price">$
                <?php echo $producto['pro_precio']; ?> x caja
              </p>
              <p>
                <?php echo $producto['pro_descripcion']; ?>
              </p>
              <p>
                <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
                <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
              </p>
              <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
              <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
              <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
              <input type="hidden" name="cantidad" value="1">
              <p><button class="agregar-carrito" type="submit" data-id="<?php echo $producto['id_producto']; ?>">Agregar al
                  carrito</button></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php }
} ?>



<!-- Producto con diseño -->
<?php
if ($usuario4['id_tipousuario'] == 3 || $usuario4['id_tipousuario'] == 4) {
  foreach ($productos2 as $producto) {
    ?>
    <h3>Productos de comerciantes</h3>
    <div class="container ">
      <div class="row">
        <div class="col-sm-3">
        <div class="card" style="width: 18rem;text-align:left">
        <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
          <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits" style="max-width: 100%; height: 250px;">
          <div class="card-body">
            <h5 class="card-title"> 
              <?php echo $producto['pro_nombre']; ?>
              <span style="font-size:16px;">$<?php echo $producto['pro_precio']; ?> x kg</span>
            </h5>
            <div class="card-subtitle text-muted"> 
              <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
              <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
            </div>
            <p class="card-text"><?php echo $producto['pro_descripcion']; ?></p>
          </div>
          </p>
              <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
              <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
              <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
              <input type="hidden" name="cantidad" value="1">
              <p><button class="agregar-carrito" type="submit" data-id="<?php echo $producto['id_producto']; ?>">Agregar al carrito</button></p>
            </form>
        </div>
        </div>
      </div>
    </div>
  <?php 
  }
} ?>

<?php if ($usuario4['id_tipousuario'] == 1) { ?>
  <h3>listado de productos</h3>
  <div class="container">
    <div class="row">
      <?php
      foreach ($productos3 as $producto) {
        ?>
        <div class="col-sm-3">
          <div class="card">
            
            <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
              <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits" style="max-width: 100%; height: 250px;">
              <h4>
                <?php echo $producto['pro_nombre']; ?>
              </h4>
              <p class="price">$
                <?php echo $producto['pro_precio']; ?> x kg
              </p>
              <p>
                <?php echo $producto['pro_descripcion']; ?>
              </p>
              <p>
                <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
                <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
              </p>
              <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
              <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
              <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
              <input type="hidden" name="cantidad" value="1">
              <p><button class="agregar-carrito" type="submit" data-id="<?php echo $producto['id_producto']; ?>">Agregar
                  al
                  carrito</button></p>
            </form>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>


<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;

  }

  .card p {
    max-height: 100px;
    /* Ajusta este valor según tus necesidades */
    overflow: hidden;
    text-overflow: ellipsis;
  }


  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .card button:hover {
    opacity: 0.7;
  }

  .container {
    overflow: hidden;
  }
</style>

<br><br><br><br><br>

</body>

</html>
<?php include('footer.php'); ?>