<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!-- Google Fonts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- Estilos -->
  <title> Login y Registro</title>
  <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
</head>

<body>

  <div class="login-page">
    <img src="Public/images/logo-default-196x47.png" alt="Descripción de la imagen">
    <div class="form">
      <form class="login-form" action="login/ingreso.php" method="post">
        <input type="text" name="usuario_1" placeholder="usuario" required />
        <input type="password" name="pass" placeholder="Contraseña" required />
        <button type="submit" value="iniciar" name="iniciar_sesion">Iniciar sesion</button>
        <p class="message">No estas registrado? <a href="#">Crear cuenta</a></p>
        <p class="message">Olvidaste tu contraseña? <a href="recuperar.php">Recuperar</a></p>
      </form>

      <form class="register-form" action="login/registro_usu.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required />
        <input type="text" name="apellido" placeholder="Apellido" required />
        <input type="text" name="usuario" placeholder="usuario" required />
        <input type="text" name="email" placeholder="Correo electronico" required />
        <input type="password" name="pass" placeholder="Contraseña" required />
        <input type="text" name="telefono" placeholder="Teléfono" required />
        <input type="text" name="direccion" placeholder="Dirección" required />
        <select name="tipo_usuario">
          <option value="2" name="2">Productor</option>
          <option value="3" name="3">Comerciante</option>
          <option value="4" name="4">Cliente</option>
        </select>
        <br><br>
        <button type="submit" value="registro" name="registrar">Registar</button>
        <p class="message">Ya estas registrado? <a href="#">Iniciar sesion</a></p>
      </form>
    </div>
  </div>

  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }

    .form {
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }

    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #4CAF50;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      background: #43A047;
    }

    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }

    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }

    .form .register-form {
      display: none;
    }

    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }

    .container:before,
    .container:after {
      content: "";
      display: block;
      clear: both;
    }

    .container .info {
      margin: 50px auto;
      text-align: center;
    }

    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }

    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }

    .container .info span a {
      color: #000000;
      text-decoration: none;
    }

    .container .info span .fa {
      color: #EF3B3A;
    }

    body {
      background: #76b852;
      /* fallback for old browsers */
      background: rgb(141, 194, 111);
      background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%);
      font-family: "Roboto", sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
  <script>
    $('.message a').click(function () {
      $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });
  </script>
</body>

</html>