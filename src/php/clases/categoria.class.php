<?php 
include_once("database.class.php");

// Se obtiene una lista inicial de todas las categorías (opcional, para uso directo)
$categorias = Categoria::obtenerTodas();

class Categoria {
    // ===== Atributos privados =====
    private $id;          // Identificador único de la categoría
    private $nombre;      // Nombre de la categoría
    private $conexion;    // Conexión a la base de datos (PDO)

    // ===== Constructor =====
    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        // Se obtiene la conexión desde la clase Database (singleton)
        $this->conexion = database::getInstance()->getConnection();
    }
    
    // ===== Crear / Guardar =====
    // Inserta una nueva categoría en la base de datos
    public function guardar() {
        $sql = "INSERT INTO `categorias` (`nombre`) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    // ===== Leer =====
    // Obtiene todas las categorías como array asociativo
    public static function obtenerTodas() {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM categorias";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca una categoría por ID y devuelve un objeto Categoria
    public static function obtenerPorId($id) {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM categorias WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return new Categoria($resultado['id'], $resultado['nombre']);
        }     
        return null; 
    }

    // ===== Actualizar =====
    // Modifica el nombre de una categoría existente
    public function actualizar() {
        $sql = "UPDATE categorias SET nombre=? WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    // ===== Eliminar =====
    // Borra una categoría de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM categorias WHERE id=?";
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

    // ===== Setters =====
    public function setID($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }  
}

?>
