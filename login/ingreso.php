<?php 
include_once '../config/config.php';

$usuario = $_POST['usuario_1'] ?? '';
$passwd = $_POST['pass'] ?? '';

session_start();


$consulta = "SELECT*FROM usuario where usu_usuario = '$usuario' and usu_pass = '$passwd'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_fetch_assoc($resultado);


if(isset($filas['id_tipousuario']) == 1){ //administrador 
    header("location:../menu_admin.php");

}else
if(isset($filas['id_tipousuario'])== 2){ // productor 
    header("location:../menu_productor.php");

}else
if(isset($filas['id_tipousuario'])== 3){ // comerciante
    header("location:../menu_comerciante.php");

}else
if(isset($filas['id_tipousuario'])== 4){ // productor 
    header("location:../menu_usuario.php");

}else{
    ?>

    <h1 classs = "bad">ERROR EN LA AUNTENTUTIFICACION</h1>
    <?php

}

mysqli_close($conexion);








?>