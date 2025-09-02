<?php include("check_session.php"); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<form name="formAltaRol" method="post" action="controller/rol.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Aceptar">

</form>