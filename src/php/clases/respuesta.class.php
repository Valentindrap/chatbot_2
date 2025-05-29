<?php
include "database.class.php";

class Respuesta{
    private $id;
    private $respuesta;
    private $pregunta;
    private $conexion;

    public function __construct($id, $respuesta, $pregunta, $conexion){
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta;
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