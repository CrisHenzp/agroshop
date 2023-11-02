<?php

$active_facturas = "";
$active_productos = "";
$active_clientes = "";
$active_usuarios = "";
$active_perfil = "active";
$title = "Perfil";

?>

<?php include("header.php"); ?>


<div class="row" style="margin:auto;height: auto">
        <div class="card card-body col-7" style="margin-left:2%">
            <h3 >     
            <i class='fa fa-address-card-o' style="font-family:Poppins;font-size:30px;font-weight:bold"> Editar perfil</i>  
            </h3>
            <hr>
            <div class="form-group" style="text-align:left;font-weight:bold">
                <form method="post" id="perfil"> 
                <div class="container mt-4" style="font-weight:bold">
                        <div class="row">
                            <div class="col">
                                <label for="nombre" >Nombre</label>
                                <input type="text" class="form-control"name="nombre" value="<?php echo $row[''] ?>" placeholder="Apellido" required>
                            </div>
                            <div class="col">
                                <label for="apellido" >Apellido</label>
                                <input type="text" class="form-control " name="apellido" value="<?php echo $row[''] ?>" placeholder="Apellido" required>
                            </div>
                            <div class="col">
                                <label for="apellido" >Usuario</label>
                                <input type="text" class="form-control " name="usuario" value="<?php echo $row[''] ?>" placeholder="Apellido" required>
                            </div>
                        </div>
                    </div>

                    <div class="container" style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label>Correo electrónico:</label>
                            <input type="email" class="form-control" name="correo"value="<?php echo $row[''] ?>">
                        </div>
                        <div class="col">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" required name="telefono" value="<?php echo $row[''] ?>">
                        </div>
                    </div>
                    </div>  

                    <div class="container " style="font-weight:bold">
                        <div class="row">
                            <div class="col">
                            <label>Direccion:</label>
                            <input type="text" class="form-control " name="direccion" value="<?php echo $row[""]; ?>" required>
                            </div>
                        </div>
                    </div>
                
                    <div class="container">
                        <div class="row">
                                <div class="col">
                                    <a   href="menu_usuario.php" class="btn btn-sm  " style="background-color:#F07155;border:none;"><i class="fa fa-arrow-left fa-2x" style="color:white;" > Volver </i></a>
                                </div>
                            <div class="col">
                            </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-sm btn-primary" style="font-size:10px"><i class="fa fa-floppy-o fa-2x"  style="color:white;">  Actualizar datos</i></button>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    <div  class="col-md-4 card card-body" style="margin-left:2%">
        <h3 >     
            <i class='fa fa-key' style="font-family:Poppins;font-size:30px;font-weight:bold"> Cambiar contraseña</i>  
        </h3>
        <hr> 
        <div class="row mt-2" style="margin:auto;height: auto">
        <form method="post" id="newpass">                   
                    <div class="container " style="font-weight:bold">
                    <div class="row">
                            <div class="col">
                                <label for="contra" >Contraseña actual</label>
                                <input type="text" class="form-control"name="contra" value="<?php echo $row[''] ?>" placeholder="Contraseña" required>
                            </div>
                        <div class="row">
                            <div class="col">
                                <label for="contra" >Nueva contraseña</label>
                                <input type="text" class="form-control"name="contra" value="<?php echo $row[''] ?>" placeholder="Contraseña" required>
                            </div>
                            <div class="col">
                                <label for="contra2" >Repetir nueva contraseña</label>
                                <input type="text" class="form-control " name="contra2" value="<?php echo $row[''] ?>" placeholder="Repetir contraseña" required>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                                <div class="col">
                                    
                                </div>
                            <div class="col">
                            </div>
                                <div class="col mt-5">
                                    <button type="submit" class="btn btn-sm btn-primary" style="font-size:10px"><i class="fa fa-floppy-o fa-2x"  style="color:white;"> Cambiar contraseña</i></button>
                                </div>
                        </div>
                    </div>
                        
                    </div>
        </form>
           
            

        
    </div>
</div>


<?php
include("footer.php");
?>