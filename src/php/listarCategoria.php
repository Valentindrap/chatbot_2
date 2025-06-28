<?php
require_once("clases/categoria.class.php");
$categorias = Categoria::obtenerTodas();
?>

<h2 style="text-align: center;">Lista de Caregorias</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaCategoria.php">Nueva categoria</a>
</div>
    <?php
    if($categorias== null){
        echo "No hay Categorias";
    }
    ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $categoria){ ?>
        <tr>
            <td><?= $categoria['id'] ?></td>
            <td><?= $categoria['nombre'] ?></td>
            <td>
                <a href="formEditarCategoria.php?id=<?= $rol['id'] ?>">Editar</a>

                <form action="controller/categoria.controller.php" method="post">
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $rol['id'] ?>">
                    <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta categoria')" value="Eliminar">
                </form>
            </td>
        </tr>
        </td>
    <?php } ?>
</table>