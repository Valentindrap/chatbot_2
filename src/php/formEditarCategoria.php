<?php include("check_session.php"); ?>

<?php
include "clases/categoria.class.php";


if(isset($_GET['id'])){
    $categoria = Categoria::obtenerPorId($_GET['id']);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>
<h2>Editar Rol</h2>
<form name="formEditarCAtegoria" method="post" action="controller/categoria.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $categoria->getID(); ?>" readonly>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $categoria->getNombre(); ?>" required>
    <input type="submit" value="Aceptar">

</form>

<a href="listarCategoria.php">Volver</a>
<?php
}else{
    print "No se ha encontrado el rol";
}
?>