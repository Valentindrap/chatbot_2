<?php
include "clases/respuesta.class.php";

if (isset($_GET['id'])) {
    $respuesta = Respuesta::obtenerPorId($_GET['id']);
?>

<h2>Editar Respuesta</h2>
<form name="formEditarRespuesta" method="post" action="controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $respuesta->getID(); ?>" readonly><br>
    <label>Respuesta:</label>
    <input type="text" name="respuesta" value="<?= $respuesta->getRespuesta(); ?>" required><br>
    <label>Pregunta ID:</label>
    <input type="number" name="pregunta_id" value="<?= $respuesta->getPreguntaID(); ?>" required><br>
    <input type="submit" value="Aceptar">
</form>

<a href="listarRespuesta.php">Volver</a>
<?php
} else {
    echo "No se ha encontrado la respuesta";
}
?>
