<?php
include "clases/rol.class.php";

if(isset($_GET['id'])){
    $rol = Rol::obtenerPorId($_GET['id']);
?>

<h2>Editar Rol</h2>
<form name="formEditarRol" method="post" action="controller/rol.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?= $rol->getID(); ?>" readonly>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $rol->getNombre(); ?>" required>
    <input type="submit" value="Aceptar">

</form>

<a href="listarRol.php">Volver</a>
<?php
}else{
    print "No se ha encontrado el rol";
}
?>