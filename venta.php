<?php include('header.php'); ?>

<br><br><br><br><br>

<div class="" >

<div class="card">
  <img src="jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h4>Tailored Jeans</h1>
    <p class="price">$19.99</p>
    <p>Some text about the jeans..</p>
    <p><button>Add to Cart</button></p>
</div>
<div class="card">
  <img src="jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h4>Tailored Jeans</h1>
    <p class="price">$19.99</p>
    <p>Some text about the jeans..</p>
    <p><button>Add to Cart</button></p>
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
</style>
<br><br><br><br><br>
<?php include('footer.php'); ?>
</body>

</html>