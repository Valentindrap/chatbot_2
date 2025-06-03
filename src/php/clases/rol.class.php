<?php
include "database.class.php";
$roles = Rol::obtenerTodas();
class Rol{
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id, $nombre, $conexion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = database::getInstance()->getConnection();
    }
    public function guardar(){
        $sql = "INSERT INTO `roles` (`nombre`) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([this->nombre]);
        
    }
    public static function obtenerTodas(){
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute();
    }
    public function obtenerPorId(){
        
    }
    public function actualizar(){
        $sql = "UPDATE roles SET nombre=? WHERE id=?";
        $stmt = conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function eliminar(){
        $sql = "DELETE FROM roles WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([this->id]);
    }

    public function getID(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setID($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}

?>