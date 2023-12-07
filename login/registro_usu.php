<?php
session_start();
include_once '../config/config.php';

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $estado = 1;

    // Validación de RUT
    if (!validarRut($rut)) {
        $_SESSION['error_message'] = "El RUT ingresado no es válido.";
        header("location:../registrar.php#rut"); // Se agrega el ancla para enfocar en el campo de RUT
        exit();
    }

    // Validación de contraseña
    if (strlen($pass) < 6) {
        $_SESSION['error_message'] = "La contraseña debe tener al menos 6 caracteres.";
        header("location:../registrar.php#password"); // Se agrega el ancla para enfocar en el campo de contraseña
        exit();
    }

    // Verificar si el correo ya existe
    $query_email = "SELECT * FROM usuario WHERE usu_email = '$email'";
    $result_email = mysqli_query($conexion, $query_email);
    if (mysqli_num_rows($result_email) > 0) {
        $_SESSION['error_message'] = "El correo electrónico ya está registrado.";
        header("location:../registrar.php#email");
        exit();
    }

    // Verificar si el nombre de usuario ya existe
    $query_usuario = "SELECT * FROM usuario WHERE usu_usuario = '$usuario'";
    $result_usuario = mysqli_query($conexion, $query_usuario);
    if (mysqli_num_rows($result_usuario) > 0) {
        $_SESSION['error_message'] = "El nombre de usuario ya está registrado.";
        header("location:../registrar.php#usuario");
        exit();
    }

    // Verificar si el RUT ya existe
    $query_rut = "SELECT * FROM usuario WHERE usu_rut = '$rut'";
    $result_rut = mysqli_query($conexion, $query_rut);
    if (mysqli_num_rows($result_rut) > 0) {
        $_SESSION['error_message'] = "El RUT ya está registrado.";
        header("location:../registrar.php#rut");
        exit();
    }

    // Hasheo de la contraseña (usando password_hash para mayor seguridad)
    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuario (usu_nombre, usu_apellido, usu_rut , usu_usuario, usu_email, usu_pass, usu_telefono, usu_direccion, id_tipousuario, usu_estado) VALUES ('$nombre', '$apellido', '$rut', '$usuario', '$email', '$pass_hashed', '$telefono', '$direccion', '$tipo_usuario', '$estado')";

    if (mysqli_query($conexion, $query)) {
        $_SESSION['success_message'] = "¡Te has registrado correctamente!";
        header("location:../registrar.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    }
}

// Función para validar RUT chileno
function validarRut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;

    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8)
            $i = 2;

        $suma += $v * $i;
        ++$i;
    }

    $dvr = 11 - ($suma % 11);

    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';

    return $dvr == strtoupper($dv);
}
?>
