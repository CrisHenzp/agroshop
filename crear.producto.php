<?php include('header.php'); ?>



<div class="row" style="margin:auto;height: auto">
        <div class="card card-body col-3" style="margin-left:2%">
            <h3>Crear nuevo producto</h3>
            <hr>
                <form action="../App/Controller/comerciante/gestion_frutas.php" method="POST">
                    <div class="form-group" style="text-align:left;font-weight:bold">
                        <label style="margin-top:3%">Nombre del fruto</label>
                        <input  type="text" name="nombre_fruta" class="form-control" placeholder="Ej. Naranja de sangre" />
                        <div class="mt-2" >
                            <label>Imagen del fruto</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <label style="margin-top:3%">Cantidad de fruta</label>
                        <input  type="text" name="cantidad_fruta" class="form-control" placeholder="Ej. 1000 (kg)" />
                        
                        
                        
                        <label style="margin-top:3%">Descripción</label>
                        <textarea  type="text" name="cantidad_fruta" class="form-control" placeholder="Ej. Las Naranjas de sangre se diferencian en otras variedades, aparte de por el color, porque tienen pocas semillas y son muy tiernas. Además, tienen un sabor más ácido y un tamaño inferior al de la naranja común"></textarea>
                        <button style="margin-top:3%" class="btn btn-success btn-block" type="submit" value="Guardar" name="Guardar">Guardar</button>
                </form>
            </div>
    </div>
    
    <div  class="col-md-8 card card-body" style="margin-left:2%">
        <h3>Mis productos</h3>
        <hr> 
        <div class="row mt-2" style="margin:auto;height: auto">
        <table class="table borderless table-striped">
            <tr WIDTH="100" HEIGHT="100">
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr >
                <td>Naranja de sangre</td>
                <td >Las Naranjas de sangre tienen un sabor más ácido y un tamaño inferior al de la naranja común</td>
                <td>50</td>
                <td>Disponible</td>
                <td class="btn ">
                    <a href=""  style="color:green" class="btn col-2" title="Editar producto">
                    <i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="" style="color:#F07155;"class="btn col-2" title="Eliminar producto de la existencia">
                    <i class="fa fa-trash fa-2x"></i></a>
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
</div>




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
<?php include('footer.php'); ?>