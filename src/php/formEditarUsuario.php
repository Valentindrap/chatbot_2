<?php include("check_session.php"); ?>

<?php
require_once("./clases/usuario.class.php");

if (isset($_GET['id'])) {
    $usuario = Usuario::obtenerPorId($_GET['id']);
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<h2 style="text-align: center;">Editar Usuario</h2>

<form action="controller/usuario.controller.php" method="post" style="max-width: 400px; margin: auto;">
    <input type="hidden" name="operacion" value="actualizar">
    <input type="hidden" name="id" value="<?= $usuario->getId() ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $usuario->getNombre() ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $usuario->getEmail() ?>" required><br><br>

    <label>Nueva Contraseña (opcional):</label><br>
    <input type="password" name="password"><br><br>

    <label>Rol:</label><br>
    <input type="text" name="rol" value="<?= $usuario->getRolId() ?>" readonly><br><br>

    <input type="submit" value="Actualizar Usuario">
</form>
