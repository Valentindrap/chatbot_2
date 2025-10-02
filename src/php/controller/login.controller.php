<?php
session_start();
require_once("../clases/usuario.class.php");

$operacion = $_POST['operacion'] ?? $_GET['operacion'] ?? null;

if ($operacion === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $usuario = Usuario::verificarLogin($email, $password);

    if ($usuario) {
        $_SESSION['id'] = $usuario->getId();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['rol_id'] = $usuario->getRolId();

        header("Location: ../../entrada.php");
        exit;
    } else {
        echo "❌ Email o contraseña incorrectos. <a href='../../login.html'>Volver</a>";
        exit;
    }
}
elseif ($operacion === 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../../login.html");
    exit;
}
