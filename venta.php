<?php include('header.php'); 
  ini_set('memory_limit', '-1');
  include_once 'config/config.php';

  $consulta = "SELECT * FROM producto a 
      inner join usuario b on a.id_usuario = b.id_usuario
      WHERE a.pro_tipo = 1 and b.id_tipousuario = 2 and a.pro_estado = 1";
  $resultado = mysqli_query($conexion, $consulta);
    $productoadmin = mysqli_fetch_assoc($resultado);

    $consulta2 = "SELECT * FROM producto a 
      inner join usuario b on a.id_usuario = b.id_usuario
      WHERE a.pro_tipo = 2 and b.id_tipousuario in (3,4) and a.pro_estado = 1";
  $resultado2 = mysqli_query($conexion, $consulta2);
    $productoadmin2 = mysqli_fetch_assoc($resultado2);

    $consulta3 = "SELECT * FROM producto a 
      inner join usuario b on a.id_usuario = b.id_usuario
      inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
      WHERE b.id_tipousuario = 1 and a.pro_estado = 1";
  $resultado3 = mysqli_query($conexion, $consulta3);
    $productoadmin3 = mysqli_fetch_assoc($resultado3);

    $productos = array(); // Inicializar un array para almacenar los resultados

    $productos[]= $productoadmin3;



?>


<div class="image-container">
  <?php
      foreach ($productos as $producto) {
  ?>
  <div class="card filterDiv comerciante">
     <img src="<?php echo $producto['pro_imagen'];?>"  alt="fruits" style="max-width: 100%; height: auto;">
      <h4><?php echo $producto['pro_nombre']; ?></h4>
      <p class="price">$ <?php echo $producto['pro_precio'];?></p>
      <p><?php echo $producto['pro_descripcion'];?></p>
      <p><?php echo $producto['tus_nombre']?>: <?php echo $producto['usu_nombre'].' '.$producto['usu_apellido'];?></p>
      <p><button id= "agregar_producto">Agregar a carrito</button></p>
  </div>
  <?php } ?>
</div>

<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .price {
    color: grey;
    font-size: 22px;
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

  .filterDiv {
    float: left;
    margin: 10px;
    display: none;
    /* Hidden by default */
  }

  /* The "show" class is added to the filtered elements */
  .show {
    display: block;
  }

  /* Style the buttons */
  .btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
  }

  /* Add a light grey background on mouse-over */
  .btn:hover {
    background-color: #ddd;
  }

  /* Add a dark background to the active button */
  .btn.active {
    background-color: #666;
    color: white;
  }
</style>
<script>

  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  // Show filtered elements
  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
      }
    }
  }

  // Hide elements that are not selected
  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current control button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
</script>

<br><br><br><br><br>
<?php include('footer.php'); ?>
</body>

</html>