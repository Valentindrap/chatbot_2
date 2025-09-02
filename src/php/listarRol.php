<?php include("check_session.php"); ?>

<?php

require_once("./clases/rol.class.php");
$roles = Rol::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<h2 style="text-align: center;">Lista de Rols</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaRol.php">Nuevo Rol</a>
</div>
<a href="../../entrada.php">Volver</a>
    <?php
    if($roles == null){
        echo "No hay roles";
    }
    ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($roles as $rol){ ?>
        <tr>
            <td><?= $rol['id'] ?></td>
            <td><?= $rol['nombre'] ?></td>
            <td>
                

                <form action="controller/rol.controller.php" method="post">
                    <a href="formEditarRol.php?id=<?= $rol['id'] ?>">Editar</a>
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $rol['id'] ?>">
                    <input type="submit" onclick="return confirm('¿Está seguro de eliminar este rol?')" value="Eliminar">
                </form>
            </td>
        </tr>
        </td>
    <?php } ?>
</table>