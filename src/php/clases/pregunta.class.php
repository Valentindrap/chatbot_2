<?php
include_once("database.class.php");

class Pregunta {
    // ===== Atributos privados =====
    private $id;           // Identificador único de la pregunta
    private $pregunta;     // Texto de la pregunta
    private $categoria_id; // ID de la categoría a la que pertenece la pregunta
    private $conexion;     // Conexión a la base de datos (PDO)

    // ===== Constructor =====
    public function __construct($id = null, $pregunta = null, $categoria_id = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;

        // Se obtiene la conexión desde la clase Database (patrón Singleton)
        $this->conexion = Database::getInstance()->getConnection();
    }

    // ===== Crear / Guardar =====
    // Inserta una nueva pregunta en la base de datos
    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria_id]);
    }

    // ===== Actualizar =====
    // Modifica una pregunta existente
    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria_id, $this->id]);
    }

    // ===== Eliminar =====
    // Borra una pregunta de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ===== Leer =====
    // Busca una pregunta por ID y devuelve un objeto Pregunta
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Pregunta($resultado['id'], $resultado['pregunta'], $resultado['categoria_id']);
        }
        return null;
    }

    // Obtiene todas las preguntas (devuelve array asociativo)
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===== Getters =====
    public function getID() {
        return $this->id;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function getCategoriaID() {
        return $this->categoria_id;
    }

    // ===== Setters =====
    public function setID($id) {
        $this->id = $id;
    }

    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    public function setCategoriaID($categoria_id) {
        $this->categoria_id = $categoria_id;
    }
}
?>
