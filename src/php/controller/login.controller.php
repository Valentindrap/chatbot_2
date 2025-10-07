<?php
// src/php/controllers/login.controller.php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../clases/usuario.class.php'; // ajustá si tu ruta cambia

function redirect(string $path, array $params = []): void {
    $qs = $params ? '?' . http_build_query($params) : '';
    header("Location: $path$qs");
    exit;
}

$operacion = $_POST['operacion'] ?? $_GET['operacion'] ?? null;

if ($operacion === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        redirect('../../../login.php', ['error' => 'missing']);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect('../../../login.php', ['error' => 'email']);
    }

    $usuario = Usuario::verificarLogin($email, $password);

    if ($usuario) {
        $_SESSION['id']     = $usuario->getId();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['rol_id'] = $usuario->getRolId();
        session_regenerate_id(true);

        redirect('../../../entrada.php'); // éxito
    } else {
        redirect('../../../login.php', ['error' => 'cred']);
    }
}

if ($operacion === 'logout') {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
    redirect('../../../login.php');
}

// fallback: vuelve al login
redirect('../../../login.php');
