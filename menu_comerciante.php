<?php include('header.php'); ?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>



<div class="comerciante-menu">
    <h2>Menu de Comerciante</h2>
    <form action="../App/Controller/comerciante/gestion_frutas.php" method="post">
        <input type="text" name="nombre_fruta" placeholder="Nombre de la fruta" />
        <input type="text" name="cantidad_fruta" placeholder="Cantidad" />
        <button type="submit" value="agregar_fruta" name="agregar_fruta">Agregar Fruta</button>
    </form>
</div>
<br><br>
<h2>Listar mis productos</h2>
<div>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Stock</th>
            <th>opciones</th>
        </tr>
        <tr>
            <td>naraja</td>
            <td>10</td>
            <td>50</td>
            <td>
                <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td>frutilla</td>
            <td>51</td>
            <td>94</td>
            <td>
                <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td>arandano</td>
            <td>12</td>
            <td>67</td>
            <td>
                <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
<script>
    // Aquí puede agregar su código JavaScript si es necesario
</script>

<?php include('footer.php'); ?>