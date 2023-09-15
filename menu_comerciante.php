<?php include('header.php'); ?>


<div class="comerciante-menu">
    <h2>Menu de Comerciante</h2>
    <form action="../App/Controller/comerciante/gestion_frutas.php" method="post">
        <input type="text" name="nombre_fruta" placeholder="Nombre de la fruta" />
        <input type="text" name="cantidad_fruta" placeholder="Cantidad" />
        <button type="submit" value="agregar_fruta" name="agregar_fruta">Agregar Fruta</button>
        <button type="submit" value="editar_fruta" name="editar_fruta">Editar Fruta</button>
        <button type="submit" value="actualizar_fruta" name="actualizar_fruta">Actualizar Fruta</button>
        <button type="submit" value="eliminar_fruta" name="eliminar_fruta">Eliminar Fruta</button>
    </form>
</div>



<script>
    // Aquí puede agregar su código JavaScript si es necesario
</script>

<?php include('footer.php'); ?>