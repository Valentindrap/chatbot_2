<?php include("check_session.php"); ?>

<?php
include "clases/pregunta.class.php";

if (isset($_GET['id'])) {
    $pregunta = Pregunta::obtenerPorId($_GET['id']);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<h2>Editar Pregunta</h2>
<form name="formEditarPregunta" method="post" action="controller/pregunta.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $pregunta->getID(); ?>" readonly><br>
    <label>Pregunta:</label>
    <input type="text" name="pregunta" value="<?= $pregunta->getPregunta(); ?>" required><br>
    <label>Categoría ID:</label>
    <input type="number" name="categoria_id" value="<?= $pregunta->getCategoriaID(); ?>" required><br>
    <input type="submit" value="Aceptar">
</form>

<a href="listarPregunta.php">Volver</a>
<?php
} else {
    echo "No se ha encontrado la pregunta";
}
?>
