<?php
// Evitamos redefiniciones
require_once("clases/database.class.php");


class Chatbot {

    public function __construct(){
        // Inicialización si es necesario
    }

    public function responder($texto_usuario) {
        $respuesta = "Lo siento, no entiendo la pregunta.";

        // Crear instancia de Pregunta con categoría dummy (por ahora)
        $conexion = Database::getConexion();
        $pregunta = new Pregunta(null, $texto_usuario, 1, $conexion); // Usar conexión válida

        $respuesta = $pregunta->obtenerRespuesta();

        // Guardar la conversación
        $this->guardarConversacion($texto_usuario, $respuesta);

        return $respuesta;
    }

    public function guardarConversacion($pregunta_usuario, $respuesta_bot) {
        $fecha_hora = date('Y-m-d H:i:s');
        $conexion = Database::getConexion();
        $conversacion = new Conversacion(null, $pregunta_usuario, $respuesta_bot, $fecha_hora, $conexion);
        $conversacion->guardar();
    }
}
