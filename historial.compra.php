<?php include('header.php'); 
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }
  
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>


<br><br>


<div  class="col-md-10 card card-body mb-5"  style="margin:auto;padding:auto;">
        <h2>Mis compras</h2>
        <br>
        <hr> 
        
        <table class="table borderless table-striped col-md-12">
            <tr WIDTH="100" HEIGHT="100">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Vendedor</th>
                <th>Factura</th>
            </tr>
            <tr>
                <td>Naranjas</td>
                <td>10 (kg)</td>
                <td>Entregado</td>
                <td>Juan</td>
                <td> <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a> </td>
            </tr>
            <tr>
                <td>Frutilla</td>
                <td>21 (kg)</td>
                <td>Entregado</td>
                <td>Juan</td>
                <td> <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a> </td>
            </tr>
            <tr>
                <td>Arandano</td>
                <td>12 (kg)</td>
                <td>En proceso</td>
                <td>Juan</td>
                <td> <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a> </td>
            </tr>
        </table>
    
</div>



<?php
include('footer.php'); ?>