<?php
include "database.class.php";

class Pregunta{
    private $id;
    private $pregunta;
    private $categoria;
    private $conexion;

    public function __construct($id, $pregunta, $categoria, $conexion){
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria = $categoria;
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

?>