<?php
// Verifica que la clase no esté ya definida
if (!class_exists('Conversacion')) {
    class Conversacion {
        // ===== Atributos privados =====
        private $id;                // Identificador único de la conversación
        private $pregunta_usuario;  // Texto de la pregunta realizada por el usuario
        private $respuesta_bot;     // Respuesta generada por el bot
        private $fecha_hora;        // Fecha y hora en que ocurrió la conversación
        private $conexion;          // Conexión a la base de datos (PDO)

        // ===== Constructor =====
        public function __construct($id = null, $pregunta_usuario = null, $respuesta_bot = null, $fecha_hora = null, $conexion = null) {
            $this->id = $id;
            $this->pregunta_usuario = $pregunta_usuario;
            $this->respuesta_bot = $respuesta_bot;
            $this->fecha_hora = $fecha_hora;

            // Si no se pasa conexión, la obtenemos desde la clase Database (singleton)
            if ($conexion === null) {
                include_once(__DIR__ . "/database.class.php");
                $this->conexion = Database::getInstance()->getConnection();
            } else {
                $this->conexion = $conexion;
            }
        }

        // ===== Crear / Guardar =====
        // Inserta una nueva conversación en la base de datos
        public function guardar() {
            $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([
                $this->pregunta_usuario,
                $this->respuesta_bot,
                $this->fecha_hora
            ]);
        }

        // ===== Leer =====
        // Obtiene todas las conversaciones ordenadas por fecha (más recientes primero)
        public static function obtenerTodas() {
            include_once(__DIR__ . "/database.class.php");
            $conexion = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM conversaciones ORDER BY fecha_hora DESC";
            $stmt = $conexion->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // ===== Getters =====
        public function getId() {
            return $this->id;
        }

        public function getPreguntaUsuario() {
            return $this->pregunta_usuario;
        }

        public function getRespuestaBot() {
            return $this->respuesta_bot;
        }

        public function getFechaHora() {
            return $this->fecha_hora;
        }

        // ===== Setters =====
        public function setId($id) {
            $this->id = $id;
        }

        public function setPreguntaUsuario($pregunta_usuario) {
            $this->pregunta_usuario = $pregunta_usuario;
        }

        public function setRespuestaBot($respuesta_bot) {
            $this->respuesta_bot = $respuesta_bot;
        }

        public function setFechaHora($fecha_hora) {
            $this->fecha_hora = $fecha_hora;
        }
    }
}
?>
