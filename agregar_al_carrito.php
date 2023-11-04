<?php
session_start();
include_once 'config/config.php';

if (isset($_POST['pro_nombre'], $_POST['pro_imagen'], $_POST['pro_precio'],$_POST['cantidad'])) {
    $nombre = $_POST['pro_nombre'];
    $imagen = $_POST['pro_imagen'];
    $precio = $_POST['pro_precio'];
    $cantidad = $_POST['cantidad'];
  
    // Agregar el producto al carrito en la sesión
    if (!isset($_SESSION['carrito'])) {
      $_SESSION['carrito'] = array();
    }
    $_SESSION['carrito'][] = array("pro_nombre"=>$nombre, "pro_imagen"=>$imagen, "pro_precio"=>$precio,"cantidad"=>$cantidad);
  
  }
  header("location: ".$_SERVER['HTTP_REFERER']."");
?>