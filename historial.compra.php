<?php include('header.php'); 

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }
  
  // Comprobar si el usuario es un administrador
  if ($_SESSION['tipo_usuario'] != 1) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
  } else if ($_SESSION['tipo_usuario'] == 2) {
    header('Location: index.php');
  
  } else if ($_SESSION['tipo_usuario'] == 3) {
    header('Location: index.php');
  
  } else if ($_SESSION['tipo_usuario'] == 4) {
    header('Location: index.php');
    exit;
  }
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>


<br><br>
<h2>historial de compra</h2>
<div>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>estado</th>
            <th>comerciante</th>
            <th>factura</th>
        </tr>
        <tr>
            <td>naraja</td>
            <td>10</td>
            <td>entregado</td>
            <td>juan</td>
            <td>
                <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a>
            </td>
        </tr>
        <tr>
            <td>frutilla</td>
            <td>21</td>
            <td>entregado</td>
            <td>juan</td>
            <td>
                <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a>
            </td>
        </tr>
        <tr>
            <td>arandano</td>
            <td>12</td>
            <td>en proceso</td>
            <td>juan</td>
            <td>
                <a href="" class="btn btn-small "><i class="fa-solid fa-download"></i></a>
            </td>
        </tr>

    </table>
</div>
<br><br><br><br><br><br><br><br><br><br>
<style>
    table {
        margin-left: auto;
        margin-right: auto;

        border-collapse: collapse;
        border-spacing: 0;
        width: 70%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: center;
        padding: 16px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<?php
include('footer.php'); ?>