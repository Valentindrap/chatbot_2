<?php
require_once("./clases/usuario.class.php");
$usuarios = Usuario::obtenerTodas();
?>

<h2 style="text-align: center;">Lista de Usuarios</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaUsuario.php">Nuevo Usuario</a>
</div>

<?php if (!$usuarios): ?>
    <p style="text-align: center;">No hay usuarios registrados.</p>
<?php else: ?>
<table border="1" cellpadding="5" style="margin: auto;">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario->getId() ?></td>
            <td><?= $usuario->getNombre() ?></td>
            <td><?= $usuario->getEmail() ?></td>
            <td><?= $usuario->getRolId() ?></td>
            <td>
                <a href="formEditarUsuario.php?id=<?= $usuario->getId() ?>">Editar</a>

                <form action="controller/usuario.controller.php" method="post" style="display:inline;">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                    <input type="submit" onclick="return confirm('¿Está seguro de eliminar este usuario?')" value="Eliminar">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
