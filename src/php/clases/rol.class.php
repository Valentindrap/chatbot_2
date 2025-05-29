<?php
include "database.class.php";

class Rol{
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id, $nombre, $conexion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = $conexion;
    }
    
    public function guardar(){
        
    }
    public function obtenerTodas(){
        
    }
    public function obtenerPorId(){
        
    }
    public function actualizar(){
        
    }
    public function eliminar(){
        
    }
}