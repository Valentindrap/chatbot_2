<?php
include_once("database.class.php");

class Rol {
    // ===== Atributos privados =====
    private $id;        // Identificador único del rol
    private $nombre;    // Nombre del rol (ej: Administrador, Usuario, etc.)
    private $conexion;  // Conexión a la base de datos (PDO)

    // ===== Constructor =====
    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;

        // Se obtiene la conexión desde la clase Database (patrón Singleton)
        $this->conexion = Database::getInstance()->getConnection();
    }

    // ===== Crear / Guardar =====
    // Inserta un nuevo rol en la base de datos
    public function guardar() {
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    // ===== Actualizar =====
    // Modifica un rol existente
    public function actualizar() {
        $sql = "UPDATE roles SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    // ===== Eliminar =====
    // Borra un rol de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ===== Leer =====
    // Obtiene un rol por ID y devuelve un objeto Rol
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Rol($resultado['id'], $resultado['nombre']);
        }
        return null;
    }

    // Obtiene todos los roles (devuelve array asociativo)
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===== Getters =====
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // ===== Setters =====
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
?>
