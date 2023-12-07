<?php include('header.php');
include_once 'config/config.php';

// Comprobar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
$id_usuario = $_SESSION['id_usuario'];
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<br><br>
<h2>Mis compras</h2>
<br><br>
<div class="card" style="margin:auto; ">
    <br>
    <div class="card-body " style="overflow-x:auto;">
        <table class="table borderless table-striped">
            <tr WIDTH="auto" HEIGHT="auto">
                <th>ID pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Factura</th>
            </tr>
            <?php $query = "SELECT * FROM pedido WHERE id_usuario = $id_usuario";

            $resultado_pedido = mysqli_query($conexion, $query);

            while($pedido = mysqli_fetch_assoc($resultado_pedido)) { ?>
                <tr>
                    <td>
                        <?php echo $pedido['id_pedido']; ?>
                    </td>
                    <td>
                        <?php echo $pedido['ped_fecha']; ?>
                    </td>
                    <td>$
                        <?php echo number_format($pedido['ped_totalf'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?php if($pedido['ped_estadop'] == 1) {
                            echo "En proceso";
                        } elseif($pedido['ped_estadop'] == 2) {
                            echo "Enviado";

                        } elseif($pedido['ped_estadop'] == 3) {
                            echo "Entregado";
                        } else {
                            echo "Cancelado";
                        }
                        ; ?>
                    </td>
                    <td>
                        <?php
                        if($pedido['ped_estadop'] == 3) { ?>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">comentar</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <form action="agregar_observacion.php" method="post">
                                        <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">
                                        <textarea class="observacion" name="observacion" placeholder="Añade tu observación aquí"></textarea>
                                        <button class="btn2" type="submit">Guardar observación</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        } elseif($pedido['ped_estadop'] == 4) {
                            echo "Cancelado";
                        } else {
                            echo "No entregado";
                        } ?>
                    </td>
                    <td onclick="location.href='factura/invoice.php?dat=<?php echo $pedido['ped_ref']; ?>'"> <a
                            class="btn btn-small "><i class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<br><br>
<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #3c6a36;
        color: #ffffff;
        font-size: 16px;
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        border-radius: 3px;
        border-color: #3c6a36;
    }
    .btn2{
        background-color: #3c6a36;
        color: #ffffff;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 3px;
        border-color: #3c6a36;
        margin: 5px;
    }
    .observacion{
        margin: 10px;
        font-size: large;
    }
    /* Dropdown button on hover & focus */
    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #151515;
    }
    .btn2:hover,
    .btn2:focus {
        background-color: #151515;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {
        display: block;
    }
</style>

<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<?php include('footer.php'); ?>