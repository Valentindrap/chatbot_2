<?php
include "database.class.php";
$roles = Rol::obtenerTodas();
class Rol{
    private $id;
    private $nombre;
    private $conexion;

public function __construct($id=null, $nombre=null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = database::getInstance()->getConnection();
}

public function actualizar(){
    $sql = "UPDATE roles SET nombre=? WHERE id=?";
    $stmt = conexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function eliminar(){
    $sql = "DELETE FROM roles WHERE id=?";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->id]);
}

public function getID(){
    return $this->id;
}

public function getNombre(){
    return $this->nombre;
}

public function guardar(){
    $sql = "INSERT INTO `roles` (`nombre`) VALUES (?)";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->nombre]);
}

public static function obtenerPorId(){
    $conexion = database::getInstance()->getConnection();
    $sql = "SELECT * FROM roles WHERE id=?";
    $stmt = $conexion->query($sql);
    $stmt->execute([$id]);
    $resultado= $stmt->fetch(PDO::FETCH_ASSOC);
    if($resultado){
        return new Rol($resultado['id'], $resultado['nombre']);
    }     
    return null; 
}

public static function obtenerTodas(){
    $conexion = database::getInstance()->getConnection();
    $sql = "SELECT * FROM roles";
    $stmt = $conexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function setID($id){
    $this->id = $id;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

}

?>