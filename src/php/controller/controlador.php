<?php
// Incluir clases necesarias
include_once(__DIR__ . "/../clases/database.class.php");
include_once(__DIR__ . "/../clases/pregunta.class.php");
include_once(__DIR__ . "/../clases/respuesta.class.php");
include_once(__DIR__ . "/../clases/conversacion.class.php");

// Obtener el mensaje enviado por el usuario
$mensajeUsuario = $_POST['text'] ?? '';

// Procesar solo si hay mensaje
if (!empty($mensajeUsuario)) {
    // Obtener conexión
    $conexion = Database::getInstance()->getConnection();

    // Buscar una respuesta relacionada
    $sql = "SELECT r.respuesta 
            FROM preguntas p 
            JOIN respuestas r ON p.id = r.pregunta_id 
            WHERE p.pregunta LIKE ? 
            LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute(["%$mensajeUsuario%"]);
    $respuesta = $stmt->fetchColumn();

    // Si no se encontró una respuesta
    if (!$respuesta) {
        $respuesta = "Lo siento, no entiendo tu pregunta. ¿Podés reformularla?";
    }

    // Crear instancia de Conversacion y guardar
    $conversacion = new Conversacion(
        null,
        $mensajeUsuario,
        $respuesta,
        date("Y-m-d H:i:s"),
        $conexion
    );
    $conversacion->guardar();

    // Enviar respuesta al frontend
    echo $respuesta;
}
?>
