<?php
include_once("database.class.php");

class Permiso {
    private $id;
    private $nombre;
    private $descripcion;
    private $conexion;

    public function __construct($id = null, $nombre = null, $descripcion = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->conexion = database::getInstance()->getConnection();
    }

    // ===== CRUD =====
    public function guardar() {
        $sql = "INSERT INTO permisos (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->descripcion]);
    }

    public function actualizar() {
        $sql = "UPDATE permisos SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->descripcion, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM permisos WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ===== Getters =====
    public function getID() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // ===== Setters =====
    public function setID($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    // ===== Estáticos de lectura =====
    public static function obtenerPorId($id) {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM permisos WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Permiso(
                $resultado['id'],
                $resultado['nombre'],
                $resultado['descripcion']
            );
        }
        return null;
    }

    public static function obtenerTodos() {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM permisos";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
