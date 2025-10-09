<?php
include_once("database.class.php");

class Respuesta {
    // ===== Atributos privados =====
    private $id;          // Identificador único de la respuesta
    private $respuesta;   // Texto de la respuesta
    private $pregunta;    // ID de la pregunta asociada
    private $conexion;    // Conexión a la base de datos (PDO)

    // ===== Constructor =====
    public function __construct($id = null, $respuesta = null, $pregunta = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta;

        // Obtiene la conexión desde la clase Database (patrón Singleton)
        $this->conexion = Database::getInstance()->getConnection();
    }

    // ===== Crear / Guardar =====
    // Inserta una nueva respuesta en la base de datos
    public function guardar() {
        $sql = "INSERT INTO respuestas (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta]);
    }

    // ===== Leer =====
    // Obtiene todas las respuestas
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca una respuesta por ID y devuelve un objeto Respuesta
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Respuesta($resultado['id'], $resultado['respuesta'], $resultado['pregunta_id']);
        }
        return null;
    }

    // ===== Actualizar =====
    // Modifica una respuesta existente
    public function actualizar() {
        $sql = "UPDATE respuestas SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta, $this->id]);
    }

    // ===== Eliminar =====
    // Borra una respuesta de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM respuestas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ===== Getters =====
    public function getId() {
        return $this->id;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    // ===== Setters =====
    public function setId($id) {
        $this->id = $id;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }
}
?>
