<?php
require_once("./clases/usuario.class.php");
?>

<h2 style="text-align: center;">Nuevo Usuario</h2>

<form action="controller/usuario.controller.php" method="post" style="max-width: 400px; margin: auto;">
    <input type="hidden" name="operacion" value="guardar">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Rol:</label><br>
    <input type="text" name="rol" required><br><br>

    <input type="submit" value="Crear Usuario">
</form>
