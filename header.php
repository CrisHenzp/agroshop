<?php
if (!isset($_SESSION)) {
  session_start();
}
$usuarios = $_SESSION['usu_apodo'] ?? null;
$admin = $_SESSION['id_tipousuario'] ?? null;

?>




<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Agroshop</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="Public/fonts.googleapis.com/css?family=Poppins:300,400,500">
  <link rel="stylesheet" href="Public/css/bootstrap.css">
  <link rel="stylesheet" href="Public/css/fonts.css">
  <link rel="stylesheet" href="Public/css/style.css">
</head>

<div class="preloader">
  <div class="preloader-body">
    <div class="cssload-container"><span></span><span></span><span></span><span></span>
    </div>
  </div>
</div>
<div class="page">
  <!-- Page Header-->
  <header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap rd-navbar-modern-wrap">
      <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
        data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
        data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
        data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
        data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
        data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand" href="index.php"><img
                    src="Public/images/logo-default-196x47.png" alt="" width="196" height="47" /></a></div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Basket-->
                <div class="rd-navbar-basket-wrap">
                  <button class="rd-navbar-basket fl-bigmug-line-shopping198"
                    data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                  <div class="cart-inline">
                    <div class="cart-inline-header">
                      <h5 class="cart-inline-title">En carro:<span> 2</span> Productos</h5>
                      <h6 class="cart-inline-title">Total: <span> $800</span></h6>
                    </div>
                    <div class="cart-inline-body">
                      <div class="cart-inline-item">
                        <div class="unit align-items-center">
                          <div class="unit-left"><a class="cart-inline-figure" href="#"><img
                                src="Public/images/product-mini-1-108x100.png" alt="" width="108" height="100" /></a>
                          </div>
                          <div class="unit-body">
                            <h6 class="cart-inline-name"><a href="#">Frutillas</a></h6>
                            <div>
                              <div class="group-xs group-inline-middle">
                                <div class="table-cart-stepper">
                                  <input class="form-input" type="number" data-zeros="true" value="1" min="1"
                                    max="1000">
                                </div>
                                <h6 class="cart-inline-title">$1550</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-inline-item">
                        <div class="unit align-items-center">
                          <div class="unit-left"><a class="cart-inline-figure" href="#"><img
                                src="Public/images/product-mini-2-108x100.png" alt="" width="108" height="100" /></a>
                          </div>
                          <div class="unit-body">
                            <h6 class="cart-inline-name"><a href="#">Platano</a></h6>
                            <div>
                              <div class="group-xs group-inline-middle">
                                <div class="table-cart-stepper">
                                  <input class="form-input" type="number" data-zeros="true" value="1" min="1"
                                    max="1000">
                                </div>
                                <h6 class="cart-inline-title">$1250</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="cart-inline-footer">
                      <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha"
                          href="carrito.php">ir carrito</a><a class="button button-md button-primary button-pipaluk"
                          href="carrito.php">Pagar</a></div>
                    </div>
                  </div>
                </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198"
                  href="#"><span>2</span></a>
                <!-- RD Navbar Search-->
                <div class="rd-navbar-search">
                  <button class="rd-navbar-search-toggle"
                    data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                  <form class="rd-search" action="#">
                    <div class="form-wrap">
                      <label class="form-label" for="rd-navbar-search-form-input">Buscar...</label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text"
                        name="search">
                      <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                    </div>
                  </form>
                </div>
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="venta.php">Productos</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="sobre_nosotros.php">Sobre Nosotros</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacto.php">Contactanos</a>
                  </li>
                </ul>
              </div>
              <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main"
                data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span
                    class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span>
                </div>
                <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span
                    class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                </div>
                <div class="project-close"><span></span><span></span></div>
              </div>
            </div>

            <div class="rd-navbar-project rd-navbar-modern-project">
              <div class="rd-navbar-project-modern-header">
                <h4 class="rd-navbar-project-modern-title">Perfil </h4>
                <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main"
                  data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                  <div class="project-close"><span></span><span></span></div>
                </div>
              </div>
              <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                <div class="container">
                  <div class="left box-primary">

                    <h3 class="username text-center"> </h3>

                    <a href="editar_perfil.php" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
                    <a href="menu_usuario.php" class="btn btn-primary btn-block"><b>Historial de Compra</b></a>
                    <a href="menu_admin.php" class="btn btn-primary btn-block"><b>administrador</b></a>
                    <a href="menu_comerciante.php" class="btn btn-primary btn-block"><b>comerciante</b></a>
                    <?php if ($usuarios == $usuarios): ?>
                      <a href="registrar.php" class="btn btn-primary btn-block"><b>Iniciar sesion</b></a>

                    <?php endif; ?>

                    <?php if ($usuarios ==NULL): ?>
                    <a class="btn btn-primary btn-block" action="login/cerrar.session.php"><b>Cerrar Sesion</b></a>
                    <?php endif; ?>
                  </div>
                </div>

                <br><br><br>
                <div class="bottom text-center">
                  No estas registrado? <a href="registrar.php"><b>Registrate</b></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>