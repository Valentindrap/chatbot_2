<?php

include "../clases/usuario.class.php";
$operacion = $_POST['operacion'];
$result = false;

if ($operacion == "guardar") {
    $usuario = new Usuario(
        null,
        $_POST['nombre'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['rol']
    );
    $result = $usuario->guardar();

} else if ($operacion == "actualizar") {
    $usuario = Usuario::obtenerPorId($_POST['id']);
    if ($usuario) {
        $usuario->setNombre($_POST['nombre']);
        $usuario->setEmail($_POST['email']);
        $usuario->setRolId($_POST['rol']);
        $usuario->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));

        $result = $usuario->actualizar();
    }

} else if ($operacion == "eliminar") {
    $usuario = new Usuario($_POST['id']);
    $result = $usuario->eliminar();
}

if ($result) {
    echo "<br>NASHEEEEEEEIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII👌👌👌👌👌👌";
} else {
    echo "<br>NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌";
}

echo "<a href='../listarUsuario.php'>Volver</a>";
