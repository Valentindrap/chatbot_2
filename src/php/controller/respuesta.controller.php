<?php
include "../clases/respuesta.class.php";

$operacion = $_POST['operacion'];

if ($operacion == "guardar") {
    $respuesta = new Respuesta(null, $_POST['respuesta'], $_POST['pregunta_id']);
    $result = $respuesta->guardar();

} else if ($operacion == "actualizar") {
    $respuesta = new Respuesta($_POST['id'], $_POST['respuesta'], $_POST['pregunta_id']);
    $result = $respuesta->actualizar();

} else if ($operacion == "eliminar") {
    $respuesta = new Respuesta($_POST['id']);
    $result = $respuesta->eliminar();
}

if ($result) {
    echo "<br>Respuesta procesada correctamente 👌";
} else {
    echo "<br>Error al procesar la respuesta 😢";
}
echo "<a href='../listarRespuesta.php'>Volver</a>";
?>
