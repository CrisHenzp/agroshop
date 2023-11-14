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


<div  class="col-md-10 card card-body "  style="margin:auto;padding:auto;margin-bottom:15%">
        <h2>Historial de pedidos</h2>
        <br>
        <hr> 
        
        <table class="table borderless table-striped col-md-12">
            <tr WIDTH="100" HEIGHT="100">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Comprador</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>Naranjas</td>
                <td>10 (kg)</td>
                <td>$10.000</td>
                <td>Pedro Aguilar</td>
                <td>
                    <select name="estado" class="form-control form-control-sm ">
                        <option value="1" name="default"selected>En proceso</option>
                        <option value="2" name="2">Enviado</option>
                        <option value="3" name="3">Entregado</option>
                        <option value="4" name="4">Cancelado</option>
                    </select>
                </td>
                <td>
                    <a title="Guardar estado" href=""  class="btn " ><i style="color:#629A31;" class="fa fa-floppy-o fa-2x" ></i> </a>
                    <a href="" class="btn btn-small " ><i class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a> 
                </td>
            </tr>
            <tr>
                <td>Frutilla</td>
                <td>21 (kg)</td>
                <td>$15.000</td>
                <td>Sofia Jimenez</td>
                <td>
                    <select name="estado" class="form-control form-control-sm ">
                        <option value="1" name="default"selected>En proceso</option>
                        <option value="2" name="2">Enviado</option>
                        <option value="3" name="3">Entregado</option>
                        <option value="4" name="4">Cancelado</option>
                    </select>
                </td>
                <td>
                    <a title="Guardar estado" href=""  class="btn " ><i style="color:#629A31;" class="fa fa-floppy-o fa-2x" ></i> </a>
                    <a href="" class="btn btn-small " ><i class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a> 
                </td>
                 
            </tr>
            <tr>
                <td>Arandano</td>
                <td>12 (kg)</td>
                <td>$12.000</td>
                <td>Leopold Scotch</td>
                <td>
                    <select name="estado" class="form-control form-control-sm ">
                        <option value="1" name="default"selected>En proceso</option>
                        <option value="2" name="2">Enviado</option>
                        <option value="3" name="3">Entregado</option>
                        <option value="4" name="4">Cancelado</option>
                    </select>
                </td>
                <td>
                    <a title="Guardar estado" href=""  class="btn " ><i style="color:#629A31;" class="fa fa-floppy-o fa-2x" ></i> </a>
                    <a href="" class="btn btn-small " ><i class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a> 
                </td>
        </table>
    
</div>



<?php
include('footer.php'); ?>