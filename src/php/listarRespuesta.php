<?php include("check_session.php"); ?>

<?php
require_once("./clases/respuesta.class.php");
$respuestas = Respuesta::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<h2 style="text-align: center;">Lista de Respuestas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaRespuesta.php">Nueva Respuesta</a>
</div>
<a href="../../entrada.php">Volver</a>
<?php if ($respuestas == null) {
    echo "No hay respuestas";
} ?>

<table>
    <tr>
        <th>ID</th>
        <th>Respuesta</th>
        <th>Pregunta ID</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($respuestas as $respuesta) { ?>
        <tr>
            <td><?= $respuesta['id'] ?></td>
            <td><?= $respuesta['respuesta'] ?></td>
            <td><?= $respuesta['pregunta_id'] ?></td>
            <td>
                
                <form action="controller/respuesta.controller.php" method="post" style="display:inline;">
                    <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>">Editar</a>
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                    <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta respuesta?')" value="Eliminar">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
