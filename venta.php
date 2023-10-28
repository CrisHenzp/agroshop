<?php include('header.php'); ?>

<br>
<!-- Control buttons -->
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Mostrar todo</button>
  <button class="btn" onclick="filterSelection('productor')"> Productor</button>
  <button class="btn" onclick="filterSelection('comerciante')"> Comerciante</button>
  <button class="btn" onclick="filterSelection('fruits')"> Fruits</button>
  <button class="btn" onclick="filterSelection('colors')"> Colors</button>
</div>
<br><br>
<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->

<div class="image-container">
  <div class="card filterDiv comerciante">
     <img src="https://santaisabel.vtexassets.com/arquivos/ids/174685-750-750?width=750&height=750"  alt="fruits" style="max-width: 100%; height: auto;">
      <h4>Manzana Roja Granel</h1>
      <p class="price">$1145</p>
      <p>500 g ($2.290 x kg)</p>
      <p>Comerciante: tal</p>
      <p><button>Agregar a carrito</button></p>
  </div>
  <div class="card filterDiv comerciante">
    <img src="https://santaisabel.vtexassets.com/arquivos/ids/169527/Platano-granel.jpg?v=637521224695700000" alt="fruits" style="max-width: 100%; height: auto;">
    <h4>Platanos granel</h1>
      <p class="price">$695</p>
      <p>500 g ($1.590 x kg)</p>
      <p>Productor: tal</p>
      <p><button>Agregar a carrito</button></p>
  </div>
  <div class="card filterDiv comerciante">
    <img src="https://jumbo.vtexassets.com/arquivos/ids/416214/Kiwi-exportacion-granel.jpg?v=637479990229300000" alt="fruits" style="max-width: 100%; height: auto;">
    <h4>Kiwi exportación granel</h1>
      <p class="price">$945</p>
      <p>500 g ($1.890 x kg)</p>
      <p>Productor: tal</p>
      <p><button>Agregar a carrito</button></p>
  </div>
  <div class="card filterDiv comerciante">
    <img src="https://santaisabel.vtexassets.com/arquivos/ids/162932-280-280?" alt="fruits" style="max-width: 100%; height: auto;">
    <h4>Naranja granel</h1>
      <p class="price">$1145</p>
      <p>500 g ($2.290 x kg)</p>
      <p>Productor: tal</p>
      <p><button>Agregar a carrito</button></p>
  </div>
  <div class="card filterDiv comerciante">
    <img src="https://santaisabel.vtexassets.com/arquivos/ids/162874-750-750?" alt="fruits" style="max-width: 100%; height: auto;">
    <h4>Frutilla pote 300 g</h1>
      <p class="price">$2490</p>
      <p>1 un ($8.300 x kg)</p>
      <p>Productor: tal</p>
      <p><button>Agregar a carrito</button></p>
  </div>
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