<?php
// login.php
session_start();
$errorMsg = '';

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'missing':
            $errorMsg = 'Completa todos los campos.';
            break;
        case 'email':
            $errorMsg = 'El correo no es válido.';
            break;
        case 'cred':
            $errorMsg = 'Credenciales incorrectas.';
            break;
        case 'server':
            $errorMsg = 'Error interno del servidor.';
            break;
        default:
            $errorMsg = 'Ocurrió un error.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>

    <?php if ($errorMsg): ?>
        <p style="color:red;"><?php echo htmlspecialchars($errorMsg); ?></p>
    <?php endif; ?>

    <form method="POST" action="src/php/controller/login.controller.php">
        <input type="hidden" name="operacion" value="login">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Ingresar</button>
    </form>

    <br>
    <form method="POST" action="src/php/controller/login.controller.php">
        <input type="hidden" name="operacion" value="logout">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
