<?php
include "../clases/pregunta.class.php";

$operacion = $_POST['operacion'];

if ($operacion == "guardar") {
    $pregunta = new Pregunta(null, $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->guardar();

} else if ($operacion == "actualizar") {
    $pregunta = new Pregunta($_POST['id'], $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->actualizar();

} else if ($operacion == "eliminar") {
    $pregunta = new Pregunta($_POST['id']);
    $result = $pregunta->eliminar();
}

if ($result) {
    echo "<br>Pregunta procesada correctamente 👌";
} else {
    echo "<br>Error al procesar la pregunta 😢";
}
echo "<a href='../listarPregunta.php'>Volver</a>";
?>
