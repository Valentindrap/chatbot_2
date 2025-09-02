<?php include("check_session.php"); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<form name="formAltaPregunta" method="post" action="controller/pregunta.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Pregunta:</label>
    <input type="text" name="pregunta" required><br>
    <label>Categoría ID:</label>
    <input type="number" name="categoria_id" required><br>
    <input type="submit" value="Aceptar">
</form>
